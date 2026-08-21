@extends('layouts.app')

@section('title', 'About Us — ' . config('site.name'))

@section('content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content fade-up">
            <span class="section-tag">Our Story</span>
            <h1>Growing Brands Since {{ config('site.founded') }}</h1>
            <p>From a two-person team in Noida to one of India's most trusted digital agencies — we've been helping businesses win online for over 16 years.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-story fade-up">
            <div class="about-story-content">
                <h2>AI-Enabled Digital Marketing Partner</h2>
                <p>{{ config('site.name') }} was founded with a simple belief: every business deserves honest, results-driven digital marketing. What began as a small operation in Noida has grown into a full-service agency serving {{ config('site.clients') }} clients across {{ config('site.countries') }} countries.</p>
                <p>We combine advanced AI technology with the expertise of experienced marketing professionals to create customized strategies that improve brand visibility, increase website traffic, generate qualified leads, and maximize revenue.</p>
                <p>Our comprehensive services include SEO, PPC, Social Media Marketing, Web Development, Shopify, Branding, ORM, and AI Automation — all designed to deliver scalable, future-ready marketing solutions.</p>
            </div>
            <div class="about-stats-grid">
                @foreach($stats as $stat)
                <div class="about-stat fade-up">
                    <span class="stat-value gradient-text">{{ $stat['value'] }}</span>
                    <span class="stat-label">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Our Values</span>
            <h2>What Sets Us Apart</h2>
        </div>
        <div class="approach-grid">
            <div class="approach-card fade-up">
                <div class="approach-icon">🔍</div>
                <h3>Transparency First</h3>
                <p>Live dashboards, clear reporting, and honest communication. You always know exactly where your marketing stands.</p>
            </div>
            <div class="approach-card fade-up">
                <div class="approach-icon">🤖</div>
                <h3>AI + Human Intelligence</h3>
                <p>We leverage AI for insights and automation while senior strategists drive every decision.</p>
            </div>
            <div class="approach-card fade-up">
                <div class="approach-icon">📊</div>
                <h3>Results Accountability</h3>
                <p>We measure success by revenue, leads, and ROAS — not vanity metrics like impressions or likes.</p>
            </div>
            <div class="approach-card fade-up">
                <div class="approach-icon">🌍</div>
                <h3>Global Expertise</h3>
                <p>Experience across 28+ countries with localized strategies for UAE, US, UK, Australia, and India.</p>
            </div>
        </div>
    </div>
</section>

<section class="section timeline-section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Our Journey</span>
            <h2>Milestones That Define Us</h2>
        </div>
        <div class="timeline">
            <div class="timeline-item fade-up">
                <span class="timeline-year">{{ config('site.founded') }}</span>
                <h4>Founded in Noida</h4>
                <p>Started with 2 team members and a commitment to ethical, results-focused SEO.</p>
            </div>
            <div class="timeline-item fade-up">
                <span class="timeline-year">2016</span>
                <h4>Full-Service Agency</h4>
                <p>Expanded into web development, branding, mobile apps, CRO, and advanced PPC. Team crossed 60+ professionals.</p>
            </div>
            <div class="timeline-item fade-up">
                <span class="timeline-year">2020</span>
                <h4>Global Expansion</h4>
                <p>Serving clients across 28+ countries with multi-region campaigns and localized strategies.</p>
            </div>
            <div class="timeline-item fade-up">
                <span class="timeline-year">2024</span>
                <h4>AI-First Agency</h4>
                <p>Pioneering AI search optimization, LLM visibility, and automation solutions for modern brands.</p>
            </div>
        </div>
    </div>
</section>

<section class="section testimonials-section">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">Client Reviews</span>
            <h2>Trusted by {{ config('site.clients') }} Businesses</h2>
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

<section class="section cta-section">
    <div class="container">
        <div class="cta-box fade-up">
            <h2>Let's Build Something Great Together</h2>
            <p>Whether you're a startup or enterprise, we'd love to hear about your growth goals.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Get In Touch</a>
        </div>
    </div>
</section>
@endsection
