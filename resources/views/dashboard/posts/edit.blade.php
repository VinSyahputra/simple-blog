@extends('dashboard/layouts/main')
@section('container')
<div class="d-flex justify-content-center p-2">
    <h2>Edit Post</h2>
</div>

    <div class="col-md-6 px-5 mt-5 mx-auto">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}"> 
              @error('title')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div> 
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug', $post->slug) }}" > 
              @error('slug')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div> 
            <label for="slug" class="form-label">Category</label>
            <select class="form-select" name="category_id"> 
                @foreach ($categories as $category)
                    @if (old('category_id', $post->category->id) == $category->id) 
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
                    @else    
                        <option value="{{ $category->id }}">{{ $category->name }}</option> 
                    @endif
                @endforeach
            </select>

            <div class="mb-3">
                {{-- <input type="hidden" name="oldImage" value="{{ $post->image }}"> --}}
                <label for="image" class="form-label">Choose Thumbnail</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage();">
                @if ($post->image) 
                 <img src="{{asset('storage/'.$post->image)}}" class="img-preview img-fluid col-sm-6 my-3" >
                @else 
                 <img class="img-preview img-fluid col-sm-6 my-3" >
                @endif
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary my-3" name="post_dashboard_submit">UPDATE</button>
          </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', ()=>{
           fetch('/dashboard/posts/checkSlug?title=' + title.value)
           .then(response => response.json())
           .then(data => slug.value = data.slug) 
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display='block';

            // const oFReader = new FileReader();
            // oFReader.readAsDataURL(image.files[0]);

            // oFReader.onload = function(oFREvent){
            //     imgPreview.src = oFREvent.target.result;
            // }

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection