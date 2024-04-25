@extends('home')
@section('body')

            <div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
                <div class="login-form">
                    <div class="text-center">
                        <h3 class="title">Se connecter</h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="mb-1 text-dark">{{ __('Email ou nom d\'utilisateur') }}</label>
                            <input type="text" class="form-control @error('userLogin') is-invalid @enderror" name="userLogin" value="{{ old('userLogin') }}" required>
                            @error('userLogin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 position-relative">
                            <label class="mb-1 text-dark">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        </div>
                        <div class="form-row d-flex justify-content-between mt-4 mb-2">

                            <div class="mb-4">
                                <div class="form-check custom-checkbox mb-3">
                                    <input type="checkbox" class="form-check-input"  id="remember" {{ old('remember') ? 'checked' : '' }} required="">
                                    <label class="form-check-label" for="customCheckBox1">   {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                           
                        </div>
                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}
                            </button>
                        </div>

                        
                        <p class="text-center">Non enregistré?

                            <a class="btn-link text-primary" href="{{route('register')}}">Créer nouveau compte</a>
                        </p>
                    </form>
                </div>
            </div>
@endsection


