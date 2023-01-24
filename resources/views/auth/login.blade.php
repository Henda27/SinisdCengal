@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                        <div class="d-flex justify-content-center py-4">
                            <img src="{{asset('templating/assets/')}}/img/logo.png" alt="">
                            </a>
                        </div>
                        <p class="text-center small">Masukkan email & kata sandi Anda untuk masuk</p>
                    </div>

                    <form class="row g-3 needs-validation" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="col-12">
                            <label for="Email" class="form-label">{{ __('Email') }}</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="youremail" required>
                                <div class="invalid-feedback">Please enter your email.</div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">{{ __('Password') }}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                            <div class="invalid-feedback">Please enter your password!</div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">{{ __('Login') }}</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="credits">
                <div class="copyright" style="text-align: center;">
                    &copy; Copyright <strong><span>Sistem Informasi Perhitungan Nilai Mata Pelajaran</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>
    </div>
</div>
@endsection