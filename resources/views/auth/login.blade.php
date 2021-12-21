@extends('layouts.guest.app')
@section('content')
<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                       <h1> SHProfessional </h1>
                           <!-- <img src="{{ asset('assets/images/cover.png') }}" width="100%" alt="">-->
                        </div>
                        <h4 class="text-center mb-4">Sign in your account</h4>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1"><strong>Email</strong></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="alert alert-danger solid alert-square "><strong>Error!</strong> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Password</strong></label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password')
                                <div class="alert alert-danger solid alert-square "><strong>Error!</strong> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                   <div class="custom-control custom-checkbox ml-1">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                        <label class="custom-control-label" for="remember">Remember my preference</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- <a href="{{ route('password.request') }}">Forgot Password?</a> --}}
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </form>
                        {{-- <div class="new-account mt-3">
                            <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                        </div> --}}
                    </div>
                    <div class="card-footer text-center">
                        <h5>Developed by iciclecorporation.com</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

