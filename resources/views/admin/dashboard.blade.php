@extends('admin.layouts.app')

@section('content')
<h1>Admin Dashboard</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card p-3">
            <h4>{{ $pages }}</h4>
            <p>Pages</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <h4>{{ $services }}</h4>
            <p>Services</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <h4>{{ $gallery }}</h4>
            <p>Gallery</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <h4>{{ $blogs }}</h4>
            <p>Blogs</p>
        </div>
    </div>
</div>
@endsection