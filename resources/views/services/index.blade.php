@extends('layouts.app')

@section('title', 'Our Services — ' . config('site.name'))

@section('content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content fade-up">
            <span class="section-tag">What We Do</span>
            <h1>Digital Marketing Services</h1>
            <p>Full-funnel digital solutions powered by AI and human expertise. From search visibility to Shopify stores — we deliver measurable growth.</p>
        </div>
    </div>
</section>

<section class="section services-page">
    <div class="container">
        <div class="services-grid services-grid-full">
            @foreach($services as $slug => $service)
            <div class="service-card service-card-detailed fade-up">
                <div class="service-card-header">
                    <span class="service-badge">{{ $service['badge'] }}</span>
                    <span class="service-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h3>{{ $service['title'] }}</h3>
                <p>{{ $service['short'] }}</p>
                <ul class="service-features-mini">
                    @foreach(array_slice($service['features'], 0, 3) as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                </ul>
                <div class="service-metrics">
                    @foreach($service['metrics'] as $metric)
                    <span class="metric-tag">{{ $metric }}</span>
                    @endforeach
                </div>
                <a href="{{ route('services.show', $slug) }}" class="btn btn-outline">View Details →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <div class="cta-box fade-up">
            <h2>Not Sure Which Service You Need?</h2>
            <p>Book a free consultation and we'll audit your digital presence to recommend the right strategy.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Get Free Consultation</a>
        </div>
    </div>
</section>
@endsection
