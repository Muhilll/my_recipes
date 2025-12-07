@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
<div class="card card-primary">
    <div class="card-header justify-content-center">
        <h4>Login</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('login.proses')}}" class="needs-validation" novalidate="">
            @csrf

            {{-- NIS --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="email" required autofocus type="email">
                <div class="invalid-feedback">
                    Please fill in your Email
                </div>
            </div>

            {{-- PASSWORD --}}
            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                    please fill in your password
                </div>
            </div>

            {{-- REMEMBER --}}
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')

@endpush
