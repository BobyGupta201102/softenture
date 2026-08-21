@extends('layouts.app')

@section('title', $service['title'] . ' — ' . config('site.name'))

@section('meta_description', $service['short'])

@section('content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content fade-up">
            <span class="service-badge">{{ $service['badge'] }}</span>
            <h1>{{ $service['title'] }}</h1>
            <p>{{ $service['description'] }}</p>
            <div class="service-metrics" style="margin-top: 1.5rem;">
                @foreach($service['metrics'] as $metric)
                <span class="metric-tag">{{ $metric }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section service-detail">
    <div class="container">
        <div class="service-detail-grid">
            <div class="service-detail-main fade-up">
                <h2>What's Included</h2>
                <ul class="feature-list">
                    @foreach($service['features'] as $feature)
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>

                <div class="service-process fade-up">
                    <h2>Our Process</h2>
                    <div class="process-steps">
                        <div class="process-step">
                            <span class="step-num">01</span>
                            <h4>Audit & Discovery</h4>
                            <p>Deep analysis of your current digital presence, competitors, and growth opportunities.</p>
                        </div>
                        <div class="process-step">
                            <span class="step-num">02</span>
                            <h4>Strategy & Planning</h4>
                            <p>Custom roadmap with KPIs, timelines, and channel-specific tactics.</p>
                        </div>
                        <div class="process-step">
                            <span class="step-num">03</span>
                            <h4>Execute & Optimize</h4>
                            <p>Launch campaigns, implement changes, and continuously optimize for results.</p>
                        </div>
                        <div class="process-step">
                            <span class="step-num">04</span>
                            <h4>Report & Scale</h4>
                            <p>Transparent reporting with actionable insights to scale what works.</p>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="service-sidebar fade-up">
                <div class="sidebar-card">
                    <h3>Get Started Today</h3>
                    <p>Free consultation with a senior strategist. No obligations.</p>
                    <a href="{{ route('contact') }}?service={{ urlencode($service['title']) }}" class="btn btn-primary" style="width:100%;">Request Proposal</a>
                    <a href="tel:{{ config('site.phone') }}" class="btn btn-outline" style="width:100%; margin-top: 0.75rem;">Call {{ config('site.phone_display') }}</a>
                </div>

                <div class="sidebar-card">
                    <h4>Other Services</h4>
                    <ul class="sidebar-links">
                        @foreach($allServices as $sSlug => $sService)
                            @if($sSlug !== $slug)
                            <li><a href="{{ route('services.show', $sSlug) }}">{{ $sService['title'] }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <div class="cta-box fade-up">
            <h2>Ready to Scale with {{ $service['title'] }}?</h2>
            <p>Join {{ config('site.clients') }} businesses that trust {{ config('site.name') }} for digital growth.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Claim Your Free Proposal</a>
        </div>
    </div>
</section>
@endsection
