@extends('dashboard/layouts/main')
@section('container')
<div class="d-flex justify-content-center p-2">
    <h2>Update Category</h2>
</div>

    <div class="col-md-6 px-5 mt-5 mx-auto">
        <form action="/dashboard/categories/{{ $category->slug }}" method="post" >
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $category->name) }}"> 
              @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div> 
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug', $category->slug) }}" > 
              @error('slug')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>  

            <button type="submit" class="btn btn-primary my-3" name="post_dashboard_submit">UPDATE</button>
          </form>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', ()=>{
           fetch('/dashboard/categories/checkSlug?name=' + name.value)
           .then(response => response.json())
           .then(data => slug.value = data.slug) 
        });
 
 
    </script>
@endsection