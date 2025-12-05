@extends('admin.layouts.app')

@section('title', 'Weddings & Engagements')

@section('content')
<div class="container py-5">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h1 class="mb-2 mb-md-0">Weddings & Engagements</h1>
        <div class="d-flex gap-2 flex-wrap">
            @if($weddings->count())
            <a href="{{ route('admin.photography.weddings.edit', $weddings->first()) }}" class="btn btn-warning shadow-sm">
                <i class="bi bi-pencil-square"></i> Edit Wedding
            </a>
            @else
            <a href="{{ route('admin.photography.weddings.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle"></i> Add Wedding
            </a>
            @endif
        </div>
    </div>

    <!-- SUCCESS ALERT -->
    @if(session('success'))
    <div class="alert alert-success shadow-sm py-2 px-3 rounded">{{ session('success') }}</div>
    @endif

    @if($weddings->count())
    @php $wedding = $weddings->first(); @endphp
    <div class="card mb-5 shadow border-0 rounded-4 overflow-hidden">

        <!-- CARD HEADER -->
        <div class="card-header bg-gradient-primary text-white fw-bold d-flex justify-content-between align-items-center py-3 px-4 flex-wrap">
            <span>{{ $wedding->title }}</span>

            <!-- Desktop Actions -->
            <div class="d-none d-md-flex gap-2 flex-wrap">
                <a href="{{ route('admin.photography.weddings.edit', $wedding) }}" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <a href="{{ route('admin.photography.weddings.gallery', $wedding) }}" class="btn btn-outline-info btn-sm">
                    <i class="bi bi-images"></i> Manage Gallery
                </a>
                <form action="{{ route('admin.photography.weddings.destroy', $wedding) }}" method="POST" onsubmit="return confirm('Delete this wedding entry?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>

            <!-- Mobile Dropdown -->
            <div class="dropdown d-md-none">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="weddingActions" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                </button>
                <ul class="dropdown-menu" aria-labelledby="weddingActions">
                    <li><a class="dropdown-item" href="{{ route('admin.photography.weddings.edit', $wedding) }}">Edit</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.photography.weddings.gallery', $wedding) }}">Manage Gallery</a></li>
                    <li>
                        <form action="{{ route('admin.photography.weddings.destroy', $wedding) }}" method="POST" onsubmit="return confirm('Delete this wedding entry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

        <!-- HERO IMAGES -->
        <div class="row g-0 border-bottom flex-column flex-md-row">
            <div class="col-md-6 position-relative mb-3 mb-md-0">
                <img src="{{ $wedding->hero_image ? asset('storage/'.$wedding->hero_image) : 'https://via.placeholder.com/600x400' }}"
                    class="img-fluid w-100 gallery-top-image">
            </div>
            <div class="col-md-6 p-4 bg-light">
                <h5 class="fw-bold mb-3">Hero Right Image</h5>
                @if($wedding->hero_right_image)
                <img src="{{ asset('storage/'.$wedding->hero_right_image) }}" class="img-fluid rounded shadow-sm mb-3 hero-right-image">
                @else
                <p class="text-muted fst-italic">No right side image.</p>
                @endif
            </div>
        </div>

        <!-- DESCRIPTION -->
        <div class="card-body py-3 px-4">
            <h5 class="fw-bold">Description</h5>
            <p class="text-secondary">{{ $wedding->description ?? $wedding->content ?? '-' }}</p>
        </div>

        <!-- GALLERY -->
        @if(!empty($wedding->gallery) && count($wedding->gallery) > 0)
        <div class="card-footer py-4 px-4 bg-white">
            <h5 class="fw-bold mb-3">Gallery</h5>
            <div class="row g-3">
                @foreach($wedding->gallery as $image)
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="position-relative gallery-card">
                        <img src="{{ asset('storage/'.$image) }}" class="img-fluid w-100 h-100 gallery-card-image">
                        <div class="gallery-overlay d-flex justify-content-center align-items-center">
                            <button class="btn btn-light btn-sm" onclick="openLightbox('{{ asset('storage/'.$image) }}')">
                                <i class="bi bi-eye"></i> View
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    <!-- LIGHTBOX -->
    <div id="lightbox" class="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close">&times;</button>
            <img src="" id="lightboxImage">
            <div class="lightbox-controls">
                <button id="zoomIn"><i class="bi bi-zoom-in"></i></button>
                <button id="zoomOut"><i class="bi bi-zoom-out"></i></button>
            </div>
        </div>
    </div>

    @else
    <p class="text-muted text-center fs-5 mt-5">No wedding entries found. Add one using the button above.</p>
    @endif

</div>

<script>
    let lightbox = document.getElementById('lightbox');
    let lightboxImage = document.getElementById('lightboxImage');
    let currentScale = 1;

    function openLightbox(src) {
        lightboxImage.src = src;
        lightbox.style.display = 'flex';
        currentScale = 1;
        lightboxImage.style.transform = 'scale(1)';
    }

    document.querySelector('.lightbox-close').addEventListener('click', () => {
        lightbox.style.display = 'none';
    });

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) lightbox.style.display = 'none';
    });

    document.getElementById('zoomIn').addEventListener('click', () => {
        currentScale += 0.2;
        lightboxImage.style.transform = `scale(${currentScale})`;
    });
    document.getElementById('zoomOut').addEventListener('click', () => {
        currentScale = Math.max(1, currentScale - 0.2);
        lightboxImage.style.transform = `scale(${currentScale})`;
    });

    lightboxImage.addEventListener('wheel', (e) => {
        e.preventDefault();
        if (e.deltaY < 0) currentScale += 0.1;
        else currentScale = Math.max(1, currentScale - 0.1);
        lightboxImage.style.transform = `scale(${currentScale})`;
    });
</script>

<style>
    .bg-gradient-primary {
        background: linear-gradient(90deg, #4e73df, #1cc88a);
    }

    .gallery-top-image {
        width: 100%;
        max-height: 500px;
        object-fit: contain;
        background: #f8f9fa;
    }

    .hero-right-image {
        max-height: 180px;
        object-fit: contain;
        background: #f8f9fa;
    }

    .gallery-card {
        position: relative;
        height: 300px;
        overflow: hidden;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s;
        background: #f8f9fa;
    }

    .gallery-card:hover img {
        transform: scale(1.05);
    }

    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        justify-content: center;
        align-items: center;
        z-index: 1050;
    }

    .lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .lightbox-content img {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        transition: transform 0.2s;
        cursor: grab;
    }

    .lightbox-close {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #fff;
        border: none;
        font-size: 2rem;
        line-height: 1;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10;
    }

    .lightbox-controls {
        margin-top: 10px;
        display: flex;
        gap: 5px;
        z-index: 10;
    }

    .lightbox-controls button {
        border: none;
        background: #fff;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
@endsection