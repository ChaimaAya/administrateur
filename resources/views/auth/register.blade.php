@extends('home')
@section('body')

            <div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
                <div class="login-form">
                    <div class="text-center">
                        <h3 class="title">S’inscrire</h3>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="mb-1 text-dark">{{ __('Name') }}
                            </label>
                            <input type="text" id="name" class="form-control form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="mb-1 text-dark">{{ __('Email Address') }}</label>
                            <input type="email" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>
                        <div class="mb-4 position-relative">
                            <label class="mb-1 text-dark">{{ __('Password') }} </label>
                            <input type="password" id="dz-password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <span class="show-pass eye">
                            
                                <i class="fa fa-eye-slash"></i>
                                <i class="fa fa-eye"></i>
                            
                            </span>
                        </div>


                        <div class="mb-4 position-relative">
                            <label class="mb-1 text-dark">{{ __('Confirm Password') }}</label>
                            <input type="password" id="dz-password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                           
                            
                        </div>

                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-primary btn-block">  {{ __('Register') }}</button>
                        </div>
                        
                        
                        <p class="text-center">Déjà un compte?  
                            <a class="btn-link text-primary" href="{{route('login')}}">Se connecter</a>
                        </p>
                    </form>
                </div>
            </div>
            
@endsection

