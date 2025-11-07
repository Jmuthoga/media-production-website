@extends('layouts.app')

@section('title', 'Contact Us')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/contact.css') }}">
@endpush

@section('content')
<!-- ======= Hero Section ======= -->
<section class="hero-section position-relative d-flex align-items-center justify-content-center text-center text-white">
    <div class="hero-bg"
        style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1920&q=80');">
    </div>
    <!-- Gradient Overlay -->
    <div class="hero-overlay"></div>
    <!-- Content -->
    <div class="container position-relative z-2">
        <h1 class="hero-title fw-bold mb-3">Contact <span>Unimax Studio</span></h1>
        <p class="hero-subtitle mb-4">
            We capture not just images, but the feelings behind them — transforming real moments into timeless memories you’ll cherish for life.
        </p>
        <a href="#contact" class="btn btn-hero px-4 py-2 fw-semibold rounded-pill">Get in Touch</a>
    </div>
</section>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs position-relative py-4"
    style="background: linear-gradient(135deg, #f8fafc 0%, #eef3f8 100%); border-bottom: 1px solid rgba(0,0,0,0.05);">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
            <div class="mb-2 mb-md-0">
                <h2 class="fw-bold text-primary mb-1" style="font-size: 2rem;">Contact Us</h2>
                <p class="text-muted mb-0" style="font-size: 0.95rem;">
                    We’re here to help — let’s start a conversation.
                </p>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none text-secondary">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">
                        Contact
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact py-5" style="background-color: #f8f9fc;">
    <div class="container">

        <!-- ======= Visit Section ======= -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">

                <div class="info-wrap p-4 p-lg-5 shadow-lg rounded-4 bg-white border-0 position-relative overflow-hidden">
                    <!-- Decorative Accent Line -->
                    <div class="position-absolute top-0 start-0 w-100"
                        style="height: 5px; background: linear-gradient(90deg, #0d6efd, #d4af37);"></div>

                    <div class="row text-center">
                        <div class="col-12 mb-4">
                            <h3 class="fw-bold text-dark mb-2" style="font-size: 1.9rem;">Visit Our Creative Studio</h3>
                            <p class="text-muted fs-6">
                                Step into the world where artistry meets technology, where we capture life’s moments
                                through the perfect blend of <strong>photography</strong> and <strong>videography</strong>.
                            </p>
                        </div>

                        <div class="col-lg-4 info mb-4 mb-lg-0">
                            <div class="p-3 rounded-3 hover-card">
                                <i class="icofont-google-map fs-2 text-accent mb-2"></i>
                                <h5 class="fw-semibold text-dark">Studio Location</h5>
                                <p class="text-muted small mb-0">Meru Town, Kenya</p>
                            </div>
                        </div>

                        <div class="col-lg-4 info mb-4 mb-lg-0">
                            <div class="p-3 rounded-3 hover-card">
                                <i class="icofont-envelope fs-2 text-accent mb-2"></i>
                                <h5 class="fw-semibold text-dark">Email Us</h5>
                                <p class="text-muted small mb-0">info@unimax.co.ke</p>
                            </div>
                        </div>

                        <div class="col-lg-4 info">
                            <div class="p-3 rounded-3 hover-card">
                                <i class="icofont-phone fs-2 text-accent mb-2"></i>
                                <h5 class="fw-semibold text-dark">Call or WhatsApp</h5>
                                <p class="text-muted small mb-0">+254 791 446 968</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Message + Map Row -->
        <div class="row mt-4 justify-content-center g-4">

            <!-- Message Form -->
            <div class="col-lg-6 order-lg-1 order-1">
                <div class="contact-form-wrapper p-4 p-lg-5 shadow-sm rounded bg-white border border-light-subtle">
                    <h3 class="mb-3 text-accent fw-bold">Get in Touch</h3>
                    <p class="mb-4 text-muted">Send us an inquiry and we'll get back to you within 24 hours.</p>

                    @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                    <form action="" method="post">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name" class="fw-semibold">Your Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="email" class="fw-semibold">Your Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email address" required />
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="phone" class="fw-semibold">Phone <span class="text-danger">*</span></label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="e.g. +254 700 000000" required />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="interest" class="fw-semibold">Area of Interest <span class="text-danger">*</span></label>
                                <select id="interest" name="interest" class="form-control" required>
                                    <option value="">-- Select an option --</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Videography">Videography</option>
                                    <option value="Event Coverage">Event Coverage</option>
                                    <option value="Studio Session">Studio Session</option>
                                    <option value="Drone Shoots">Drone Shoots</option>
                                    <option value="Editing & Post Production">Editing & Post Production</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject" class="fw-semibold">Subject <span class="text-danger">*</span></label>
                            <input type="text" id="subject" class="form-control" name="subject" placeholder="Subject of your message" required />
                        </div>

                        <div class="form-group mb-4">
                            <label for="message" class="fw-semibold">Message <span class="text-danger">*</span></label>
                            <textarea id="message" class="form-control" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>

                        <button class="btn btn-accent btn-block py-2" type="submit" style="font-weight:600;">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Map -->
            <div class="col-lg-6 order-lg-2 order-2">
                <iframe
                    style="border:0; width:100%; height:100%; min-height:420px; border-radius:12px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1995.047319738827!2d36.81478987621131!3d-1.270053135902092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f173b1a7bde1b%3A0x5a1c4f4f1b3f6a36!2sWestlands%20Square%20Shopping%20Mall%2C%20Ring%20Road%2C%20Parklands%2C%20Nairobi%2C%20Kenya!5e0!3m2!1sen!2sus!4v1682101234567"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection