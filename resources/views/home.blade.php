@extends('layouts.app')

@section('content')
  @if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
  @endif
  @if ($user->type == 'user')
        <section class="vh-100" >
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col col-lg-9 col-xl-7">
                <div class="card">
                  <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                      @if ($user->cover_image == '' || $user->cover_image == null)
                        <img src="/storage/cover_images/user.png"
                        alt="No image" class="img-fluid img-thumbnail mt-4 mb-2"
                        style="width: 150px; z-index: 1">
                      @else
                        <img src="/storage/cover_images/{{$user->cover_image}}"
                        alt="No image" class="img-fluid img-thumbnail mt-4 mb-2"
                        style="width: 150px;height: 155px; z-index: 1">
                      @endif
                      <a href="/edit" type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                        style="z-index: 1;">
                        Edit profile
                    </a>
                    </div>
                    <div class="ms-3" style="margin-top: 130px;">
                      <h5>{{$user->name}}</h5>
                      {{-- <p>New York</p> --}}
                    </div>
                  </div>
                  <div class="p-4 text-black" style="background-color: #f8f9fa;">
                    {{-- <div class="d-flex justify-content-end text-center py-1">
                      <div>
                        <p class="mb-1 h5">253</p>
                        <p class="small text-muted mb-0">Photos</p>
                      </div>
                      <div class="px-3">
                        <p class="mb-1 h5">1026</p>
                        <p class="small text-muted mb-0">Followers</p>
                      </div>
                      <div>
                        <p class="mb-1 h5">478</p>
                        <p class="small text-muted mb-0">Following</p>
                      </div>
                    </div> --}}
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
                    {{-- <div class="d-flex justify-content-between align-items-center mb-4">
                      <p class="lead fw-normal mb-0">Recent photos</p>
                      <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                    </div> --}}
                    {{-- <div class="row g-2">
                      <div class="col mb-2">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                          alt="image 1" class="w-100 rounded-3">
                      </div>
                      <div class="col mb-2">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                          alt="image 1" class="w-100 rounded-3">
                      </div>
                    </div> --}}
                    {{-- <div class="row g-2">
                      <div class="col">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                          alt="image 1" class="w-100 rounded-3">
                      </div>
                      <div class="col">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                          alt="image 1" class="w-100 rounded-3">
                      </div>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      @endif
@endsection
