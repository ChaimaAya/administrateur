@extends('master')
@section('body')
<div class="page-titles">
    <ol class="breadcrumb">
        <li><h5 class="bc-title">Fondateurs</h5></li>
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
        <div class="col-12">
           <div class="card">
              <div class="card-header">
                 <h4 class="card-title">Liste des fondateurs</h4>
              </div>

              <div class="card-body">
                 <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
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

                       <thead>
                          <tr>
                             <th></th>
                             <th>Nom</th>
                             <th>Email</th>
                             <th>Numero</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                        @foreach($fondateurs as $f)
                           <tr>

<td>
    @if($f->image)
        <img src="http://127.0.0.1/pfeOrigin/BackendUser1/public/uploads/{{$f->image}}" class="avatar avatar-md" alt="">
    @endif
</td>


                              <td>{{$f->name}}</td>
                              <td><a href="mailto:{{$f->email}}"><strong>{{$f->email}}</strong></a></td>
                              <td>{{$f->phone}}</td>
                              <td>
                                 <div class="d-flex">
                                    <a href="{{ route('deletefondateur', $f->id) }}"  class="btn btn-danger shadow btn-xs sharp mr-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fondateur ?')"><i class="fa fa-trash"></i> Delete</a>
                                    &nbsp;&nbsp;<a href="{{route('showfondateur',$f->id)}}" class="btn btn-light-purple shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                                 </div>
                              </td>

                           </tr>
                        @endforeach
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
     </div>

</div>

@endsection
