@extends('layouts.master-without-nav')
@section('title')
Recover Password
@endsection
@section('body')
<body class="auth-body-bg">
@endsection
@section('content')
<div class="home-btn d-none d-sm-block">
    <a href="{{url('index')}}"><i class="mdi mdi-home-variant h2 text-white"></i></a>
</div>
<div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div style="padding-bottom: 20px;">
                                            <a href="{{url('index')}}" class="logo"><img src="{{ URL::asset('/assets/images/logo.png')}}" height="" width="200" alt="logo"></a>
                                        </div>

                                        <h4 class="font-size-18">Réinitialisation du mot de passe</h4>
                                    </div>
                                    <div class="p-2 mt-5">
                                        <div class="alert alert-success mb-4" role="alert">
                                            Entrez votre email pour réinitialiser le mot de passe de votre compte
                                        </div>

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-mail-line auti-custom-input-icon"></i>
                                                <label for="email">{{ __('E-Mail Address') }}</label>
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mt-4 text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Réinitialiser</button>
                                            </div>
                                        </form>
                                        <div class="mt-4 text-center">
                                            <p><a href="{{url('register')}}" class="font-weight-medium text-primary"> Créer votre compte</a> </p>
                                            <p><script>document.write(new Date().getFullYear())</script>© E-Stage</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" style="background-repeat: no-repeat;background-image:url('/assets/images/bg.jpg');background-size: cover;">
                <div class="authentication-bg">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection