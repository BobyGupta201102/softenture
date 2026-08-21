@extends('layouts.app')

@section('title', 'Shopify Development Services — ' . config('site.name'))

@section('meta_description', 'Custom Shopify store development, theme design, Shopify Plus migration, and e-commerce growth strategies by SoftEnture in Noida.')

@section('content')
<section class="page-hero shopify-hero">
    <div class="container">
        <div class="page-hero-content fade-up">
            <span class="section-tag">Shopify Expert Partner</span>
            <h1>Shopify Development & <span class="gradient-text">E-Commerce Growth</span></h1>
            <p>Build high-converting Shopify stores that scale. From custom theme development to Shopify Plus migrations — we turn browsers into buyers.</p>
            <div class="hero-actions" style="margin-top: 2rem;">
                <a href="{{ route('contact') }}?service=Shopify+Development" class="btn btn-primary btn-lg">Start Your Store</a>
                <a href="{{ route('services.show', 'shopify-ecommerce') }}" class="btn btn-outline btn-lg">View Full Service</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="shopify-showcase fade-up">
            <div class="shopify-stats">
                <div class="shopify-stat">
                    <span class="stat-value gradient-text">4X</span>
                    <span>Average Sales Growth</span>
                </div>
                <div class="shopify-stat">
                    <span class="stat-value gradient-text">2X</span>
                    <span>Cart Recovery Rate</span>
                </div>
                <div class="shopify-stat">
                    <span class="stat-value gradient-text">50+</span>
                    <span>Stores Built</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Shopify Services</span>
            <h2>Everything You Need to Sell Online</h2>
        </div>
        <div class="services-grid">
            <div class="service-card fade-up">
                <div class="service-card-header">
                    <span class="service-badge">Setup</span>
                </div>
                <h3>Store Setup & Configuration</h3>
                <p>Complete Shopify store setup with products, collections, payment gateways, shipping zones, and tax configuration.</p>
            </div>
            <div class="service-card fade-up">
                <div class="service-card-header">
                    <span class="service-badge">Design</span>
                </div>
                <h3>Custom Theme Development</h3>
                <p>Bespoke Shopify themes designed for your brand — fast, mobile-first, and optimized for conversions.</p>
            </div>
            <div class="service-card fade-up">
                <div class="service-card-header">
                    <span class="service-badge">Migration</span>
                </div>
                <h3>Shopify Plus Migration</h3>
                <p>Seamless migration from WooCommerce, Magento, or custom platforms to Shopify with zero data loss.</p>
            </div>
            <div class="service-card fade-up">
                <div class="service-card-header">
                    <span class="service-badge">Apps</span>
                </div>
                <h3>App Integration & Custom Apps</h3>
                <p>Connect essential apps — inventory, email, reviews, loyalty — or build custom Shopify apps for unique needs.</p>
            </div>
            <div class="service-card fade-up">
                <div class="service-card-header">
                    <span class="service-badge">CRO</span>
                </div>
                <h3>Conversion Rate Optimization</h3>
                <p>A/B testing, checkout optimization, abandoned cart recovery, and UX improvements that boost sales.</p>
            </div>
            <div class="service-card fade-up">
                <div class="service-card-header">
                    <span class="service-badge">Growth</span>
                </div>
                <h3>E-Commerce Marketing</h3>
                <p>Google Shopping ads, Meta catalog ads, email marketing, and SEO to drive qualified traffic to your store.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Why Shopify</span>
            <h2>The Platform Powering {{ config('site.clients') }} Stores Worldwide</h2>
        </div>
        <div class="approach-grid">
            <div class="approach-card fade-up">
                <div class="approach-icon">⚡</div>
                <h3>Lightning Fast</h3>
                <p>Shopify's global CDN ensures your store loads in under 2 seconds — critical for conversion rates.</p>
            </div>
            <div class="approach-card fade-up">
                <div class="approach-icon">🔒</div>
                <h3>Secure & Reliable</h3>
                <p>Level 1 PCI compliance, 99.99% uptime, and automatic security updates built in.</p>
            </div>
            <div class="approach-card fade-up">
                <div class="approach-icon">📱</div>
                <h3>Mobile Commerce Ready</h3>
                <p>Over 70% of e-commerce traffic is mobile. Every store we build is mobile-first.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">What's Included</span>
            <h2>{{ $service['title'] }} Features</h2>
        </div>
        <ul class="feature-list feature-list-grid fade-up">
            @foreach($service['features'] as $feature)
            <li>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ $feature }}
            </li>
            @endforeach
        </ul>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <div class="cta-box fade-up">
            <h2>Ready to Launch Your Shopify Store?</h2>
            <p>Get a free e-commerce audit and custom proposal for your online store.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}?service=Shopify+Development" class="btn btn-primary btn-lg">Get Free Store Audit</a>
                <a href="tel:{{ config('site.phone') }}" class="btn btn-ghost btn-lg">Call {{ config('site.phone_display') }}</a>
            </div>
        </div>
    </div>
</section>
@endsection
