@extends('layouts.guest.app')
@section('content')
<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <img src="assets/backend/images/logo-full.png" alt="">
                        </div>
                        <h4 class="text-center mb-4">Sign Up</h4>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1"><strong>Name</strong></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="alert alert-danger solid alert-square "><strong>Error!</strong> {{ $message }} </div>
                                @enderror
                            </div>
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
                            <div class="form-group">
                                <label class="mb-1"><strong>Confirm Password</strong></label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                <div class="alert alert-danger solid alert-square "><strong>Error!</strong> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Signin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

