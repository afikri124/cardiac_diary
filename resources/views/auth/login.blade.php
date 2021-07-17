@extends('layouts.authentication.master')
@section('title', 'Sign in')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div><a class="logo" href="{{ route('index') }}">
                            <img class="img-fluid" style="max-width: 50%;" src="{{asset('assets/images/logo.png')}}"
                                alt="looginpage"></a>
                    </div>
                    <div class="login-main">
                        <form class="theme-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4>Sign in to account</h4>
                            <div class="form-group">
                                <label class="col-form-label">Username</label>
                                <input id="username" type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="username"
                                    value="{{ old('username') }}" required autofocus autocomplete="off">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label class="col-form-label">Password</label>
                                <input class="form-control" id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0 mt-4">
                            <div class="checkbox p-0">
                                    <input class="form-check-input" id="checkbox1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="text-muted" for="checkbox1">Remember password</label>
                                </div>
                                <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                                <button type="submit" class="btn btn-primary">
                                    Sign in
                                </button>
                            </div>
                            
                            <p class="mt-4 mb-0">New here?<a class="ms-2" href="{{ route('register') }}">Sign up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
