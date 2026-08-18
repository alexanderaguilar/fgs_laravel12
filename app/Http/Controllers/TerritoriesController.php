<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Carbon\Carbon;

class TerritoriesController extends Controller
{
    public function index()
    {
        Carbon::setLocale('es');

        $recent_testimonials = Cms::postsByCategorySlug('work-in-communities-testimonials', 8);
        $social_programs = Cms::entries('direct_social_programs');
        $cities = Cms::entries('territories', fn ($q) => $q->where('active', true))->sortByDesc('id')->values();
        $cities_old = Cms::entries('territories', fn ($q) => $q->where('active', false))->sortByDesc('id')->values();

        return view('territories', compact('recent_testimonials', 'social_programs', 'cities', 'cities_old'));
    }

    public function territory(string $slug)
    {
        Carbon::setLocale('es');

        $citydata = Cms::findBySlug('territories', $slug);
        abort_unless($citydata, 404);

        $cities = Cms::entries('territories', fn ($q) => $q->where('active', true))->sortByDesc('id')->values();
        $cities_old = Cms::entries('territories', fn ($q) => $q->where('active', false))->sortByDesc('id')->values();

        $recent_testimonials = Cms::postsForTerritory($citydata->entry_id, 'work-in-communities-testimonials', 4);
        $recent_news = Cms::postsForTerritory($citydata->entry_id, 'featured-news-and-news', 4);

        $view = ! empty($citydata->active) ? 'territory-detail-new' : 'territory-detail';

        return view($view, compact(
            'citydata',
            'recent_testimonials',
            'recent_news',
            'cities',
            'cities_old'
        ));
    }
}
