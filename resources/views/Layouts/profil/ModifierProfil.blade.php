@extends('master')
@section('body')
<style>
   .custom-image {
   width: 100px;
   height: 120px;
   object-fit: cover;
   border-radius: 50%;
}


</style>
<div class="page-titles">
    <ol class="breadcrumb">
        <li><h5 class="bc-title">Profile</h5></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </a>
        </li>
    </ol>
</div>
<div class="container">
    <div class="row justify-content-center align-items-center">
       <div class="col-xl-6 col-lg-8">
          <div class="card profile-card card-bx m-b30">
          <form method="post" action="{{route('updateProfile',Auth::user()->id)}}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')


                <div class="card-body">
                   <div class="row">
                      <div class="p-5">
                         <div class="author-profile">
                         <div class="author-media">
    @if(Auth::user()->image)
        <img id="preview-image" src="{{ asset('images/profile/'.Auth::user()->image) }}" class="rounded-circle custom-image">
    @else
        <img id="preview-image" src="{{ asset('images/avatar/1.png') }}" class="rounded-circle custom-image">
    @endif
    <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
        <input type="file" id="image-input" name="image" class="update-flie" onchange="previewImage()" />
        <i class="fa fa-camera"></i>
    </div>
</div>

                            <div class="author-info">
                               <h6 class="title">{{ Auth::user()->name }}</h6>
                               <span>{{ Auth::user()->type }}</span>
                            </div>
                         </div>
                      </div>
                      <div class="col-sm-6 m-b30">
                         <label class="form-label">Nom</label>
                         <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" />
                      </div>
                      <div class="col-sm-6 m-b30">
                         <label class="form-label">Adresse email </label>
                         <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                      </div>
                   </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm mt-3 mt-sm-0">Modifier</button>
               </div>

             </form>
          </div>
       </div>
    </div>
 </div>
</div>
@endsection
<script>
    function previewImage() {
        var preview = document.getElementById('preview-image');
        var file = document.getElementById('image-input').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
