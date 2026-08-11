<?php

namespace App\Support;

/**
 * Extracts rows from MariaDB/MySQL INSERT dumps without a live DB.
 */
class SqlDumpParser
{
    public function __construct(private string $sqlPath) {}

    public function tableRows(string $table): array
    {
        $sql = file_get_contents($this->sqlPath);
        if ($sql === false) {
            throw new \RuntimeException("Cannot read {$this->sqlPath}");
        }

        $pattern = '/INSERT INTO `'.preg_quote($table, '/').'` VALUES\s*(.*?);\s*(?:\r?\n|\/\*|$)/s';
        if (! preg_match($pattern, $sql, $match)) {
            return [];
        }

        $columns = $this->tableColumns($sql, $table);
        $tuples = $this->splitTuples($match[1]);
        $rows = [];

        foreach ($tuples as $tuple) {
            $values = $this->parseTupleValues($tuple);
            if ($columns && count($columns) === count($values)) {
                $rows[] = array_combine($columns, $values);
            } else {
                $rows[] = $values;
            }
        }

        return $rows;
    }

    private function tableColumns(string $sql, string $table): array
    {
        $pattern = '/CREATE TABLE `'.preg_quote($table, '/').'`\s*\((.*?)\)\s*ENGINE=/s';
        if (! preg_match($pattern, $sql, $match)) {
            return [];
        }

        $columns = [];
        foreach (preg_split('/\r?\n/', $match[1]) as $line) {
            $line = trim($line, " \t\n\r\0\x0B,");
            if (preg_match('/^`([^`]+)`/', $line, $m)) {
                $columns[] = $m[1];
            }
        }

        return $columns;
    }

    private function splitTuples(string $valuesBlock): array
    {
        $tuples = [];
        $length = strlen($valuesBlock);
        $i = 0;

        while ($i < $length) {
            while ($i < $length && ctype_space($valuesBlock[$i])) {
                $i++;
            }
            if ($i >= $length) {
                break;
            }
            if ($valuesBlock[$i] !== '(') {
                $i++;
                continue;
            }

            $depth = 0;
            $inString = false;
            $escape = false;
            $start = $i;

            for (; $i < $length; $i++) {
                $ch = $valuesBlock[$i];

                if ($inString) {
                    if ($escape) {
                        $escape = false;
                        continue;
                    }
                    if ($ch === '\\') {
                        $escape = true;
                        continue;
                    }
                    if ($ch === "'") {
                        // MySQL escaped quote ''
                        if ($i + 1 < $length && $valuesBlock[$i + 1] === "'") {
                            $i++;
                            continue;
                        }
                        $inString = false;
                    }
                    continue;
                }

                if ($ch === "'") {
                    $inString = true;
                    continue;
                }
                if ($ch === '(') {
                    $depth++;
                    continue;
                }
                if ($ch === ')') {
                    $depth--;
                    if ($depth === 0) {
                        $tuples[] = substr($valuesBlock, $start + 1, $i - $start - 1);
                        $i++;
                        break;
                    }
                }
            }
        }

        return $tuples;
    }

    private function parseTupleValues(string $tuple): array
    {
        $values = [];
        $length = strlen($tuple);
        $i = 0;

        while ($i < $length) {
            while ($i < $length && ctype_space($tuple[$i])) {
                $i++;
            }
            if ($i >= $length) {
                break;
            }

            if (substr($tuple, $i, 4) === 'NULL' && ($i + 4 >= $length || $tuple[$i + 4] === ',' || ctype_space($tuple[$i + 4]))) {
                $values[] = null;
                $i += 4;
            } elseif ($tuple[$i] === "'") {
                $i++;
                $buffer = '';
                while ($i < $length) {
                    $ch = $tuple[$i];
                    if ($ch === '\\' && $i + 1 < $length) {
                        $next = $tuple[$i + 1];
                        $map = ['n' => "\n", 'r' => "\r", 't' => "\t", '0' => "\0", "'" => "'", '\\' => '\\', '"' => '"'];
                        $buffer .= $map[$next] ?? $next;
                        $i += 2;
                        continue;
                    }
                    if ($ch === "'") {
                        if ($i + 1 < $length && $tuple[$i + 1] === "'") {
                            $buffer .= "'";
                            $i += 2;
                            continue;
                        }
                        $i++;
                        break;
                    }
                    $buffer .= $ch;
                    $i++;
                }
                $values[] = $buffer;
            } else {
                $start = $i;
                while ($i < $length && $tuple[$i] !== ',') {
                    $i++;
                }
                $raw = trim(substr($tuple, $start, $i - $start));
                $values[] = is_numeric($raw) ? (str_contains($raw, '.') ? (float) $raw : (int) $raw) : $raw;
            }

            while ($i < $length && ctype_space($tuple[$i])) {
                $i++;
            }
            if ($i < $length && $tuple[$i] === ',') {
                $i++;
            }
        }

        return $values;
    }
}
