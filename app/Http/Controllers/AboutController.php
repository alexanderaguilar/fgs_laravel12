<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }

    public function whoweare()
    {
        return view('about_whoweare');
    }

    public function howweare()
    {
        return view('about_howweare');
    }

    public function whatwedo()
    {
        return view('about_whatwedo');
    }

    public function history()
    {
        return view('about_history');
    }

    public function corporate()
    {
        return view('about_corporate');
    }

    public function workwithus()
    {
        return view('about_workwithus');
    }
}
