<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index', [
            'services' => config('site.services'),
        ]);
    }

    public function show(string $slug)
    {
        $services = config('site.services');

        if (! isset($services[$slug])) {
            abort(404);
        }

        return view('services.show', [
            'service' => $services[$slug],
            'slug' => $slug,
            'allServices' => $services,
        ]);
    }

    public function shopify()
    {
        $service = config('site.services.shopify-ecommerce');

        return view('shopify', [
            'service' => $service,
            'services' => config('site.services'),
        ]);
    }
}
