@extends('master')

@section('body')
<div class="page-titles">
    <ol class="breadcrumb">
        <li><h5 class="bc-title">Réclamations</h5></li>
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
                 <h4 class="card-title">Liste des réclamations</h4>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                       <thead>
                          <tr>
                             <th>Nom</th>
                             <th>Email</th>
                             <th>Sujet</th>
                             <th>Description</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                          @foreach($reclamations as $reclamation)
                          <tr>
                             <td>{{ $reclamation->user->name ?? 'Utilisateur inconnu' }}</td>
                             <td><a href="mailto:{{ $reclamation->user->email ?? 'N/A' }}">{{ $reclamation->user->email ?? 'N/A' }}</a></td>
                             <td>{{$reclamation->sujet}}</td>
                             <td>{{Str::limit($reclamation->description,50)  }}</td>
                             <td>
                                <div class="d-flex">
                                    <a href="{{route('showReclamation',$reclamation->id)}}" class="btn btn-light-purple shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                                    <form action="{{ route('supprimer', $reclamation->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger shadow btn-xs sharp ms-1" title="Supprimer">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
        </svg>
    </button>
</form>
                                    @if($reclamation->statut == 'en_attente')
                                        <a href="{{ route('accepter', ['id' => $reclamation->id]) }}" class="btn btn-success shadow btn-xs sharp ms-1" title="Accepter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('refuser', ['id' => $reclamation->id]) }}" class="btn btn-warning shadow btn-xs sharp ms-1" title="Refuser">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                                <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                                            </svg>
                                        </a>
                                    @endif
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
