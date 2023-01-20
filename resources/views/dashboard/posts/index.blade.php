@extends('dashboard/layouts/main')
@section('container')
    <h2>Post by {{ auth()->user()->name }}</h2>
    <div class="table-responsive">
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
                    <a href="/dashboard/posts/{{ $post->slug }} " class="btn bg-warning py-1 px-3"><span data-feather="edit" class="align-text-bottom text-white"></span></a> 
                    <a href="/dashboard/posts/{{ $post->slug }} " class="btn bg-danger py-1 px-3"><span data-feather="trash-2" class="align-text-bottom text-white"></span></a> 
                </td> 
              </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
@endsection