@extends('master')
@section('body')
<div class="page-titles">
    <ol class="breadcrumb">
        <li><h5 class="bc-title">Secteurs</h5></li>
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
                 <h4 class="card-title">Liste de Secteurs</h4>
                 <div class="mb-4">
                    <a href="{{ route('AjouteSecteur') }}" class="btn btn-primary btn-rounded">+ Nouveau Secteur</a>
                 </div>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                     @if (session('success'))
                     <div class="alert alert-success" role="alert">
                          {{session('success')}}
                    </div>
                    @endif
                       <thead>

                          <tr>
                             <th>Nom</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                        @foreach ($secteurs as $item)
                        <tr>
                           <td>{{ $item->nom }}</td>
                           <td>
                              <div class="d-flex">

                                 <a href="{{ route('ModifierSecteur', $item->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                 <form action="{{ route('supprimerSecteur', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce secteur ?')"><i class="fa fa-trash"></i></button>
                                </form>   
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
