@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container py-5">
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">Published on {{ $post->created_at->format('d M Y') }}</p>
    <div>{!! $post->content !!}</div>
</div>
@endsection