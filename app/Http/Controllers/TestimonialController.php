<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private const FILTERS = [
        'empresas' => 'companies-testimonials',
        'territorios' => 'work-in-communities-testimonials',
    ];

    public function index(Request $request)
    {
        Carbon::setLocale('es');

        $fuente = $request->query('fuente', 'empresas');
        if (! array_key_exists($fuente, self::FILTERS)) {
            $fuente = 'empresas';
        }

        $posts = Cms::paginatePostsByCategory(self::FILTERS[$fuente], 6);
        $posts->appends(['fuente' => $fuente]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'posts' => view('partials.posts', compact('posts'))->render(),
                'next_page' => $posts->nextPageUrl(),
            ]);
        }

        return view('testimonials', compact('posts', 'fuente'));
    }
}
