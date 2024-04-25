@extends('master')

@section('body')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="team-single">
                <div class="row">
                    <div class="col-lg-4 col-md-5 xs-margin-30px-bottom text-center">
                        <div class="team-single-img">
                            @if($fondateur->image)
                        <img src="http://127.0.0.1/pfeOrigin/BackendUser1/public/uploads/{{$fondateur->image}}" class="avatar avatar-md" alt=""
                                width="200" height="200" >
                                @endif
                        </div>
                        <div
                            class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                            <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">
                                {{ $fondateur->name }}</h4>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-7">
                        @if($startups !== null)

                        @foreach ($startups as $startup)

                        <div class="team-single-text padding-50px-left sm-no-padding-left">
                            <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $startup->nom }}</h4>
                            <p class="no-margin-bottom">{{ $startup->description }}</p>
                            <div class="contact-info-section margin-40px-tb">
                                <ul class="list-style9 no-margin">

                                    <li>

                                    </li><br/>                        @endforeach


                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-mobile-alt text-purple"></i>
                                                <strong
                                                    class="margin-10px-left xs-margin-four-left text-purple">Numéro de
                                                    téléphone:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p>{{ $fondateur->numero }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-envelope text-pink"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><a href="javascript:void(0)">{{ $fondateur->email }}</a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @else
                        <div class="team-single-text padding-50px-left sm-no-padding-left">
                            <p>Aucune donnée disponible.</p>
                        </div>
                        @endif

                    </div>

                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
