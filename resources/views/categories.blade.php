@extends('layouts/main')
@section('container')


<div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-3">
        <a href="/posts?category={{ $category->slug }}">
            <div class="card text-bg-dark">
                <img src="https://source.unsplash.com/500x300?{{$category->name}}" class="card-img" alt="...">
                <div class="card-img-overlay p-0">
                    <div class="p-2" style="background: rgba(0,0,0,.6)">
                        <h5 class="card-title fs-3">{{$category->name}}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection