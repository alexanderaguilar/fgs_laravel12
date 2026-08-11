<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = (string) $request->input('query', '');
        $results = Cms::search($query);

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
}
