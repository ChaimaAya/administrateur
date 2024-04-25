
Hmida Aya
19:43 (il y a 7 minutes)
À moi

@extends('master')

@section('body')

<div class="page-titles">
    <ol class="breadcrumb">
        <li><h5 class="bc-title">Ajouter un administrateur</h5></li>
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
                        @if($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
@endif

                        Administrateur
                    </div>
                    <div class="tools">
                        <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                    </div>
                </div>

                <div class="cm-content-body form excerpt">
                    <div class="card-body">
                        <form action="{{ route('storeAdmin') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Nom<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="exampleFormControlInput2" placeholder="" required>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="exampleFormControlInput3" placeholder=""required>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Role<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" name="type">
                                        <option value="administrateur">Admiinistrateur</option>
                                        <option value="sousAdministrateur">sous admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary me-1" onclick={}>Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
