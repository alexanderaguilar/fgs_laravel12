<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts(Request $request)
    {
        Carbon::setLocale('es');

        $posts = Cms::paginatePostsByCategory('featured-news-and-news', 6);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'posts' => view('partials.posts', compact('posts'))->render(),
                'next_page' => $posts->nextPageUrl(),
            ]);
        }

        return view('posts', compact('posts'));
    }

    public function show(string $slug)
    {
        Carbon::setLocale('es');

        $post = Cms::findBySlug('posts', $slug);
        if (! $post) {
            abort(404);
        }

        return view('post-detail', compact('post'));
    }
}
