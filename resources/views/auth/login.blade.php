@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br> <br> <br> <br>
            <div class=" card Specialcard border-secondary mb-3  " >

                <div class="card-header border-secondary m-0 ">
                    <img src="{{asset('img/logoNew1.png')}}" alt="logo">
                    <input type="hidden"   value="{{ __('Login') }}" />

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <label for="email" class="col-sm-4 col-form-label text-md-right text-white" >
                                {{-- __('E-Mail Address')   --}} Adresse E-mail :
                            </label>

                            <div class="col-md-6 ">

                                <input id="email" type="email" class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }} "
                                       name="email" value="{{ old('email') }}"
                                       required autofocus placeholder="Entrez votre E-mail ">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-white " style="background-color:darkslategrey">
                                        <strong class="h5 ">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-white ">
                                {{-- __('Password') --}} Mot de passe :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                       placeholder="Entrez votre mot de passe "required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label class="text-light">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                       {{-- __('Remember Me') --}} Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{-- __('Login') --}} Connexion
                                </button>

                                <a   class="btn btn-outline-warning" href="{{ route('password.request') }}">
                                    {{-- __('Forgot Your Password?')--}}Mot de passe oublié?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
