<?php

namespace App\Http\Controllers;

use App\Support\Cms;

class ContentController extends Controller
{
    public function anySlug(string $friendlyUrl)
    {
        $page = Cms::findBySlug('pages', $friendlyUrl);
        if ($page) {
            return view('page', compact('page'));
        }

        // Legacy post URLs /{slug} → /noticias/{slug}
        $post = Cms::findBySlug('posts', $friendlyUrl);
        if ($post) {
            return redirect()->to(Cms::postUrl($friendlyUrl), 301);
        }

        abort(404);
    }
}
