@extends('dashboard/layouts/main')
@section('container')
    <div class="col-md-10 mx-auto my-5">
      <h2>Post by {{ auth()->user()->name }}</h2>
      <div class="table-responsive">
        @if (session()->has('success')) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <div class="d-flex justify-content-end p-2">
              <a href="/dashboard/posts/create" class="btn btn-primary py-2 "><span data-feather="plus" class="align-text-bottom"></span> new post</a>
          </div>
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th> 
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->category->name }}</td>
                  <td>
                      <a href="/dashboard/posts/{{ $post->slug }} " class="btn bg-success py-1 px-3"><span data-feather="eye" class="align-text-bottom text-white"></span></a> 
                      <a href="/dashboard/posts/{{ $post->slug }}/edit " class="btn bg-warning py-1 px-3"><span data-feather="edit" class="align-text-bottom text-white"></span></a> 
                      <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger py-1 px-3"><span data-feather="trash-2" class="align-text-bottom text-white"></span></button>
                      </form>
                      {{-- <a href="/dashboard/posts/{{ $post->slug }} " class="btn bg-danger py-1 px-3"><span data-feather="trash-2" class="align-text-bottom text-white"></span></a>  --}}
                  </td> 
                </tr> 
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection