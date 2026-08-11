<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function index()
    {
        return view('report');
    }

    public function page()
    {
        return view('report');
    }

    public function pagecompanies()
    {
        return view('reports-companies');
    }
}
