@extends('layouts/main')
@section('container')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-5">{{ $post->title }}</h2>
            <p>By: <a href="/posts?author={{ $post->user->id }}">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <p>{{ $post->created_at->format('d-M-Y') }}</p>
            @if ($post->image)
            <div >
                <img src=" {{asset('storage/'.$post->image)}}" class="card-img-top mt-3 img-fluid mt-3 img-fluid rounded" alt="{{ $post->image }}" style=" height:450px !important; object-fit: cover !important;">
            </div>
            @else   
                <img src="https://source.unsplash.com/1200x600?{{$post->category->name}}" class="card-img-top mt-3 img-fluid rounded" alt="...">
            @endif            
            <article class="mt-5">
                {!! $post->body !!}
            </article>
            <a href="/posts" class="btn btn-primary">BACK</a>
        </div>
    </div> 


@endsection