@extends('layouts.app')

@section('title', 'School & Institutional Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/school.css') }}">
@endpush

@php
$school = $school ?? null;

$heroBg = ($school && !empty($school->hero_image))
? asset('storage/' . $school->hero_image)
: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($school && !empty($school->hero_right_image))
? asset('storage/' . $school->hero_right_image)
: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1600&auto=format&fit=crop';

$defaultGallery = [
['src' => 'https://images.unsplash.com/photo-1596495577886-d920f1f1ff56?q=80&w=1600&auto=format&fit=crop', 'title' => 'School Assembly', 'description' => 'Professional coverage of school gatherings and ceremonies.'],
['src' => 'https://images.unsplash.com/photo-1562072543-107f5f39c0b1?q=80&w=1600&auto=format&fit=crop', 'title' => 'Sports Day', 'description' => 'Capture every exciting moment of the school\'s sports events.'],
['src' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1600&auto=format&fit=crop', 'title' => 'Graduation', 'description' => 'Memorable graduation ceremony photography with professional quality.'],
];

$galleryImages = ($gallery && $gallery->count() > 0)
? $gallery->map(fn($img) => [
'src' => asset('storage/' . $img),
'title' => '',
'description' => ''
])
: $defaultGallery;

$defaultServices = [
['icon' => 'bi bi-mortarboard-fill', 'title' => 'Graduations', 'description' => 'Professional coverage of graduation ceremonies capturing every moment.'],
['icon' => 'bi bi-people-fill', 'title' => 'School Events', 'description' => 'Sports days, assemblies, and other key events documented beautifully.'],
['icon' => 'bi bi-building', 'title' => 'Institutional Ceremonies', 'description' => 'Events, award ceremonies, and institutional gatherings professionally photographed.'],
];

$services = ($school && !empty($school->services)) ? $school->services : $defaultServices;

$defaultTestimonials = [
['text' => 'Our school sports day was captured perfectly — the photos are vivid and professional.', 'author' => 'School Administrator'],
['text' => 'The graduation photos were delivered promptly and looked amazing!', 'author' => 'Parent Committee'],
];

$testimonials = ($school && !empty($school->testimonials)) ? $school->testimonials : $defaultTestimonials;

$defaultStats = [
['value' => 0, 'title' => 'School Events Covered'],
['value' => 0, 'title' => 'Photos Delivered'],
['value' => 0, 'title' => 'Years of Experience'],
['value' => 0, 'title' => 'Client Satisfaction'],
];

$stats = ($school && !empty($school->stats)) ? $school->stats : $defaultStats;

$heroTitle = ($school && !empty($school->title)) ? $school->title : 'School & Institutional Photography';
$heroDescription = ($school && !empty($school->description)) ? $school->description : 'We capture school events, graduations, sports, and institutional ceremonies with vibrant, professional photography that preserves memories.';
$ctaTitle = ($school && !empty($school->cta_title)) ? $school->cta_title : 'Book Your School Event Today';
$ctaDescription = ($school && !empty($school->cta_description)) ? $school->cta_description : 'Ensure every moment at your school or institution is captured professionally and beautifully.';
@endphp

@section('content')
<!-- ===== HERO ===== -->
<section class="school-hero" style="background: linear-gradient(120deg, rgba(52, 152, 219, 0.85), rgba(241, 196, 15, 0.2)), url('{{ $heroBg }}') center/cover;">
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
            <img src="{{ $heroRight }}" alt="Studio setup" loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>
    </div>
</section>

<div class="page-container" id="gallery">
    <!-- ============= School GALLERY SLIDER ============= -->
    <section aria-label="School Gallery" style="margin-top: 5rem;">
        <div class="slider" id="schoolSlider" style="max-width:1200px; margin:0 auto;">
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
<script src="{{ asset('js/public/photography/school.js') }}"></script>

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