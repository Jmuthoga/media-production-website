@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Our Blog</h1>
    @foreach($posts as $post)
    <div class="mb-4">
        <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
        <p>{{ Str::limit($post->excerpt, 150) }}</p>
    </div>
    @endforeach

    {{ $posts->links() }}
</div>
@endsection