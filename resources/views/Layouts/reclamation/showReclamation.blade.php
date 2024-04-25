@extends('master')
@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Détails de la réclamation</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nom :</strong> {{ optional($reclamation->user)->name }}</p>
                            <p><strong>Email :</strong> <a href="mailto:{{ optional($reclamation->user)->email }}">{{ optional($reclamation->user)->email }}</a></p>
                            <p><strong>Sujet :</strong> {{ $reclamation->sujet }}</p>
                            <p><strong>Description :</strong> {{ $reclamation->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if($reclamation->statut == 'en_attente')
                        <a href="{{ route('refuser', ['id' => $reclamation->id]) }}" class="btn btn-warning">Refuser</a>
                        <a href="{{ route('accepter', ['id' => $reclamation->id]) }}" class="btn btn-success">Accepter</a>
                    @elseif($reclamation->statut == 'en_traitement')
                        <a href="{{ route('resoudre', ['id' => $reclamation->id]) }}" class="btn btn-info">Résolue</a>
                    @endif
                    <a href="{{ route('listreclamation') }}" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection