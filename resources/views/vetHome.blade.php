@extends('layouts.app')

@section('content')
  @if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
  @endif
  {{-- <div class="d-flex flex-column-reverse">
    <div class="p-2 bd-highlight">Flex item 1</div>
    <div class="p-2 bd-highlight">Flex item 2</div>
    <div class="p-2 bd-highlight">Flex item 3</div>
  </div> --}}
  @foreach ($users as $user)
    <div class="card mb-4">
      <div class="row g-0">
        <div class="col-md-4 text-center">
          @if ($user->cover_image == '' || $user->cover_image == null)
            <img src="/storage/cover_images/user.png"
            alt="No image" class="img-fluid img-thumbnail mt-4 mb-2"
            style="width: 150px; z-index: 1">
          @else
            <img src="/storage/cover_images/{{$user->cover_image}}"
            alt="No image" class="img-fluid img-thumbnail mt-4 mb-2"
            style="width: 150px; z-index: 1">
          @endif
          <h5>{{$user->name}}</h5>
          {{-- <p>Web Designer</p> --}}
          <i class="far fa-edit mb-1"></i>
        </div>
        <div class="col-md-8">
          <div class="card-body p-3">
            <h6>Hamster stats</h6>
            <hr class="mt-0 mb-4">
            <div class="row pt-1">
              <div class="col-3 mb-1">
                <h6>weight</h6>
                <p class="text-muted">50g</p>
              </div>
              <div class="col-3 mb-1">
                <h6>temperature</h6>
                <p class="text-muted">25 Degree Celsius</p>
              </div>
              <div class="col-3 mb-1">
                <h6>humidity</h6>
                <p class="text-muted">30%</p>
              </div>
              <div class="col-3 mb-1">
                <h6>distance ran</h6>
                <p class="text-muted">3km</p>
              </div>
            </div>
            {{-- <h6>Projects</h6>
            <hr class="mt-0 mb-2">
            <div class="row pt-1">
              <div class="col-6 mb-1">
                <h6>Recent</h6>
                <p class="text-muted">Lorem ipsum</p>
              </div>
              <div class="col-6 mb-1">
                <h6>Most Viewed</h6>
                <p class="text-muted">Dolor sit amet</p>
              </div>
            </div> --}}
            <div class="d-flex justify-content-start">
              <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
              <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
              <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
            </div>
            <a href="/vet/show/{{$user->user_id}}" class="btn btn-secondary text-white">View profile</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
