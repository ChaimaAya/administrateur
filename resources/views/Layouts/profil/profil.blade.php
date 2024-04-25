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
<div class="container">
   <div class="row justify-content-center align-items-center">
      <div class="col-xl-6 col-lg-8">
         <div class="clearfix">
            <div class="card card-bx profile-card author-profile m-b30">
               <div class="card-body">
                  <div class="p-5">
                     <div class="author-profile">
                        <div class="author-media">
                        @if(Auth::user()->image)
    <img src="{{ asset('images/profile/'.Auth::user()->image) }}" class="rounded-circle custom-image">
@else
    <img src="{{ asset('images/avatar/1.png') }}" class="rounded-circle custom-image">
@endif
                        </div>
                        <div class="author-info">
                           <h6 class="title">{{Auth::user()->name}}</h6>
                           <span>{{Auth::user()->type}}</span>
                        </div>
                     </div>
                  </div>
                  <div class="info-list">
                     <ul>
                        <li><span>Name</span><span>{{Auth::user()->name}}</span></li>
                        <li><span>Email</span><span>{{Auth::user()->email}}</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
