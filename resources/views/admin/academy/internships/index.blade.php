@extends('admin.layouts.app')

@section('title', 'Internships & Attachments')

@section('content')
<div class="container py-4">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h1 class="mb-2 mb-md-0">Internships & Attachments</h1>

        <div class="d-flex flex-wrap gap-2">
            @php
                $hero = $items->where('type', 'hero')->first();
                $pageInfo = $items->where('type', 'page_info')->first();
            @endphp

            <a href="{{ route('internships.hero.form') }}" class="btn btn-outline-primary">
                {{ $hero ? 'Edit Hero' : 'Create Hero' }}
            </a>

            <a href="{{ route('internships.pageinfo.form') }}" class="btn btn-outline-info">
                {{ $pageInfo ? 'Edit Page Info' : 'Create Page Info' }}
            </a>

            <a href="{{ route('internships.roles.create') }}" class="btn btn-primary">Add Role</a>
            <a href="{{ route('internships.create') }}" class="btn btn-secondary">Add Generic Item</a>
        </div>
    </div>

    <!-- SUCCESS ALERT -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

<!-- ============================
     HERO SECTION (Internships)
============================ -->
@if($hero)
    @php
        $meta = $hero->meta ? json_decode($hero->meta, true) : [];
        $heroImage = $hero->image ?? $meta['hero_image'] ?? null;
        $heroRightImage = $meta['hero_right_image'] ?? null;
        $heroTitle = $hero->title ?? ($meta['hero_title'] ?? 'Hero Title');
        $heroDescription = $hero->description ?? ($meta['hero_description'] ?? 'Hero description goes here.');
    @endphp

    <div class="card mb-5 shadow border-0">
        <!-- Hero Header -->
        <div class="card-header bg-primary text-white fw-bold d-flex align-items-center justify-content-between">
            <div>
                <i class="bi bi-flag-fill me-2"></i> Hero Section
            </div>
        </div>

        <!-- Hero Content -->
        <div class="row g-0">
            <!-- Left: Hero Background Image -->
            <div class="col-md-8">
                <img src="{{ $heroImage ? asset('storage/'.$heroImage) : 'https://via.placeholder.com/800x400' }}"
                     class="img-fluid rounded-start w-100" 
                     style="height:100%; object-fit:cover;">
            </div>

            <!-- Right: Text and Side Image -->
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
                    <a href="{{ route('internships.hero.form') }}" class="btn btn-outline-primary btn-sm">
                        Edit Hero
                    </a>

                    <form action="{{ route('internships.hero.delete') }}" method="POST" 
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


    <!-- PAGE INFO / ABOUT SECTION -->
    @if($pageInfo)
        @php $meta = $pageInfo->meta ? json_decode($pageInfo->meta, true) : []; @endphp

        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-info text-white fw-bold">
                <i class="bi bi-info-circle-fill me-2"></i> About / Page Info
            </div>

            <div class="card-body">
                <p><strong>Paragraph 1:</strong> {{ $meta['about_paragraph1'] ?? '-' }}</p>
                <p><strong>Paragraph 2:</strong> {{ $meta['about_paragraph2'] ?? '-' }}</p>

                @if(!empty($meta['video_link']))
                    <p><strong>Video:</strong>
                        <a href="{{ $meta['video_link'] }}" target="_blank">{{ $meta['video_link'] }}</a>
                    </p>
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

                <a href="{{ route('internships.pageinfo.form') }}" class="btn btn-info mt-3">Edit Page Info</a>
            </div>
        </div>
    @endif

    <!-- ROLES / POSITIONS SECTION -->
    @php $roles = $items->where('type', 'role'); @endphp

    @if($roles->count())
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-success text-white fw-bold">
                <i class="bi bi-people-fill me-2"></i> Roles / Positions
            </div>

            <div class="card-body">
                <div class="row g-4">
                    @foreach($roles as $role)
                        @php
                            $meta = $role->meta ? json_decode($role->meta, true) : [];
                            $status = strtolower($meta['status'] ?? 'open');
                            $roleImage = $role->image ?? $meta['image'] ?? null;
                        @endphp

                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                <div style="width:100%; height:300px; overflow:hidden;">
                                    <img src="{{ $roleImage ? asset('storage/'.$roleImage) : 'https://via.placeholder.com/600x300' }}"
                                         style="width:100%; height:100%; object-fit:cover;">
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="fw-bold">{{ $role->title }}</h5>
                                    <p>{{ $role->description }}</p>

                                    <div class="mt-auto d-flex flex-wrap gap-2">
                                        <a href="{{ route('internships.roles.edit', $role) }}" class="btn btn-success btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('internships.toggleStatus', $role) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm {{ $status === 'open' ? 'btn-success' : 'btn-secondary' }}">
                                                {{ ucfirst($status) }}
                                            </button>
                                        </form>

                                        <form action="{{ route('internships.destroy', $role) }}" method="POST"
                                              onsubmit="return confirm('Delete this role?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- OTHER ITEMS -->
    @php $otherItems = $items->whereNotIn('type', ['hero', 'page_info', 'role']); @endphp

    @if($otherItems->count())
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-secondary text-white fw-bold">
                <i class="bi bi-grid-fill me-2"></i> Other Items
            </div>

            <div class="card-body">
                <div class="row g-4">
                    @foreach($otherItems as $item)
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm p-3">
                                <h5 class="fw-bold">{{ $item->title }}</h5>
                                <p>{{ $item->description }}</p>

                                <div class="mt-auto d-flex flex-wrap gap-2">
                                    <a href="{{ route('internships.edit', $item) }}" class="btn btn-secondary btn-sm">Edit</a>

                                    <form action="{{ route('internships.destroy', $item) }}" method="POST"
                                          onsubmit="return confirm('Delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

</div>
@endsection



