@extends('layouts.app')
@section('content')
<div class="d-flex vh-100 text-center text-white">
  <div class="cover-container d-flex mx-auto flex-column justify-content-center align-items-center">
    <h1>Welcome</h1>
    {{-- <p class="lead">{{$title}}</p> --}}
    <p class="lead">
      <a href="/home" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Monitor your hamsters</a>
      
    </p>
  </div>
</div>
@endsection
