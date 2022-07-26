@extends('layouts.app')
@section('content')
<div class="container py-5">
  <div class="row py-4">
      <div class="col-lg-6 mx-auto">
        <form action="{{ route('edit.updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="about me" class="text-white mb-4">Set a bio</label>
            <textarea class="form-control border-0 mb-4" name="about_me"></textarea>
            <label for="image_upload" class="text-white">image_upload profile photo</label>
            <div class="image-area"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block" style="width: 150px;"></div>
            <!-- image upload image input-->
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="image_upload" name="cover_image" type="file" onchange="readURL(this);" class="form-control border-0">
                <label id="image_upload-label" for="image_upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="image_upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-image_upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT" />
            <button type="submit" class="btn btn-secondary text-white">Submit</button>
        </form>
      </div>
  </div>
</div>
@endsection
