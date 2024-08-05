@extends('layouts.auth-layout')

@section('content')
    <div class="container">
        <h1>Reset password</h1>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group position-relative">
                <label for="email">Email address</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', $email) }}" 
                    placeholder="Enter your email"
                >
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group position-relative">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your new password"
                >
                <img src="assets/auth/eye.png" class="eye-icon">
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group position-relative">
                <label for="password_confirmation">Confirm Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Re-enter password"
                >
                <img src="assets/auth/eye.png" class="eye-icon">
                @error('password_confirmation')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-block">Update Password</button>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="css/auth/reset-password.css">
@endsection
