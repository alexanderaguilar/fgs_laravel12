<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Carbon\Carbon;

class CommunityController extends Controller
{
    public function index()
    {
        Carbon::setLocale('es');

        $recent_testimonials = Cms::postsByCategorySlug('work-in-communities-testimonials', 8);
        $social_programs = Cms::entries('direct_social_programs');
        $cities = Cms::entries('territories', fn ($q) => $q->where('active', true))->sortByDesc('id')->values();
        $cities_old = Cms::entries('territories', fn ($q) => $q->where('active', false))->sortByDesc('id')->values();

        return view('communities', compact('recent_testimonials', 'social_programs', 'cities', 'cities_old'));
    }

    public function community(string $slug)
    {
        Carbon::setLocale('es');

        $citydata = Cms::findBySlug('territories', $slug);
        abort_unless($citydata, 404);

        $cities = Cms::entries('territories', fn ($q) => $q->where('active', true))->sortByDesc('id')->values();
        $cities_old = Cms::entries('territories', fn ($q) => $q->where('active', false))->sortByDesc('id')->values();
        $recent_testimonials = Cms::postsForTerritory($citydata->entry_id, 'work-in-communities-testimonials-news', 5);

        return view('community-detail', compact('citydata', 'recent_testimonials', 'cities', 'cities_old'));
    }
}
