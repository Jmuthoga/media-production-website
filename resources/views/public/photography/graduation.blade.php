@extends('layouts.app')

@section('title', 'Graduations & Ceremonies')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/graduation.css') }}">
@endpush

@php
$graduation = $graduation ?? null;

$heroBg = ($graduation && !empty($graduation->hero_image))
? asset('storage/' . $graduation->hero_image)
: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($graduation && !empty($graduation->hero_right_image))
? asset('storage/' . $graduation->hero_right_image)
: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop';

$defaultGallery = [
['src' => 'https://images.unsplash.com/photo-1551218808-94e220e084d2?q=80&w=1600&auto=format&fit=crop', 'title' => 'Graduation Ceremony', 'description' => 'Proud moments and happy faces on graduation day.'],
['src' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=1600&auto=format&fit=crop', 'title' => 'Cap Toss', 'description' => 'Joyful celebration as students toss their caps.'],
['src' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1600&auto=format&fit=crop', 'title' => 'Family & Friends', 'description' => 'Capturing proud family moments and applause.'],
['src' => 'https://images.unsplash.com/photo-1520962918690-0d1b8b540057?q=80&w=1600&auto=format&fit=crop', 'title' => 'Graduates Smiling', 'description' => 'Memorable smiles and group photos.'],
];

$galleryImages = ($gallery && $gallery->count() > 0)
? $gallery->map(fn($img) => [
'src' => asset('storage/' . $img),
'title' => '',
'description' => ''
])
: $defaultGallery;

$defaultServices = [
['icon' => 'bi bi-mortarboard-fill', 'title' => 'Ceremony Coverage', 'description' => 'From processions to speeches, every moment captured in style.'],
['icon' => 'bi bi-camera-reels-fill', 'title' => 'Portrait Sessions', 'description' => 'Professional close-ups and posed shots for graduates and family.'],
['icon' => 'bi bi-people-fill', 'title' => 'Group & Family Shots', 'description' => 'Memorable photos with friends, classmates, and loved ones.'],
];

$services = ($graduation && !empty($graduation->services)) ? $graduation->services : $defaultServices;

$defaultTestimonials = [
['text' => 'Our graduation photos were stunning — the colors and emotions were perfectly captured!', 'author' => 'University Alumni'],
['text' => 'Professional, timely, and fun! They made our graduation day unforgettable.', 'author' => 'Jane, Graduate'],
];

$testimonials = ($graduation && !empty($graduation->testimonials)) ? $graduation->testimonials : $defaultTestimonials;

$defaultStats = [
['value' => 0, 'title' => 'Graduations Covered'],
['value' => 0, 'title' => 'Memorable Photos'],
['value' => 0, 'title' => 'Years of Experience'],
['value' => 0, 'title' => 'Client Satisfaction'],
];

$stats = ($graduation && !empty($graduation->stats)) ? $graduation->stats : $defaultStats;

$heroTitle = ($graduation && !empty($graduation->title)) ? $graduation->title : 'Graduation Photography — Capture the Achievement';
$heroDescription = ($graduation && !empty($graduation->description)) ? $graduation->description : 'Capture the excitement, pride, and memories of your graduation day with professional photography tailored for ceremonies, gowns, and celebrations.';
$ctaTitle = ($graduation && !empty($graduation->cta_title)) ? $graduation->cta_title : 'Celebrate Your Achievement';
$ctaDescription = ($graduation && !empty($graduation->cta_description)) ? $graduation->cta_description : 'Book your graduation photography session now and preserve your proudest moments in vibrant, professional images.';
@endphp

@section('content')

<!-- ===== HERO ===== -->
<section class="grad-hero"
    style="background: linear-gradient(120deg, rgba(13, 27, 42, 0.9), rgba(60, 9, 108, 0.85)), url('{{ $heroBg }}') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right" style="flex:1; max-width:600px; height:75vh; overflow:hidden; display:flex; align-items:flex-start;">
            <img src="{{ $heroRight }}" alt="Graduation" loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ============= GRADUATION GALLERY SLIDER ============= -->
    <section aria-label="Graduation Gallery" style="margin-top: 5rem;">
        <div class="slider" id="gradSlider" style="max-width:1200px; margin:0 auto;">
            <div class="slider-main" id="sliderMain" style="position:relative; height:80vh; overflow:hidden; background:#fff;">
                @foreach($galleryImages as $index => $img)
                <div class="slide" data-index="{{ $index }}" tabindex="{{ $index === 0 ? '0' : '-1' }}" aria-hidden="{{ $index === 0 ? 'false' : 'true' }}" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:{{ $index === 0 ? '1' : '0' }}; transition:opacity 0.4s; text-align:center; background:#fff;">
                    <img class="zoomable" src="{{ $img['src'] }}" alt="{{ $img['title'] ?? '' }}" loading="lazy" style="width:auto; max-width:90%; max-height:80vh; object-fit:contain; display:inline-block; margin:0 auto; transition: transform 0.2s; cursor:grab;">
                    <div class="caption" style="margin-top:1rem; text-align:center;">
                        <h4>{{ $img['title'] ?? '' }}</h4>
                        <p>{{ $img['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach

                <!-- Slider controls -->
                <div class="slider-controls"
                    style="position:absolute; top:50%; left:0; right:0; display:flex; justify-content:space-between; transform:translateY(-50%);">

                    <button id="prevBtn"
                        style="background:black; color:white; border:none; width:45px; height:45px; border-radius:50%; 
               font-size:20px; display:flex; align-items:center; justify-content:center; cursor:pointer;
               box-shadow:0 2px 6px rgba(0,0,0,0.3);">
                        ◀
                    </button>

                    <button id="nextBtn"
                        style="background:black; color:white; border:none; width:45px; height:45px; border-radius:50%; 
               font-size:20px; display:flex; align-items:center; justify-content:center; cursor:pointer;
               box-shadow:0 2px 6px rgba(0,0,0,0.3);">
                        ▶
                    </button>

                </div>

                <div class="zoom-controls" style="position:absolute; bottom:10px; left:50%; transform:translateX(-50%); display:flex; gap:0.5rem;">
                    <button id="zoomIn">Zoom +</button>
                    <button id="zoomOut">Zoom -</button>
                </div>
            </div>

            <aside class="slider-thumbs" style="display:flex; flex-direction:column; align-items:center; margin-top:1rem;">
                <div id="thumbsContainer" style="display:flex; gap:0.5rem; flex-wrap:wrap; justify-content:center;"></div>
                <div id="thumbPagination" style="margin-top:0.5rem; display:flex; gap:0.5rem; justify-content:center;">
                    <button id="prevThumbs">◀</button>
                    <button id="nextThumbs">▶</button>
                </div>
            </aside>
        </div>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        @foreach($services as $s)
        <div class="service">
            <i class="{{ $s['icon'] }}"></i>
            <h4>{{ $s['title'] }}</h4>
            <p>{{ $s['description'] }}</p>
        </div>
        @endforeach
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        @foreach($testimonials as $t)
        <div class="testimonial">
            <p>"{{ $t['text'] }}"</p>
            <div class="who">— {{ $t['author'] }}</div>
        </div>
        @endforeach
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        @foreach($stats as $i => $st)
        <div class="stat">
            <h3 id="stat{{ $i }}">{{ $st['value'] ?? 0 }}</h3>
            <p>{{ $st['title'] }}</p>
        </div>
        @endforeach
    </section>

    <section class="cta">
        <div class="left">
            <h3>{{ $ctaTitle }}</h3>
            <p>{{ $ctaDescription }}</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/graduation.js') }}"></script>

<script>
    const allThumbs = @json($galleryImages);
    const thumbsPerPage = 5;
    let currentThumbPage = 0;

    const thumbsContainer = document.getElementById('thumbsContainer');

    function renderThumbs() {
        thumbsContainer.innerHTML = '';
        const start = currentThumbPage * thumbsPerPage;
        const end = start + thumbsPerPage;
        const pageThumbs = allThumbs.slice(start, end);

        pageThumbs.forEach((img, index) => {
            const thumbDiv = document.createElement('div');
            thumbDiv.className = 'thumb';
            thumbDiv.dataset.index = start + index;
            thumbDiv.style.width = '150px';
            thumbDiv.style.height = '100px';
            thumbDiv.style.overflow = 'hidden';
            thumbDiv.style.cursor = 'pointer';
            thumbDiv.style.borderRadius = '5px';

            const thumbImg = document.createElement('img');
            thumbImg.src = img.src;
            thumbImg.alt = img.title;
            thumbImg.loading = 'lazy';
            thumbImg.style.width = '100%';
            thumbImg.style.height = '100%';
            thumbImg.style.objectFit = 'cover';
            thumbImg.style.objectPosition = 'top';

            thumbDiv.appendChild(thumbImg);
            thumbDiv.addEventListener('click', () => {
                if (typeof showSlide === 'function') showSlide(start + index);
            });

            thumbsContainer.appendChild(thumbDiv);
        });
    }

    document.getElementById('prevThumbs').addEventListener('click', () => {
        if (currentThumbPage > 0) {
            currentThumbPage--;
            renderThumbs();
        }
    });

    document.getElementById('nextThumbs').addEventListener('click', () => {
        if ((currentThumbPage + 1) * thumbsPerPage < allThumbs.length) {
            currentThumbPage++;
            renderThumbs();
        }
    });

    renderThumbs();
</script>
@endpush