@extends('layouts/main')
@section('container')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-5">{{ $post->title }}</h2>
            <p>By: <a href="/posts?author={{ $post->user->id }}">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <p>{{ $post->created_at->format('d-M-Y') }}</p>
            <img src="https://source.unsplash.com/1200x600?{{$post->category->name}}" class="card-img-top mt-3 img-fluid rounded" alt="...">
            <article class="mt-5">
                {!! $post->body !!}
            </article>
            <a href="/posts" class="btn btn-primary">BACK</a>
        </div>
    </div> 


@endsection