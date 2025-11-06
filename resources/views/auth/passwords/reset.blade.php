@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center vh-30">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card" style="margin: auto;">

                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
                @endif

                <div class="card-header bg-primary text-center">
                    <a href="{{ route('home') }}" style="text-decoration: none; display: flex; flex-direction: column; align-items: center;">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="height: 33px; width: auto; margin-bottom: 10px;">
                        <span style="color: white; font-weight: bold; font-size: 1.5rem;">Reset Password</span>
                    </a>
                </div>

                <div class="card-body p-5">
                    <h4 class="text-dark mb-4 text-center">Set New Password</h4>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-3">
                            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection