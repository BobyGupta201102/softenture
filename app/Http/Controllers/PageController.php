<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('about', [
            'stats' => config('site.stats'),
            'testimonials' => config('site.testimonials'),
        ]);
    }
}
