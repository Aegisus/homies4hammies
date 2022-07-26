<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{config('app.name','Thinkering')}}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
    <!-- Styles -->
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/cover.js')}}" defer></script>
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" defer></script>
    <script async>
        const target = document.getElementById("alertDiv");
        if (target){
            window.onload = setInterval(() => target.style.opacity = '0', 3000);
        }
    </script>
</head>
<body class="bg-dark">
{{-- use light box --}}
<div class="d-flex w-100 p-3 mx-auto flex-column" id="app">
    <header class="mb-auto text-white">
        @include('inc.nav')
        </header>
    <main class="py-5">
        @include('inc.messages')
        @yield('content')
    </main>

    {{-- <footer class="mt-auto text-white-50"> --}}
        {{-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> --}}
    {{-- </footer> --}}
</div>
{{-- @if (auth()) --}}
    @if (auth()->user()!== null && auth()->user()->type == 'admin')
    <div class="modal" id="caroselModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close m-0 p-3 text-white bg-transparent border-0 position-absolute right-0" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-transparent">
            <div class="modal-body p-0">
            <div id="carosel_img" class="carousel slide">
                @foreach ($users as $user)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{$user->vet_cert}}" alt="no cert">
                    </div>
                @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carosel_img" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carosel_img" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> 
            </div>
            </div>
        </div>
        </div>
    </div>
@endif
</body>
</html>
