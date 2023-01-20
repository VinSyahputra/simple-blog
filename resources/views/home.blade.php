@extends('layouts/main')
@section('container')
@foreach ($users as $user)
    {{ $user->id }}
    <br>
@endforeach
@endsection