@extends('layouts.auth-layout')

@section('content')
    <div class="container">
        <h1 class="display-4 mb-3">Welcome back!</h1>
        <p class="text-muted mb-4">Enter your Credentials to access your account</p>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email address</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Enter your email"
                >
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3 position-relative">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password"
                >
                <img src="assets/auth/eye.png" class="eye-icon">
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ url('/forgot-password') }}" class="forgot-password d-block mb-3 text-end">Forgot password</a>
            <button type="submit" class="btn btn-success btn-block w-100">Login</button>
        </form>
    </div>
@endsection


@section('styles')
    <link rel="stylesheet" href="css/auth/login.css">
@endsection
