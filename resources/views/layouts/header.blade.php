<!-- === Font Awesome + Bootstrap Icons === -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* ===== Topbar ===== */
    .topbar {
        background-color: #0d6efd;
        font-size: 14px;
        padding: 8px 0;
        color: #fff;
    }

    .topbar .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .topbar .logo-top {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .topbar .logo-top img {
        height: 50px;
    }

    .topbar .contact-info {
        display: flex;
        gap: 25px;
        align-items: center;
        font-weight: 500;
        color: #fff;
        flex-wrap: nowrap;
    }

    .topbar .contact-info i {
        margin-right: 6px;
    }

    .topbar .social-quote {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .topbar .social-quote a {
        color: #fff;
        font-size: 16px;
        transition: 0.3s;
    }

    .topbar .social-quote a:hover {
        color: #d1e3ff;
    }

    .topbar .btn-quote {
        padding: 6px 15px;
        font-weight: 600;
        background: #28a745;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        white-space: nowrap;
    }

    /* ===== Navbar ===== */
    #header {
        background: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .navbar .navbar-brand {
        font-weight: 700;
        font-size: 22px;
        color: #0d6efd !important;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .navbar-nav .nav-link {
        color: #333;
        font-weight: 500;
        transition: 0.3s;
        padding: 12px 15px;
    }

    .navbar-nav .nav-link:hover {
        color: #0d6efd;
    }

    .navbar .btn {
        font-weight: 600;
        padding: 6px 15px;
    }

    .new-badge {
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #28a745;
        color: #fff;
        font-size: 10px;
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 12px;
    }

    /* Dropdown hover and submenu */
    .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }

    .navbar-nav .dropdown-menu {
        background-color: rgba(0, 0, 128, 0.8);
        border: none;
        min-width: 220px;
        padding: 10px 0;
    }

    .navbar-nav .dropdown-menu .dropdown-item {
        color: #fff;
        padding: 10px 20px;
        transition: all 0.3s;
    }

    .navbar-nav .dropdown-menu .dropdown-item:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-left: 0.1rem;
        margin-right: 0.1rem;
    }

    /* Live button styling */
    .nav-link.live-btn {
        position: relative;
        font-weight: 700;
        color: #dc3545 !important;
        /* red text */
    }

    .nav-link.live-btn .live-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-right: 6px;
        background-color: #dc3545;
        border-radius: 50%;
        animation: blink 1s infinite;
        vertical-align: middle;
    }

    /* Blinking animation */
    @keyframes blink {

        0%,
        50%,
        100% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }

    /* Dropdown live item */
    .dropdown-item.live-dropdown {
        position: relative;
        font-weight: 600;
        color: #dc3545 !important;
        /* optional, keeps “Live” red */
    }

    .dropdown-item.live-dropdown .live-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        margin-right: 6px;
        background-color: #dc3545;
        border-radius: 50%;
        animation: blink 1s infinite;
        vertical-align: middle;
    }

    /* Reuse existing blink animation */
    @keyframes blink {

        0%,
        50%,
        100% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }


    /* Radio dropdown animation */
    .dropdown-item.radio-dropdown {
        position: relative;
        font-weight: 600;
        color: #ffc107 !important;
        /* highlight text */
    }

    .dropdown-item.radio-dropdown .radio-wave {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-right: 6px;
        border: 2px solid #ffc107;
        border-radius: 50%;
        animation: wave 1.2s infinite;
        vertical-align: middle;
    }

    /* Radio wave animation */
    @keyframes wave {
        0% {
            transform: scale(0.6);
            opacity: 0.6;
        }

        50% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(0.6);
            opacity: 0.6;
        }
    }


    @media (min-width: 992px) {
        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }
    }

    /* Responsive */
    @media (max-width: 992px) {
        .topbar .container {
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 10px;
        }

        .topbar .contact-info {
            justify-content: center;
            flex-wrap: wrap;
        }

        .topbar .social-quote {
            justify-content: center;
        }

        .navbar-nav {
            gap: 10px;
        }
    }

    @media (min-width: 992px) {
        .navbar-nav .dropdown:hover>.dropdown-menu {
            display: block;
        }

        /* Optional: allow submenu hover */
        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }
    }


    /* Admin login always right */
    .navbar-nav.ms-auto {
        margin-left: auto !important;
    }
</style>

<!-- ===== Topbar ===== -->
<div class="topbar">
    <div class="container">
        <div class="logo-top">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            <span style="font-weight:700; font-size:18px;">Unimax Photography</span>
        </div>

        <div class="contact-info">
            <span class="contact-email">
                <a href="mailto:info@unimaxphotography.co.ke" style="color: #fff; text-decoration: none;">
                    <i class="bi bi-envelope"></i> info@unimaxphotography.co.ke
                </a>
            </span>
            <span class="contact-phone"><i class="bi bi-phone"></i> +254 700 000000</span>
            <span class="contact-location"><i class="bi bi-geo-alt"></i> HQ Meru Town, Kenya</span>
        </div>

        <div class="social-quote">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="btn-quote">Get a Quote</a>
        </div>
    </div>
</div>

<!-- ===== Navbar ===== -->
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <!-- Left nav -->
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                    <!-- About Us Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0 rounded-3 p-2" aria-labelledby="aboutDropdown" style="min-width: 260px; background-color: rgba(0, 0, 128, 0.85);">
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Who We Are</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('about.our-story') }}"><i class="bi bi-info-circle-fill me-2 text-primary"></i> Our Story & Mission</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('about.our-brands') }}"><i class="bi bi-award-fill me-2 text-warning"></i> Our Brands & Achievements</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Find Us</h6>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle text-white-50" href="#"><i class="bi bi-geo-alt-fill me-2 text-danger"></i> Regions & Agents</a>
                                <ul class="dropdown-menu" style="background-color: rgba(0, 0, 128, 0.85);">
                                    <li><a class="dropdown-item text-white-50" href="#">Meru</a></li>
                                    <li><a class="dropdown-item text-white-50" href="#">Nairobi</a></li>
                                    <li><a class="dropdown-item text-white-50" href="#">Mombasa</a></li>
                                    <li><a class="dropdown-item text-white-50" href="#">Kisumu</a></li>
                                    <li><a class="dropdown-item text-white-50" href="#">Nakuru</a></li>
                                    <li><a class="dropdown-item text-white-50" href="#">Eldoret</a></li>
                                    <li><a class="dropdown-item text-white-50" href="#">Thika</a></li>
                                </ul>
                            </li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Join Our Team</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('about.careers') }}"><i class="bi bi-briefcase-fill me-2 text-success"></i> Careers & Opportunities</a></li>
                        </ul>
                    </li>

                    <!-- Photography Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="photographyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Photography
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0 rounded-3 p-2" aria-labelledby="photographyDropdown" style="min-width: 260px; background-color: rgba(0, 0, 128, 0.85);">

                            <!-- Lifestyle Section -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Lifestyle & Portraits</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.portrait') }}">
                                    <i class="bi bi-person-fill me-2 text-info"></i> Portrait Photography
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.family') }}">
                                    <i class="bi bi-people-fill me-2 text-primary"></i> Family Photography
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.studio') }}">
                                    <i class="bi bi-camera-fill me-2 text-warning"></i> Studio Sessions & Hire
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Events Section -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Events & Celebrations</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.weddings') }}">
                                    <i class="bi bi-heart-fill me-2 text-danger"></i> Weddings & Engagements
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.parties') }}">
                                    <i class="bi bi-music-note-beamed me-2 text-success"></i> Parties & Concerts
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.graduation') }}">
                                    <i class="bi bi-mortarboard-fill me-2 text-warning"></i> Graduation Photography
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.corporate') }}">
                                    <i class="bi bi-buildings-fill me-2 text-primary"></i> Corporate & Event Coverage
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.school') }}">
                                    <i class="bi bi-bank me-2 text-info"></i> School & Institutional Photography
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Creative Section -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Creative & Commercial</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.product') }}">
                                    <i class="bi bi-box-seam me-2 text-warning"></i> Product Photography
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.outdoor') }}">
                                    <i class="bi bi-tree-fill me-2 text-success"></i> Outdoor & Nature Shoots
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('photo.social') }}">
                                    <i class="bi bi-lightning-fill me-2 text-danger"></i> TikTok & Social Media Shoots
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Videography Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="videographyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Videography
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0 rounded-3 p-2" aria-labelledby="videographyDropdown" style="min-width: 260px; background-color: rgba(0, 0, 128, 0.85);">

                            <!-- Events Section -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Events & Ceremonies</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.weddings') }}">
                                    <i class="bi bi-heart-fill me-2 text-danger"></i> Weddings & Engagements
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.parties') }}">
                                    <i class="bi bi-people-fill me-2 text-primary"></i> Parties & Concerts
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.school') }}">
                                    <i class="bi bi-mortarboard-fill me-2 text-warning"></i> School & Graduation Events
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.corporate') }}">
                                    <i class="bi bi-building me-2 text-info"></i> Corporate & Brand Events
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Personal & Lifestyle -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Personal & Lifestyle</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.family') }}">
                                    <i class="bi bi-person-video3 me-2 text-success"></i> Family & Personal Videos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.product') }}">
                                    <i class="bi bi-camera-reels-fill me-2 text-warning"></i> Product Videography
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.outdoor') }}">
                                    <i class="bi bi-tree-fill me-2 text-info"></i> Outdoor & Lifestyle Shoots
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Digital & Social Media -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Digital & Social Media</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('video.social') }}">
                                    <i class="bi bi-camera-video-fill me-2 text-danger"></i> TikTok & Social Media Videos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item live-dropdown" href="{{ route('video.live') }}">
                                    <span class="live-dot"></span>
                                    <i class="bi bi-film me-2 text-warning"></i> Live Shows & Streaming
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Academy Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="academyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Academy
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0 rounded-3 p-2" aria-labelledby="academyDropdown" style="min-width: 260px; background-color: rgba(0, 0, 128, 0.85);">

                            <!-- Training & Courses -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Training & Courses</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('academy.photography') }}">
                                    <i class="bi bi-camera-fill me-2 text-warning"></i> Photography Training
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('academy.certifications') }}">
                                    <i class="bi bi-patch-check-fill me-2 text-success"></i> Certifications & Accreditations
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Practical Experience -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Practical Experience</h6>
                            </li>
                            <li>
                                <a class="dropdown-item text-white-50" href="{{ route('about.internships') }}">
                                    <i class="bi bi-journal-check me-2 text-info"></i> Internships & Attachments</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Custom Learning -->
                            <li>
                                <a class="dropdown-item text-white fw-semibold" href="{{ route('packages.custom') }}">
                                    <i class="bi bi-envelope-check me-2 text-success"></i> Request a Custom Training Plan
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Other Services Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="otherServicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Others
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0 rounded-3 p-2" aria-labelledby="otherServicesDropdown" style="min-width: 260px; background-color: rgba(0, 0, 128, 0.85);">

                            <!-- Creative Services -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Creative & Media Services</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('others.printing') }}"><i class="bi bi-printer-fill me-2 text-warning"></i> Printing & Branding</a></li>
                            <li><a class="dropdown-item radio-dropdown" href="{{ route('others.radio') }}"><span class="radio-wave"></span><i class="bi bi-broadcast-pin me-2 text-danger"></i> Radio Hosting & Advertising</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('others.hirecrew') }}"><i class="bi bi-person-lines-fill me-2 text-primary"></i> Hire Professional Crew</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Support & Production -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Support & Production</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('others.eventplanning') }}"><i class="bi bi-calendar2-event-fill me-2 text-info"></i> Event Planning Support</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('others.photoediting') }}"><i class="bi bi-pencil-fill me-2 text-warning"></i> Photo Editing & Retouching</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('others.drone') }}"><i class="bi bi-camera-video-fill me-2 text-success"></i> Drone Photography & Videography</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>
                        </ul>
                    </li>

                    <!-- Packages & Pricing Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="packagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Packages
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0 rounded-3 p-2" aria-labelledby="packagesDropdown" style="min-width: 260px; background-color: rgba(0, 0, 128, 0.85);">

                            <!-- Photography -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Photography</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('packages.photography.lifestyle') }}"><i class="bi bi-camera-fill me-2 text-primary"></i> Lifestyle & Portrait Packages</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('packages.photography.wedding') }}"><i class="bi bi-heart-fill me-2 text-danger"></i> Wedding & Engagement Packages</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('packages.photography.family') }}"><i class="bi bi-people-fill me-2 text-info"></i> Family & Group Packages</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Videography -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Videography</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('packages.videography.event') }}"><i class="bi bi-film me-2 text-warning"></i> Event & Ceremony Coverage</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('packages.videography.cinematic') }}"><i class="bi bi-camera-reels-fill me-2 text-success"></i> Cinematic Productions</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Business & Premium -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Business & Premium</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('packages.business.corporate') }}"><i class="bi bi-building me-2 text-primary"></i> Corporate & Brand Packages</a></li>
                            <li><a class="dropdown-item text-white-50" href="{{ route('packages.business.premium') }}"><i class="bi bi-gem me-2 text-warning"></i> Premium All-Inclusive Deals</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Custom Quote -->
                            <li><a class="dropdown-item text-white fw-semibold" href="{{ route('packages.custom') }}"><i class="bi bi-envelope-check me-2 text-success"></i> Request a Custom Quote</a></li>
                        </ul>
                    </li>


                    <!--  Softwares Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="softwaresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Softwares
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0 rounded-3 p-2" aria-labelledby="softwaresDropdown" style="min-width: 280px; background-color: rgba(0, 0, 128, 0.85);">

                            <!-- Development Services -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Development Services</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-code-slash me-2 text-warning"></i> Software Development</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-globe2 me-2 text-info"></i> Website Development</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-phone-fill me-2 text-primary"></i> Mobile App Development</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-cloud-fill me-2 text-info"></i> Cloud Solutions</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-shield-lock-fill me-2 text-danger"></i> Cybersecurity Solutions</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Business Solutions -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Business Solutions</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-cash-stack me-2 text-success"></i> Point of Sale Systems</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-palette-fill me-2 text-danger"></i> Graphic Designs</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-server me-2 text-secondary"></i> Web Hosting</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-bar-chart-fill me-2 text-warning"></i> Business Analytics Software</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-person-lines-fill me-2 text-info"></i> CRM Solutions</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Tools & Utilities -->
                            <li>
                                <h6 class="dropdown-header text-white text-uppercase">Tools & Utilities</h6>
                            </li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-pencil-square me-2 text-success"></i> Design Tools</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-hdd-stack-fill me-2 text-primary"></i> Database Management</a></li>
                            <li><a class="dropdown-item text-white-50" href="#"><i class="bi bi-lightning-fill me-2 text-warning"></i> Automation Tools</a></li>

                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>

                            <!-- Custom Requests -->
                            <li><a class="dropdown-item text-white fw-semibold" href="{{ route('packages.custom') }}"><i class="bi bi-envelope-check me-2 text-success"></i> Request Custom Software</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link live-btn" href="{{ route('video.live') }}">
                            <span class="live-dot"></span> Live
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>

                </ul>

                <!-- Right Admin Login -->
                <!-- <ul class="navbar-nav ms-auto align-items-lg-center">
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Admin</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-primary btn-sm ms-2">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary">Admin</a>
                    </li>
                    @endauth
                </ul> -->

            </div>
        </div>
    </nav>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdowns = document.querySelectorAll('.navbar .dropdown');

        function handleDropdownClick(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                const menu = this.querySelector('.dropdown-menu');
                const isShown = menu.classList.contains('show');

                document.querySelectorAll('.navbar .dropdown-menu.show').forEach(function(openMenu) {
                    openMenu.classList.remove('show');
                });

                menu.classList.toggle('show', !isShown);
            }
        }

        dropdowns.forEach(function(dropdown) {
            dropdown.querySelector('.dropdown-toggle').addEventListener('click', handleDropdownClick);
        });

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.navbar')) {
                document.querySelectorAll('.navbar .dropdown-menu.show').forEach(function(openMenu) {
                    openMenu.classList.remove('show');
                });
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                document.querySelectorAll('.navbar .dropdown-menu.show').forEach(function(openMenu) {
                    openMenu.classList.remove('show');
                });
            }
        });
    });
</script>