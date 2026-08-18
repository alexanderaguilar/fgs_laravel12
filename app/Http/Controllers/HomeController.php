<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        Carbon::setLocale('es');

        $banners = Cms::entries('home_banners', fn ($q) => $q->orderBy('order')->limit(5));
        $posts = Cms::postsByCategorySlug('featured-news-and-news', 8);
        $mapLogo = Cms::entries('home_maplogos', fn ($q) => $q->orderBy('display_rank'));
        $campaigns = Cms::entries('home_campaigns', fn ($q) => $q->orderBy('order')->limit(4));
        $ownerLogos = Cms::entries('home_owner_logos', fn ($q) => $q->orderBy('display_rank'));
        $homeCtas = Cms::entries('home_ctas', fn ($q) => $q->orderBy('order')->limit(4));

        return view('home', compact('banners', 'posts', 'mapLogo', 'campaigns', 'ownerLogos', 'homeCtas'));
    }
}
