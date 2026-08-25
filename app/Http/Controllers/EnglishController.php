<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Carbon\Carbon;

class EnglishController extends Controller
{
    public function index()
    {
        Carbon::setLocale('en');

        $banners = Cms::entries('home_banners', fn ($q) => $q->orderBy('order')->limit(4));
        $posts = Cms::entries('posts', fn ($q) => $q->orderBy('date', 'desc')->limit(8));
        $mapLogo = Cms::entries('home_maplogos', fn ($q) => $q->orderBy('display_rank'));

        return view('english', compact('banners', 'posts', 'mapLogo'));
    }
}
