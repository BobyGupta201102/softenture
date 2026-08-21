<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'services' => config('site.services'),
            'stats' => config('site.stats'),
            'problems' => config('site.problems'),
            'testimonials' => config('site.testimonials'),
        ]);
    }
}
