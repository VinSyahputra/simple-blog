@extends('dashboard/layouts/main')
@section('container')
    <h1>welcome {{auth()->user()->name }}</h1>
@endsection