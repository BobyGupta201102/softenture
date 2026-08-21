@extends('layouts.app')

@section('title', 'Contact Us — ' . config('site.name'))

@section('content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content fade-up">
            <span class="section-tag">Get In Touch</span>
            <h1>Let's Start Your Growth Journey</h1>
            <p>Get a free AI growth strategy consultation. Our senior strategists will audit your digital presence and recommend the best path forward.</p>
        </div>
    </div>
</section>

<section class="section contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info fade-up">
                <h2>Contact Information</h2>
                <p>Reach out to us via phone, email, or visit our Noida office. We respond within 24 hours.</p>

                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <h4>Phone</h4>
                            <a href="tel:{{ config('site.phone') }}">{{ config('site.phone_display') }}</a>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <h4>Office</h4>
                            <p>{{ config('site.address') }}</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div>
                            <h4>Business Hours</h4>
                            <p>{{ config('site.hours') }}</p>
                        </div>
                    </div>
                </div>

                <div class="contact-map">
                    <iframe
                        src="https://maps.google.com/maps?q=Sector+2+Noida+201301&output=embed"
                        width="100%"
                        height="250"
                        style="border:0; border-radius: 12px;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="SoftEnture Office Location">
                    </iframe>
                </div>
            </div>

            <div class="contact-form-wrapper fade-up">
                @if(session('success'))
                <div class="alert alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="contact-form" id="contactForm">
                    @csrf

                    <h3>Send Us a Message</h3>
                    <p>Fill out the form and we'll get back to you within 24 hours.</p>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="John Doe" class="@error('name') error @enderror">
                            @error('name')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="john@company.com" class="@error('email') error @enderror">
                            @error('email')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210" class="@error('phone') error @enderror">
                            @error('phone')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Your Company" class="@error('company') error @enderror">
                            @error('company')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="service">Service Interested In</label>
                            <select id="service" name="service" class="@error('service') error @enderror">
                                <option value="">Select a service</option>
                                @foreach(config('site.services') as $slug => $svc)
                                <option value="{{ $svc['title'] }}" {{ old('service', request('service')) == $svc['title'] ? 'selected' : '' }}>{{ $svc['title'] }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                            @error('service')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="budget">Monthly Budget</label>
                            <select id="budget" name="budget" class="@error('budget') error @enderror">
                                <option value="">Select budget range</option>
                                <option value="Under ₹25,000" {{ old('budget') == 'Under ₹25,000' ? 'selected' : '' }}>Under ₹25,000</option>
                                <option value="₹25,000 - ₹50,000" {{ old('budget') == '₹25,000 - ₹50,000' ? 'selected' : '' }}>₹25,000 - ₹50,000</option>
                                <option value="₹50,000 - ₹1,00,000" {{ old('budget') == '₹50,000 - ₹1,00,000' ? 'selected' : '' }}>₹50,000 - ₹1,00,000</option>
                                <option value="₹1,00,000 - ₹2,50,000" {{ old('budget') == '₹1,00,000 - ₹2,50,000' ? 'selected' : '' }}>₹1,00,000 - ₹2,50,000</option>
                                <option value="₹2,50,000+" {{ old('budget') == '₹2,50,000+' ? 'selected' : '' }}>₹2,50,000+</option>
                            </select>
                            @error('budget')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Tell us about your project, goals, and timeline..." class="@error('message') error @enderror">{{ old('message') }}</textarea>
                        @error('message')<span class="form-error">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="width:100%;">
                        Send Message
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
