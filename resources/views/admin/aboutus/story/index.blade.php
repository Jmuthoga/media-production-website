@extends('admin.layouts.app')

@section('title', 'Our Story & Mission')

@section('content')
<div class="container py-4">

    <!-- ============================
        PAGE HEADER
    ============================ -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h1 class="mb-2 mb-md-0">Our Story & Mission</h1>

        <div class="dropdown">
            <button class="btn btn-gradient-primary dropdown-toggle px-4 py-2 d-flex align-items-center gap-2 shadow-sm" 
                    type="button" id="manageSectionsDropdown" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-gear-fill"></i> Manage Sections
            </button>
            <ul class="dropdown-menu dropdown-menu-end border-0 shadow rounded-3 p-2" 
                aria-labelledby="manageSectionsDropdown" style="min-width: 250px;">

                @php
                    $hero = $stories->where('type', 'hero')->first();
                    $pageInfo = $stories->where('type', 'page_info')->first();
                    $faqSection = $stories->where('type', 'faq')->first();
                    $clientsList = $clients;
                @endphp

                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded" 
                    href="{{ route('admin.aboutus.story.hero.form') }}">
                        <i class="bi bi-image-fill text-primary"></i>
                        {{ $hero ? 'Edit Hero Section' : 'Create Hero Section' }}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded" 
                    href="{{ route('admin.aboutus.story.page_info.form') }}">
                        <i class="bi bi-file-text-fill text-info"></i>
                        {{ $pageInfo ? 'Edit Page Info Section' : 'Create Page Info Section' }}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded" 
                    href="{{ route('admin.aboutus.story.faq.form') }}">
                        <i class="bi bi-question-circle-fill text-success"></i>
                        {{ $faqSection ? 'Edit FAQ & Side Feature' : 'Create FAQ & Side Feature' }}
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded" 
                    href="{{ route('admin.aboutus.story.clients.create') }}">
                        <i class="bi bi-person-badge-fill text-warning"></i>
                        Add Client
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Optional custom style -->
    <style>
        .btn-gradient-primary {
            background: linear-gradient(90deg, #007bff 0%, #6610f2 100%);
            color: #fff;
            border: none;
            transition: 0.3s ease;
        }
        .btn-gradient-primary:hover {
            background: linear-gradient(90deg, #0056b3 0%, #520dc2 100%);
            color: #fff;
        }
        .dropdown-item:hover {
            background-color: #f1f3f5;
        }
    </style>



    <!-- ============================
         SUCCESS ALERT
    ============================ -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm border-0 rounded">{{ session('success') }}</div>
    @endif

    <!-- ============================
         HERO SECTION
    ============================ -->
    @if($hero)
        @php
            $meta = $hero->meta ? json_decode($hero->meta, true) : [];
            $heroImage = $meta['hero_image'] ?? null;
            $heroRightImage = $meta['hero_right_image'] ?? null;
            $heroTitle = $hero->title ?? ($meta['hero_title'] ?? 'Hero Title');
            $heroDescription = $hero->description ?? ($meta['hero_description'] ?? 'Hero description goes here.');
        @endphp

        <div class="card mb-5 shadow border-0 rounded-3">
            <div class="card-header bg-primary text-white fw-bold d-flex align-items-center">
                <i class="bi bi-flag-fill me-2"></i> Hero Section
            </div>

            <div class="row g-0">
                <div class="col-md-8">
                    <img src="{{ $heroImage ? asset('storage/'.$heroImage) : 'https://via.placeholder.com/800x400' }}"
                         class="img-fluid rounded-start w-100" style="height:100%; object-fit:cover;">
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-between p-4 bg-light">
                    <div>
                        <h3 class="fw-bold">{{ $heroTitle }}</h3>
                        <p class="text-muted">{{ $heroDescription }}</p>

                        @if($heroRightImage)
                            <p class="fw-semibold mt-3">Right Side Image:</p>
                            <img src="{{ asset('storage/'.$heroRightImage) }}" class="img-fluid rounded mb-3" style="max-height:150px;">
                        @endif
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('admin.aboutus.story.hero.form') }}" class="btn btn-outline-primary btn-sm">Edit Hero</a>
                        <form action="{{ route('admin.aboutus.story.hero.delete') }}" method="POST" 
                              onsubmit="return confirm('Delete hero section?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete Hero</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- ============================
         PAGE INFO / ABOUT SECTION
    ============================ -->
    @if($pageInfo)
        @php $meta = $pageInfo->meta ? json_decode($pageInfo->meta, true) : []; @endphp

        <div class="card mb-5 shadow border-0 rounded-3">
            <div class="card-header bg-info text-white fw-bold d-flex align-items-center">
                <i class="bi bi-info-circle-fill me-2"></i> About / Page Info
            </div>

            <div class="card-body">
                <p><strong>Paragraph 1:</strong> {{ $meta['about_paragraph1'] ?? '-' }}</p>
                <p><strong>Paragraph 2:</strong> {{ $meta['about_paragraph2'] ?? '-' }}</p>

                @if(!empty($meta['video_id']))
                    <p><strong>Video ID:</strong> {{ $meta['video_id'] }}</p>
                @endif

                @if(!empty($meta['stats']))
                    <div class="row g-3 mt-3">
                        @foreach($meta['stats'] as $stat)
                            <div class="col-6 col-md-3">
                                <div class="p-3 text-center border rounded shadow-sm bg-light">
                                    <h4 class="text-primary fw-bold">{{ $stat['value'] ?? 0 }}</h4>
                                    <p class="mb-0">{{ $stat['title'] ?? '-' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <a href="{{ route('admin.aboutus.story.page_info.form') }}" class="btn btn-info mt-3">Edit Page Info</a>
            </div>
        </div>
    @endif

    <!-- ============================
         FAQ & SIDE FEATURE SECTION
    ============================ -->
    @if($faqSection)
        @php
            $meta = $faqSection->meta ? json_decode($faqSection->meta, true) : [];
            $faqs = $meta['faqs'] ?? [];
            $sideImage = $meta['side_image'] ?? null;
        @endphp

        <div class="card mb-5 shadow border-0 rounded-3">
            <div class="card-header bg-success text-white fw-bold d-flex align-items-center">
                <i class="bi bi-question-circle-fill me-2"></i> FAQ & Side Feature
            </div>

            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $sideImage ? asset('storage/'.$sideImage) : 'https://via.placeholder.com/400x400?text=Side+Feature+Image' }}"
                        class="img-fluid rounded-start w-100" style="height:100%; object-fit:cover;">
                </div>

                <div class="col-md-8 p-4 bg-light">
                    <h5 class="fw-bold text-success mb-3">Frequently Asked Questions</h5>
                    @if(count($faqs))
                        <div class="accordion" id="faqAccordion">
                            @foreach($faqs as $i => $faq)
                                <div class="accordion-item mb-2 shadow-sm rounded">
                                    <h2 class="accordion-header" id="heading{{ $i }}">
                                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                                            {{ $faq['question'] ?? 'Question goes here' }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted">
                                            {!! nl2br(e($faq['answer'] ?? 'Answer goes here')) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No FAQs added yet.</p>
                    @endif

                    <a href="{{ route('admin.aboutus.story.faq.form') }}" class="btn btn-success mt-3">Edit FAQ & Side Feature</a>
                </div>
            </div>
        </div>
    @endif

    <!-- ============================
        OUR CLIENTS SECTION
    ============================ -->
    <div class="card mt-4 shadow-sm border-0">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Our Clients</h5>
            <a href="{{ route('admin.aboutus.story.clients.create') }}" class="btn btn-sm btn-outline-primary">
                Add Client
            </a>
        </div>

        <div class="card-body">
            @if($clientsList->count())
                <div class="row">
                    @foreach($clientsList as $client)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card border-0 shadow-sm text-center p-3 h-100">
                                @if($client->image)
                                    <div class="d-flex justify-content-center align-items-center" 
                                        style="height:120px; overflow:hidden;">
                                        <img src="{{ asset('storage/'.$client->image) }}" 
                                            alt="{{ $client->title }}"
                                            style="max-height:100px; max-width:100%; object-fit:contain;">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center bg-light" 
                                        style="height:120px;">
                                        <span class="text-muted small">No Logo</span>
                                    </div>
                                @endif

                                <div class="mt-3">
                                    <h6 class="card-title mb-2">{{ $client->title ?? 'Untitled Client' }}</h6>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.aboutus.story.clients.edit', $client) }}" 
                                        class="btn btn-sm btn-outline-info">Edit</a>
                                        <form action="{{ route('admin.aboutus.story.clients.destroy', $client) }}" 
                                            method="POST" 
                                            onsubmit="return confirm('Delete this client?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">No clients added yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection


