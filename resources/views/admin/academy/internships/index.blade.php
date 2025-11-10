@extends('admin.layouts.app')

@section('title', 'Internships & Attachments')

@section('content')
<div class="container py-4">

    <!-- ============================
         PAGE HEADER
    ============================ -->
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

    <!-- ============================
         SUCCESS ALERT
    ============================ -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <!-- ============================
         HERO SECTION
    ============================ -->
    @if($hero)
        @php
            $meta = $hero->meta ? json_decode($hero->meta, true) : [];
        @endphp

        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-flag-fill me-2"></i> Hero Section
            </div>

            <img src="{{ $hero->image 
                ? asset('storage/'.$hero->image)
                : ($meta['hero_image'] 
                    ? asset('storage/'.$meta['hero_image']) 
                    : 'https://via.placeholder.com/600x200') }}"
                class="card-img-top"
                style="width:100%; height:300px; object-fit:cover;"
            >

            <div class="card-body">
                <h5 class="fw-bold">{{ $hero->title }}</h5>
                <p class="text-muted">{{ $hero->description }}</p>
                <a href="{{ route('internships.hero.form') }}" class="btn btn-outline-primary">
                {{ $hero ? 'Edit Hero' : 'Create Hero' }}
                </a>
            </div>
        </div>
    @endif

    <!-- ============================
         PAGE INFO / ABOUT SECTION
    ============================ -->
    @if($pageInfo)
        @php
            $meta = $pageInfo->meta ? json_decode($pageInfo->meta, true) : [];
        @endphp

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

    <!-- ============================
         ROLES / POSITIONS SECTION
    ============================ -->
    @php
        $roles = $items->where('type', 'role');
    @endphp

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
                        @endphp

                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                <div style="width:100%; height:300px; overflow:hidden;">
                                    <img src="{{ $role->image 
                                        ? asset('storage/'.$role->image)
                                        : ($meta['image'] ?? 'https://via.placeholder.com/600x300') }}"
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

    <!-- ============================
         OTHER ITEMS (NO IMAGES)
    ============================ -->
    @php
        $otherItems = $items->whereNotIn('type', ['hero', 'page_info', 'role']);
    @endphp

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


