@extends('layouts/main')
@section('container')
    <h1>{{ $category }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h2><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>
            <h5>By: {{ $post->user->name }}</h5>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection