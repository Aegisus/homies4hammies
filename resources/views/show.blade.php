@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              @if ($user->cover_image == '' || $user->cover_image == null)
                <img src="/storage/cover_images/avatar-gafb6df399_640.png"
                alt="No image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
              @else
                <img src="/storage/cover_images/{{$user->cover_image}}"
                alt="No image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
              @endif
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5>{{$user->name}}</h5>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About me</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                @if ($user->about_me == '' || $user->about_me == null)
                  <p class="font-italic mb-1 text-muted">
                      No bio yet...
                  </p>
                @else
                  <p class="font-italic mb-1">
                      {{$user->about_me}}
                  </p>
                @endif
              </div>
            </div>
            <div class="mb-5">
              <p class="lead fw-normal mb-1">Hamster stats</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">weight: 50g</p>
                  <p class="font-italic mb-1">temperature: 25 Degree Celsius</p>
                  <p class="font-italic mb-1">humidity: 30%</p>
                  <p class="font-italic mb-1">distance ran: 3km</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
