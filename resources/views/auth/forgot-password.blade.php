@extends('layouts.auth-layout')

@section('content')
    <div class="container">
        @if (!session('status'))
            <h1 class="display-4 mb-3">Forgot password</h1>
            <p class="text-muted mb-4">Please enter your email to reset the password</p>
            <form action="{{ url('/password/email') }}" method="POST">
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
                <button type="submit" class="btn btn-success w-100">Send</button>
            </form>
        @else
            <h1 class="display-4 mb-3">Check your email</h1>
            <p class="text-muted mb-4">We sent you an email with instructions for resetting your password</p>
        @endif
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="css/auth/forgot-password.css">
@endsection
