<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function book()
    {
        return view('book');
    }

    public function book2()
    {
        return view('book-2');
    }

    public function docs()
    {
        return view('docs');
    }

    public function because()
    {
        return view('because');
    }

    public function w4p_landing()
    {
        return view('page_w4p');
    }

    public function w4p_form_1()
    {
        return view('page_w4p_01');
    }

    public function w4p_form_2()
    {
        return view('page_w4p_02');
    }

    public function w4p_form_3()
    {
        return view('page_w4p_03');
    }

    public function transparency()
    {
        return view('transparency');
    }
}
