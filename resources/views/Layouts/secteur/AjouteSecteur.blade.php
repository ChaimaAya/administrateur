@extends('master')
@section('body')
<div class="page-titles">
    <ol class="breadcrumb">
        <li><h5 class="bc-title">Ajouter un secteur</h5></li>
        <li class="breadcrumb-item"><a href="{{route('accueil')}}">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </a>
        </li>
    </ol>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
           <div class="filter cm-content-box box-primary">
              <div class="content-title SlideToolHeader">
                 <div class="cpa">
                    Secteur
                 </div>
                 <div class="tools">
                    <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                 </div>
              </div>
              <div class="cm-content-body form excerpt">
                 <div class="card-body">
                    <form method="POST" action="{{route('store')}}">
                        @csrf
                       <div class="row">
                          <div class="col-xl-6 col-sm-6">
                             <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" placeholder="Title">
                             </div>
                          </div>
                       </div>
                       <button type="submit" class="btn btn-primary btn-sm mt-3 mt-sm-0">Ajouter</button>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </div>
</div>
@endsection
