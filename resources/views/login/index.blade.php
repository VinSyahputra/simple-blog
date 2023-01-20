@extends('layouts/main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4"> 
      @if (session()->has('success')) 
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      
        <main class="form-signin w-100 m-auto mt-5">
          @if (session()->has('failed'))  
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed</strong> {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            <form action="/login" method="post">
              @csrf 
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@mail.com" name="email" {{ old('email') }} autofocus required>
                <label for="floatingInput">Email address</label>
                @error('email') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
              </div> 
              <button class="w-100 btn btn-lg btn-primary" type="submit" name="login_submit">Log in</button> 
            </form>
            <small class="d-block text-center mt-2">Register <a href="/register">here</a></small>
          </main>
    </div>
</div>
@endsection