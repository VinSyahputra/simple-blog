@extends('layouts/main')
@section('container')

    <h1 class="text-center">{{ strtoupper($title) }}</h1>
    <div class="row mb-5 mt-3">
        <div class="col-md-6 mx-auto">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Post ..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit" id="button-addon2">SEARCH</button>
                  </div>
            </form>
        </div>
    </div>
    <article class="mb-5">
        @if ($posts->count() )
            <div class="card mb-3">
                @if ($posts[0]->image)
                <div >
                    <img src=" {{asset('storage/'.$posts[0]->image)}}" class="card-img-top img-fluid " alt="{{ $posts[0]->image }}" style=" height:400px !important; object-fit: cover !important;">
                </div>
                @else 
                    <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                <h5 class="card-title">{{ $posts[0]->title }}</h5>
                <p class="card-title">By: <a href="/posts?author={{ $posts[0]->user->id }}">{{ $posts[0]->user->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">read more</a>
                <p class="card-text"><small class="text-muted">Last updated {{ $posts[0]->updated_at->diffForHumans() }}</small></p>
                </div>
            </div>
        
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                <div class="col-md-4">
                    <div class="card my-3">
                        <a href="/posts?category={{$post->category->slug}}" class="text-white text-decoration-none"><div class="position-absolute px-4 py-2" style="background: rgba(2,2,2,.4)">{{$post->category->name}}</div></a>
                        @if ($post->image)
                        <div >
                            <img src=" {{asset('storage/'.$post->image)}}" class="card-img-top mt-3 img-fluid " alt="{{ $post->image }}" style=" height:225px !important; object-fit: cover !important;">
                        </div>
                        @else  
                            <img src="https://source.unsplash.com/500x300?{{$post->category->name}}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h3>
                            <p class="card-title">By: <a href="/posts?author={{ $post->user->id }}">{{ $post->user->name }}</a></p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">read more</a>
                            <p class="card-text"><small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach                
            </div>
        </div>
       
    </article>
    @else
        <p class="fs-4">No Post Found.</p>
    @endif
    <div class="d-flex justify-content-center"> 
        {{ $posts->links() }}
    </div>
@endsection