@extends('layouts.app')

@section('title', 'Product Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/product.css') }}">
@endpush

@php
$product = $product ?? null;

$heroBg = ($product && !empty($product->hero_image))
? asset('storage/' . $product->hero_image)
: 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($product && !empty($product->hero_right_image))
? asset('storage/' . $product->hero_right_image)
: 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=1600&auto=format&fit=crop';

$defaultGallery = [
['src' => 'https://images.unsplash.com/photo-1581093588401-3d81640b2d9b?q=80&w=1600&auto=format&fit=crop', 'title' => 'Studio Product Shoot', 'description' => 'High-quality product photography for catalogs and online stores.'],
['src' => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=1600&auto=format&fit=crop', 'title' => 'Creative Angles', 'description' => 'Showcase products with creative lighting and angles.'],
['src' => 'https://images.unsplash.com/photo-1593508512255-86ab42a8e620?q=80&w=1600&auto=format&fit=crop', 'title' => 'Commercial Ready', 'description' => 'Images optimized for advertisements, social media, and e-commerce.'],
];

$galleryImages = ($gallery && $gallery->count() > 0)
? $gallery->map(fn($img) => [
'src' => asset('storage/' . $img),
'title' => '',
'description' => ''
])
: $defaultGallery;

$defaultServices = [
['icon' => 'bi bi-camera-reels-fill', 'title' => 'Product Catalogs', 'description' => 'Professional photos for catalogs and print materials.'],
['icon' => 'bi bi-box-seam', 'title' => 'E-commerce Images', 'description' => 'Optimized images for online stores and marketplaces.'],
['icon' => 'bi bi-lightning-fill', 'title' => 'Creative Lighting', 'description' => 'Use of lighting techniques to enhance product appeal.'],
];

$services = ($product && !empty($product->services)) ? $product->services : $defaultServices;

$defaultTestimonials = [
['text' => 'Our product catalog images have never looked better — truly professional work.', 'author' => 'Retail Brand'],
['text' => 'The e-commerce photos are clean, consistent, and attractive. Excellent service!', 'author' => 'Online Store Owner'],
];

$testimonials = ($product && !empty($product->testimonials)) ? $product->testimonials : $defaultTestimonials;

$defaultStats = [
['value' => 0, 'title' => 'Product Shoots'],
['value' => 0, 'title' => 'Photos Delivered'],
['value' => 0, 'title' => 'Years of Experience'],
['value' => 0, 'title' => 'Client Satisfaction'],
];

$stats = ($product && !empty($product->stats)) ? $product->stats : $defaultStats;

$heroTitle = ($product && !empty($product->title)) ? $product->title : 'Product Photography';
$heroDescription = ($product && !empty($product->description)) ? $product->description : 'Commercial product photography for catalogs, e-commerce, and advertising — crisp, professional, and visually striking images.';
$ctaTitle = ($product && !empty($product->cta_title)) ? $product->cta_title : 'Book Your Product Shoot';
$ctaDescription = ($product && !empty($product->cta_description)) ? $product->cta_description : 'High-quality, professional photography for your products — perfect for online and print marketing.';
@endphp

@section('content')
<!-- ===== HERO ===== -->
<section class="product-hero"
    style="background: linear-gradient(120deg, rgba(0, 128, 128, 0.85), rgba(241, 196, 15, 0.2)), url('{{ $heroBg }}') center/cover;">
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
            <img src="{{ $heroRight }}" alt="Product Photography" loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>
    </div>
</section>

<div class="page-container" id="gallery">

    <!-- ============= Product Photography GALLERY SLIDER ============= -->
    <section aria-label="Product Photography" style="margin-top: 5rem;">
        <div class="slider" id="productSlider" style="max-width:1200px; margin:0 auto;">
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
<script src="{{ asset('js/public/photography/product.js') }}"></script>

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