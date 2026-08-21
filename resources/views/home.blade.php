@extends('layouts.app')

@section('title', config('site.name') . ' — AI-Enabled Digital Marketing Agency in Noida')

@section('content')
{{-- Hero Section --}}
<section class="hero">
    <div class="hero-bg">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
        <div class="grid-overlay"></div>
    </div>
    <div class="container hero-content">
        <div class="hero-badges fade-up">
            <span class="badge badge-glow">AI-Powered Results</span>
            <span class="badge">{{ config('site.founded') }}+ Years | {{ config('site.clients') }} Global Clients</span>
        </div>
        <h1 class="hero-title fade-up">
            <span class="gradient-text">AI-Enabled</span><br>
            Digital Marketing Agency
        </h1>
        <p class="hero-subtitle fade-up">Redefining Growth with AI + Human Intelligence. We help brands rank on Google, get cited by AI search engines, and scale revenue through data-driven digital strategies.</p>
        <div class="hero-actions fade-up">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                Get Your Free AI Growth Strategy
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('services') }}" class="btn btn-outline btn-lg">Explore Services</a>
        </div>
        <div class="hero-trust fade-up">
            <div class="stars">★★★★★</div>
            <span>Rated {{ config('site.rating') }} Stars Based on {{ config('site.reviews') }} Client Reviews</span>
        </div>
    </div>
</section>

{{-- Stats Bar --}}
<section class="stats-bar">
    <div class="container">
        <div class="stats-grid">
            @foreach($stats as $stat)
            <div class="stat-item fade-up">
                <span class="stat-value" data-count="{{ $stat['value'] }}">{{ $stat['value'] }}</span>
                <span class="stat-label">{{ $stat['label'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Growth Metrics --}}
<section class="section metrics-section">
    <div class="container">
        <div class="metrics-grid">
            <div class="metric-card fade-up">
                <span class="metric-value gradient-text">2X–6X</span>
                <span class="metric-label">Revenue Growth</span>
                <p>Proven growth results across industries</p>
            </div>
            <div class="metric-card fade-up">
                <span class="metric-value gradient-text">3X–8X</span>
                <span class="metric-label">Lead Generation</span>
                <p>Quality MQLs that convert to sales</p>
            </div>
            <div class="metric-card fade-up">
                <span class="metric-value gradient-text">4X–8X</span>
                <span class="metric-label">Social Engagement</span>
                <p>Enhanced audience reach & authority</p>
            </div>
            <div class="metric-card fade-up">
                <span class="metric-value gradient-text">100–1000%</span>
                <span class="metric-label">Brand Exposure</span>
                <p>Massive visibility boost everywhere</p>
            </div>
        </div>
    </div>
</section>

{{-- About Preview --}}
<section class="section about-preview">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">About Us</span>
            <h2>Best Digital Marketing Agency in India — Driving Results & Growth</h2>
            <p>{{ config('site.name') }} delivers measurable outcomes through data-driven strategies. With full-funnel digital marketing audits, we help you find growth gaps and key opportunities to maximize conversions.</p>
        </div>
        <div class="approach-grid">
            <div class="approach-card fade-up">
                <div class="approach-icon">🎯</div>
                <h3>AI-Driven Marketing</h3>
                <p>Performance-focused strategies powered by AI insights and LLM optimization.</p>
            </div>
            <div class="approach-card fade-up">
                <div class="approach-icon">📈</div>
                <h3>Full-Funnel Solutions</h3>
                <p>End-to-end digital solutions designed for higher ROI across every channel.</p>
            </div>
            <div class="approach-card fade-up">
                <div class="approach-icon">🌐</div>
                <h3>Multi-Platform Growth</h3>
                <p>Personalized strategies across Google, Meta, AI search, and marketplaces.</p>
            </div>
        </div>
        <div class="text-center fade-up" style="margin-top: 3rem;">
            <a href="{{ route('about') }}" class="btn btn-outline">Explore How We Drive Growth</a>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="section services-section" id="services">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Our Services</span>
            <h2>Digital Marketing Solutions That Scale</h2>
            <p>From SEO and AI search visibility to Shopify development and paid media — we cover every growth channel.</p>
        </div>
        <div class="services-grid">
            @foreach($services as $slug => $service)
            <a href="{{ route('services.show', $slug) }}" class="service-card fade-up">
                <div class="service-card-header">
                    <span class="service-badge">{{ $service['badge'] }}</span>
                    <span class="service-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h3>{{ $service['title'] }}</h3>
                <p>{{ $service['short'] }}</p>
                <span class="service-link">Learn More →</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Problems We Solve --}}
<section class="section problems-section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Problems We Solve</span>
            <h2>For SMBs to Large Enterprises</h2>
        </div>
        <div class="problems-grid">
            @foreach($problems as $index => $problem)
            <div class="problem-card fade-up">
                <span class="problem-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <h3>{{ $problem['title'] }}</h3>
                <p>{{ $problem['description'] }}</p>
                <span class="problem-metric">{{ $problem['metric'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Trusted By --}}
<section class="section trusted-section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Trusted By Global Brands</span>
            <h2>Partners & Certifications</h2>
        </div>
        <div class="clients-bar fade-up">
            @foreach(config('site.partners') as $client)
            <span class="client-badge">{{ $client }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="section testimonials-section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Client Reviews</span>
            <h2>Growth You Can Measure, Results You Can Trust</h2>
        </div>
        <div class="testimonials-grid">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-card fade-up">
                <div class="testimonial-stars">{{ str_repeat('★', $testimonial['rating']) }}</div>
                <p class="testimonial-text">"{{ $testimonial['text'] }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">{{ substr($testimonial['name'], 0, 1) }}</div>
                    <div>
                        <strong>{{ $testimonial['name'] }}</strong>
                        <span>{{ $testimonial['role'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="section cta-section">
    <div class="container">
        <div class="cta-box fade-up">
            <div class="cta-glow"></div>
            <h2>Ready to Improve Your Digital Performance?</h2>
            <p>Get a free consultation and learn how we optimize every channel for growth.</p>
            <div class="cta-features">
                <span>⭐ {{ config('site.clients') }} Happy Clients</span>
                <span>🏆 Award Winning Agency</span>
                <span>🚀 {{ config('site.founded') }}+ Years Experience</span>
            </div>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Claim Your Free Proposal</a>
                <a href="tel:{{ config('site.phone') }}" class="btn btn-ghost btn-lg">Call {{ config('site.phone_display') }}</a>
            </div>
        </div>
    </div>
</section>
@endsection
