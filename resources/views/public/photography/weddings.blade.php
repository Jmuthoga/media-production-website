@extends('layouts.app')

@section('title', 'Weddings & Engagements')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/weddings.css') }}">
@endpush

@php
/* ============================================================
SAFE BACKEND FALLBACK SYSTEM FOR WEDDINGS PAGE
============================================================ */
$wedding = $wedding ?? null;

/* ===========================
HERO IMAGES
=========================== */
$heroBg = ($wedding && !empty($wedding->hero_image))
? asset('storage/' . $wedding->hero_image)
: 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($wedding && !empty($wedding->hero_right_image))
? asset('storage/' . $wedding->hero_right_image)
: 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1200&auto=format&fit=crop';

/* ===========================
GALLERY IMAGES
=========================== */
$defaultGallery = [
[
'src' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1600&auto=format&fit=crop',
'title' => 'Elegant Wedding Moments',
'description' => 'Capturing your most magical day beautifully and authentically.',
],
[
'src' => 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop',
'title' => 'Romantic Engagements',
'description' => 'Celebrate your love story with intimate engagement sessions.',
],
[
'src' => 'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=1600&auto=format&fit=crop',
'title' => 'Bridal Details',
'description' => 'Every lace, ring, and petal captured in artistic perfection.',
],
[
'src' => 'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=1600&auto=format&fit=crop',
'title' => 'Grand Celebrations',
'description' => 'Unforgettable moments filled with joy and love.',
],
];

$galleryImages = [];
if (!empty($gallery) && count($gallery) > 0) {
foreach ($gallery as $imgPath) {
$galleryImages[] = [
'src' => asset('storage/' . $imgPath),
'title' => '',
'description' => '',
];
}
} else {
$galleryImages = $defaultGallery;
}

/* ===========================
SERVICES
=========================== */
$defaultServices = [
['icon'=>'bi bi-heart-fill','title'=>'Engagement Shoots','description'=>'Capture your love story before the big day.'],
['icon'=>'bi bi-camera-fill','title'=>'Wedding Day Coverage','description'=>'Every moment documented in timeless detail.'],
['icon'=>'bi bi-gift-fill','title'=>'Albums & Prints','description'=>'Premium prints and handcrafted albums.'],
];

$services = ($wedding && !empty($wedding->services)) ? $wedding->services : $defaultServices;

/* ===========================
TESTIMONIALS
=========================== */
$defaultTestimonials = [
['text'=>'They made our wedding memories unforgettable!','author'=>'Mr. & Mrs. Njoroge'],
['text'=>'Our engagement shoot was magical!','author'=>'Angela & Peter'],
];

$testimonials = ($wedding && !empty($wedding->testimonials)) ? $wedding->testimonials : $defaultTestimonials;

/* ===========================
STATS
=========================== */
$defaultStats = [
['value'=>0,'title'=>'Weddings Captured'],
['value'=>0,'title'=>'Engagement Sessions'],
['value'=>0,'title'=>'Professional Photographers'],
['value'=>0,'title'=>'Years of Experience'],
];

$stats = ($wedding && !empty($wedding->stats)) ? $wedding->stats : $defaultStats;

/* ===========================
HERO TEXT & CTA
=========================== */
$heroTitle = ($wedding && !empty($wedding->title)) ? $wedding->title : 'Weddings & Engagements — Your Forever Begins Here';
$heroDescription = ($wedding && !empty($wedding->description)) ? $wedding->description : 'We capture every emotion, every detail, and every spark — from intimate engagements to grand wedding celebrations.';
$ctaTitle = ($wedding && !empty($wedding->cta_title)) ? $wedding->cta_title : 'Let’s Tell Your Love Story';
$ctaDescription = ($wedding && !empty($wedding->cta_description)) ? $wedding->cta_description : 'We’re here to make your wedding day memories eternal — elegant, emotional, and extraordinary.';
@endphp

@section('content')

<!-- ===== HERO ===== -->
<section class="wedding-hero"
    style="background: linear-gradient(120deg, rgba(229,152,155,0.75), rgba(181,131,141,0.75)), url('{{ $heroBg }}') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book Your Date</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right" style="flex:1; max-width:600px; height:75vh; overflow:hidden; display:flex; align-items:flex-start;">
            <img src="{{ $heroRight }}" alt="Wedding hero" loading="lazy" style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ============= WEDDING GALLERY SLIDER ============= -->
    <section aria-label="Wedding Gallery" style="margin-top: 5rem;">
        <div class="slider" id="weddingSlider" style="max-width:1200px; margin:0 auto;">
            <div class="slider-main" id="sliderMain" style="position:relative; height:80vh; overflow:hidden; background:#fff;">

                <!-- Slides -->
                @foreach($galleryImages as $index => $img)
                <div class="slide"
                    data-index="{{ $index }}"
                    tabindex="{{ $index === 0 ? '0' : '-1' }}"
                    aria-hidden="{{ $index === 0 ? 'false' : 'true' }}"
                    style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:{{ $index === 0 ? '1' : '0' }}; transition:opacity 0.4s; text-align:center; background:#fff;">

                    <img src="{{ $img['src'] }}"
                        alt="{{ $img['title'] ?? '' }}"
                        loading="lazy"
                        class="zoomable"
                        style="width:auto; max-width:90%; max-height:80vh; object-fit:contain; display:inline-block; margin:0 auto; transition: transform 0.2s; cursor:grab;">

                    <div class="caption" style="margin-top:1rem; text-align:center;">
                        <h4 style="margin:0 0 0.5rem 0;">{{ $img['title'] ?? '' }}</h4>
                        <p style="margin:0; color:#555;">{{ $img['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach

                <!-- Slider controls -->
                <div class="slider-controls" style="position:absolute; top:50%; left:0; right:0; display:flex; justify-content:space-between; transform:translateY(-50%);">
                    <button id="prevBtn" style="background:#fff; border:none; padding:0.5rem 1rem; cursor:pointer; border-radius:5px;">◀</button>
                    <button id="nextBtn" style="background:#fff; border:none; padding:0.5rem 1rem; cursor:pointer; border-radius:5px;">▶</button>
                </div>

                <!-- Zoom controls -->
                <div class="zoom-controls" style="position:absolute; bottom:10px; left:50%; transform:translateX(-50%); display:flex; gap:0.5rem;">
                    <button id="zoomIn" style="background:#fff; border:none; padding:0.3rem 0.6rem; cursor:pointer; border-radius:5px;">Zoom +</button>
                    <button id="zoomOut" style="background:#fff; border:none; padding:0.3rem 0.6rem; cursor:pointer; border-radius:5px;">Zoom -</button>
                </div>

                <!-- Autoplay indicator -->
                <div class="autoplay-indicator" style="position:absolute; bottom:10px; right:10px; background:rgba(255,255,255,0.8); padding:0.2rem 0.5rem; border-radius:5px; font-size:0.9rem;">Auto • On</div>
            </div>

            <!-- Thumbnails with pagination -->
            <aside class="slider-thumbs" style="display:flex; flex-direction:column; align-items:center; margin-top:1rem;">
                <div id="thumbsContainer" style="display:flex; gap:0.5rem; flex-wrap:wrap; justify-content:center;"></div>
                <div id="thumbPagination" style="margin-top:0.5rem; display:flex; gap:0.5rem; justify-content:center;">
                    <button id="prevThumbs"
                        style="
                    padding:0.4rem 0.9rem;
                    background:#1a1a1a;
                    color:#fff;
                    border:none;
                    border-radius:6px;
                    font-size:1rem;
                    cursor:pointer;
                    box-shadow:0 2px 6px rgba(0,0,0,0.2);
                    transition:0.2s;
                "
                        onmouseover="this.style.background='#000'"
                        onmouseout="this.style.background='#1a1a1a'">
                        ◀
                    </button>

                    <button id="nextThumbs"
                        style="
                    padding:0.4rem 0.9rem;
                    background:#1a1a1a;
                    color:#fff;
                    border:none;
                    border-radius:6px;
                    font-size:1rem;
                    cursor:pointer;
                    box-shadow:0 2px 6px rgba(0,0,0,0.2);
                    transition:0.2s;
                "
                        onmouseover="this.style.background='#000'"
                        onmouseout="this.style.background='#1a1a1a'">
                        ▶
                    </button>
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
        @foreach($stats as $st)
        <div class="stat">
            <h3 id="stat{{ $loop->index + 1 }}">0</h3>
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
<script src="{{ asset('js/public/photography/weddings.js') }}"></script>

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
            thumbDiv.tabIndex = 0;
            thumbDiv.role = 'button';
            thumbDiv.style.width = '150px';
            thumbDiv.style.height = '100px';
            thumbDiv.style.overflow = 'hidden';
            thumbDiv.style.cursor = 'pointer';
            thumbDiv.style.border = (start + index === 0) ? '2px solid #000' : '2px solid transparent';
            thumbDiv.style.borderRadius = '5px';
            thumbDiv.style.display = 'flex';
            thumbDiv.style.alignItems = 'flex-start';

            const thumbImg = document.createElement('img');
            thumbImg.src = img.src;
            thumbImg.alt = img.title;
            thumbImg.loading = 'lazy';
            thumbImg.style.width = '100%';
            thumbImg.style.height = '100%';
            thumbImg.style.objectFit = 'cover';
            thumbImg.style.objectPosition = 'top';
            thumbImg.style.display = 'block';

            thumbDiv.appendChild(thumbImg);

            thumbDiv.addEventListener('click', () => showSlide(start + index));

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