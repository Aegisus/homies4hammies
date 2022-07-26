@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-black">{{ __('Vet Verification') }}</div>
                <div class="card-body text-black">
                    @if (auth()->user()->vet_cert == null)
                        {{ __('Before proceeding, please upload your vet certification.') }}
                        <form action="{{ route('verify.vet') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="image-area"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                            <!-- image upload image input-->
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="image_upload" name="vet_cert" type="file" onchange="readURL(this);" class="form-control border-0">
                                <label id="image_upload-label" for="image_upload" class="font-weight-light text-muted">Choose file</label>
                                <div class="input-group-append">
                                    <label for="image_upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-image_upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                </div>
                            </div>
                            <input type="hidden" name="_method" value="PUT" />
                            <button type="submit" class="btn btn-secondary text-white">Submit</button>
                        </form>
                    @elseif (auth()->user()->vet_verify == 0)
                        Our admins are currently vetting through your certificate. Click <a class="text-decoration-none" href="#" onclick="event.preventDefault(); document.getElementById('reverifyvet-form').submit();">here</a><form id="reverifyvet-form" action="{{ route('verify.vet') }}" method="POST" class="d-none">
                            @csrf <input type="hidden" name="_method" value="PUT" />
                        </form> to re-submit
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
