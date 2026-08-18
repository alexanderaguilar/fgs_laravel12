<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = trim((string) $request->input('query', ''));
        $results = mb_strlen($query) >= 3 ? Cms::search($query, 100) : collect();

        $page = max(1, (int) $request->input('page', 1));
        $perPage = 10;

        $paginatedResults = new LengthAwarePaginator(
            $results->slice(($page - 1) * $perPage, $perPage)->values(),
            $results->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('search.results', compact('paginatedResults', 'query'));
    }

    public function suggest(Request $request)
    {
        $query = trim((string) $request->input('q', $request->input('query', '')));

        if (mb_strlen($query) < 3) {
            return response()->json([
                'query' => $query,
                'min_chars' => 3,
                'results' => [],
            ]);
        }

        $results = Cms::searchSuggest($query, 8);

        return response()->json([
            'query' => $query,
            'results' => $results->values(),
        ]);
    }
}
