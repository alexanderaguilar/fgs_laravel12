<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RewriteContentUrlsCommand extends Command
{
    protected $signature = 'fgs:rewrite-content-urls {--dry-run : Show files that would change}';

    protected $description = 'Rewrite absolute fundaciongruposocial.co / staging IP URLs to root-relative paths and upgrade http:// to https:// in Statamic content';

    public function handle(): int
    {
        $dirs = [
            base_path('content/collections'),
            base_path('content/trees'),
            base_path('content/globals'),
        ];

        $patterns = [
            '#https?://3\.91\.33\.230/+storage/#' => '/storage/',
            '#https?://3\.91\.33\.230/+assets/#' => '/assets/',
            '#https?://3\.91\.33\.230/#' => '/',
            '#https?://(?:www\.)?fundaciongruposocial\.co/+storage/#' => '/storage/',
            '#https?://(?:www\.)?fundaciongruposocial\.co/+public/#' => '/',
            '#https?://(?:www\.)?fundaciongruposocial\.co/#' => '/',
            '#http://#' => 'https://',
        ];

        $changed = 0;
        foreach ($dirs as $dir) {
            if (! is_dir($dir)) {
                continue;
            }
            foreach (File::allFiles($dir) as $file) {
                if (! in_array($file->getExtension(), ['md', 'yaml', 'yml'], true)) {
                    continue;
                }
                $path = $file->getPathname();
                $original = File::get($path);
                $updated = $original;
                foreach ($patterns as $pattern => $replacement) {
                    $updated = preg_replace($pattern, $replacement, $updated);
                }
                if ($updated !== $original) {
                    $changed++;
                    $this->line(($this->option('dry-run') ? '[dry] ' : '').$path);
                    if (! $this->option('dry-run')) {
                        File::put($path, $updated);
                    }
                }
            }
        }

        $this->info(($this->option('dry-run') ? 'Would update ' : 'Updated ').$changed.' files');

        return self::SUCCESS;
    }
}
