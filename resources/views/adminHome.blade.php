@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-black">{{ __('Dashboard') }}</div>
                <div class="card-body text-black">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            {{-- <th scope="col">User Id</th> --}}
                            <th scope="col">Email</th>
                            <th scope="col">Certification</th>
                            <th scope="col">Verification Status</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    {{-- <td>
                                        {{$user->user_id}}
                                    </td> --}}
                                    <td>{{ $user->email }}</td>
                                    {{-- {{ $user->vet_cert }} --}}
                                    <td>
                                        <div id="gallery-lightbox-carosel" class="row" data-bs-toggle="modal" data-bs-target="#caroselModal">
                                              <img class="w-50 h-50" src="{{$user->vet_cert}}" alt="no cert" data-target="#carosel_img" onclick="idna5(this)">
                                        </div>
                                        {{-- /storage/cover_images/user.png" --}}
                                      {{-- <a href="storage/cover_images/user.png" data-lightbox="image-1" data-title="My caption">Image #1</a> --}}
                                    </td>
                               
                                    <td>@if ($user->vet_verify == 1)
                                        <p class="text-success">Verified</p>
                                        @else
                                        <p class="text-danger">Not verified</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->vet_verify == 0)
                                            <form action="{{ route('invoke.verify_action') }}" method="POST" >
                                                @csrf
                                                <button class="btn btn-primary" name="invoke_verify" value="{{$user->user_id}}" type="submit">Verify</button>
                                            </form>
                                        @else
                                            <form action="{{ route('invoke.verify_action') }}" method="POST" >
                                                @csrf
                                                <button class="btn btn-primary" name="invoke_revert" value="{{$user->user_id}}" type="submit">Revert</button>
                                            </form>
                                        @endif
                                        {{-- <form id="verify-form" action="{{ route('invoke.verify') }}" method="POST" class="d-none">
                                            @csrf
                                            <input type="hidden" value="1" name="verify_action">
                                            <input type="hidden" value="{{$user->user_id}}" name="vet_id_for_action">
                                        </form> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">There are no users.</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                      {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
