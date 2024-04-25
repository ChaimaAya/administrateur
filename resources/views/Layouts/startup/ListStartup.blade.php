@extends('master')
@section('body')

<div class="page-titles">
   <ol class="breadcrumb">
       <li><h5 class="bc-title">Startup</h5></li>
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
@if(session('messageSuccess'))
    <div class="alert alert-success">
        <strong>{{ session('messageSuccess') }}</strong>
    </div>
@endif

@if(session('messageError'))
    <div class="alert alert-danger">
        <strong>{{ session('messageError') }}</strong>
    </div>
@endif
   <div class="col-xl-12">
      <div class="tab-content">
         <div class="tab-pane fade active show" id="AllStatus">
            @foreach($startups as $s)
            <div class="card project-card">
               <div class="card-header">
                  <h4 class="card-title">Startup</h4>
               </div>
               <div class="card-body py-3 px-4">
                  <div class="row align-items-center">
                     <div class="col-xl-3 col-md-4 col-sm-12 align-items-center customers">
                        <div class="media-body">
                           <p class="text-primary mb-0">{{$s->nom}}</p>
                           <h6 class="text-black">{{$s->description}}</h6>
                           <p class="mb-0"><i class="fas fa-calendar me-3"></i>Créé le
                              {{$s->created_at}}
                           </p>
                        </div>
                     </div>
                     <div class="col-xl-2 col-md-4 col-sm-6 mt-md-0 mt-sm-3">
                        <div class="d-flex project-image">

                           <img src="http://127.0.0.1/pfeOrigin/BackendUser1/public/uploads/{{$s->user->image}}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$s->user->name}}"> &nbsp; &nbsp; &nbsp;
                           <div>
                              <p class="mb-0">Fondateur</p>
                              <h6 class="mb-0">{{$s->user->name}}</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-md-6 col-sm-6 mt-3 mt-xl-0">
                        <div class="d-flex project-image">
                           <svg class="me-3" width="45" height="45" viewBox="0 0 55 55" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                           </svg>
                           <div>
                              <p class="mb-0">Date de création</p>
                              <h6 class="mb-0">{{$s->created_at}}</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-2 col-sm-6 col-sm-4 mt-xl-0 mt-3">
                        <div class="d-flex justify-content-sm-end project-btn">
                           @if ($s->secteur)
                           <a href="javascript:void(0);" class="badge badge-warning light badge-md">{{$s->Secteur->nom}}</a>
                           @else
                           <span class="badge badge-warning light badge-md">Secteur non spécifié</span>
                           @endif                                    </a>
                           <div class="dropdown ms-4 mt-auto mb-auto">
                              <div class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                       stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round"></path>
                                    <path
                                       d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                       stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round"></path>
                                    <path
                                       d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                       stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round"></path>
                                 </svg>
                              </div>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a  class="dropdown-item" href="{{route('deleteStartup',['id'=>$s->id])}}"   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette startup ?')"  class="btn btn-danger shadow btn-xs sharp">Supprimer</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   <div class="d-flex align-items-center justify-content-between flex-wrap">
      <div class="mb-sm-0 mb-3">
         <p class="mb-0 text-black">Affichage de {{ count($startups) }} sur {{ count($startups) }} données</p>
      </div>
      <nav>
         <ul class="pagination pagination-circle">
            <li class="page-item page-indicator">
               <a class="page-link" href="javascript:void(0)">
               <i class="la la-angle-left"></i>
               </a>
            </li>
            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
            <li class="page-item page-indicator">
               <a class="page-link" href="javascript:void(0)">
               <i class="la la-angle-right"></i>
               </a>
            </li>
         </ul>
      </nav>
   </div>
</div>
</div>
@endsection
