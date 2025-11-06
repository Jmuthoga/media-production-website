@extends('layouts.app')

@section('title', 'Internship & Attachment')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/aboutus/internship.css') }}">
@endpush

@section('content')

<section class="internship-hero"
    style="background: linear-gradient(rgba(0, 43, 255, 0.65), rgba(0, 85, 255, 0.65)),
         url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=80')
         center/cover no-repeat;">
    <canvas id="intern-lines"></canvas>
    <div class="content">
        <div class="text-box">
            <h2>Join Our Internship & Attachment Programs</h2>
            <p>Hands-on training, mentorship, and real project experience to help you build a career in photography & media production.</p>
        </div>
        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=80" alt="Internship Team">
    </div>
</section>


<!-- Internship Section -->
<section class="internship-section py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2>About Our Programs</h2>
                <p class="text-muted" style="line-height:1.8;">Our Internship program is 3 months full-time, while the Attachment program is 1 month. Participants gain real project experience, mentorship, and professional skill development.</p>
                <p class="text-muted" style="line-height:1.8;">Access professional equipment, build a portfolio, and network with industry experts to kickstart your creative career.</p>

                <div class="row text-center mt-4">
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-primary"><span class="counter" data-target="200">0</span>+</h3>
                        <p class="text-muted mb-0">Successful Interns</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-primary"><span class="counter" data-target="50">0</span>+</h3>
                        <p class="text-muted mb-0">Mentors & Staff</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <div class="video-box shadow-lg rounded overflow-hidden position-relative">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/nXo4uQ1iA3Y?autoplay=0&mute=1&rel=0&showinfo=0" title="Internship Overview" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-success"><span class="counter" data-target="150">0</span>+</h3>
                        <p class="text-muted mb-0">Projects Completed</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-success"><span class="counter" data-target="5">0</span>+</h3>
                        <p class="text-muted mb-0">Years Running</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Roles Section -->
<section class="roles-section py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5"
            style="background: linear-gradient(90deg, #0d6efd, #00c6ff, #0072ff);
           -webkit-background-clip: text;
           -webkit-text-fill-color: transparent;
           font-weight: 700;
           letter-spacing: 1px;">
            Join Our Creative Team
        </h2>
        <div class="row g-4">
            <!-- Photographer -->
            <div class="col-md-4">
                <div class="role-card">
                    <div class="role-bg" style="background-image: url('https://images.unsplash.com/photo-1524635962361-f25b8c3fcf83?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="role-overlay"></div>
                    <div class="role-content">
                        <h3 class="role-title"><i class="bi bi-camera-fill"></i> Photographer Intern</h3>
                        <span class="role-status open">Open</span>
                        <p class="role-desc">Work on real photoshoots, learn studio & outdoor photography, and build a professional portfolio.</p>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- Videographer -->
            <div class="col-md-4">
                <div class="role-card">
                    <div class="role-bg" style="background-image: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="role-overlay"></div>
                    <div class="role-content">
                        <h3 class="role-title"><i class="bi bi-camera-reels"></i> Videographer Intern</h3>
                        <span class="role-status open">Open</span>
                        <p class="role-desc">Capture, edit, and produce cinematic videos while learning modern storytelling techniques.</p>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- Photo Editor -->
            <div class="col-md-4">
                <div class="role-card">
                    <div class="role-bg" style="background-image: url('https://images.unsplash.com/photo-1504198453319-5ce911bafcde?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="role-overlay"></div>
                    <div class="role-content">
                        <h3 class="role-title"><i class="bi bi-image"></i> Photo Editor Intern</h3>
                        <span class="role-status closed">Closed</span>
                        <p class="role-desc">Edit and retouch client photos for professional projects, building practical skills.</p>
                        <a href="#" class="btn btn-closed">Closed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Offer Section -->
<section class="offer-section py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">What We Offer</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-camera-fill"></i>
                    <h4>Professional Experience</h4>
                    <p>Hands-on experience with cameras, lighting, and video equipment on real projects.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-person-badge-fill"></i>
                    <h4>Mentorship & Guidance</h4>
                    <p>Learn from industry professionals and improve your skills on live projects.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-folder2-open"></i>
                    <h4>Portfolio Building</h4>
                    <p>Get portfolio-ready work through real assignments and creative projects.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-people-fill"></i>
                    <h4>Networking</h4>
                    <p>Connect with creative professionals and receive career guidance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Requirements Section -->
<section class="requirements-section py-5 bg-gradient-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Requirements</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <ul class="requirements-list">
                    <li><i class="bi bi-lightning-fill"></i>Passionate about photography, videography, or media production</li>
                    <li><i class="bi bi-tools"></i>Basic knowledge of cameras & editing software</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="requirements-list">
                    <li><i class="bi bi-clock-fill"></i>Full-time internship (3 months) or part-time attachment (1 month)</li>
                    <li><i class="bi bi-chat-dots-fill"></i>Good communication skills & eagerness to learn</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
<script src="{{ asset('js/public/aboutus/internship.js') }}"></script>
@endpush