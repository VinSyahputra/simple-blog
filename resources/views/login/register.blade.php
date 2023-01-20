@extends('layouts/main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-5"> 
        <main class="form-signin w-100 m-auto mt-5">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post"> 
              @csrf
              <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="name" value="{{ old('name') }}" required>
                <label for="floatingInput">Name</label>

                @error('name') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                <label for="floatingInput">Email address</label>

                @error('email') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" value="{{ old('password') }}" required>
                <label for="floatingPassword">Password</label>

                @error('password') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div> 
              <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit_regis">Submit</button> 
            </form>
            <small class="d-block text-center mt-2">Have an account ? <a href="/login">Login now</a></small>
          </main>
    </div>
</div>
@endsection
