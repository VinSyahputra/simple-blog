@extends('dashboard/layouts/main')
@section('container')
<div class="col-md-6 mx-auto my-5">
    <h2>Categories</h2>
    <div class="table-responsive">
      @if (session()->has('success')) 
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <div class="d-flex justify-content-end p-2">
            <a href="/dashboard/categories/create" class="btn btn-primary py-2 "><span data-feather="plus" class="align-text-bottom"></span> new category</a>
        </div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Action</th> 
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td> 
                    <a href="/dashboard/categories/{{ $category->slug }}/edit " class="btn bg-warning py-1 px-3"><span data-feather="edit" class="align-text-bottom text-white"></span></a> 
                    <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger py-1 px-3"><span data-feather="trash-2" class="align-text-bottom text-white"></span></button>
                    </form> 
                </td> 
              </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
@endsection