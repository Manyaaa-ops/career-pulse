@extends('layouts.admin')

@section('title', 'Admin Login - Career Pulse')

@section('content')
<div class="login-container-admin">
    <div class="login-box-admin">
        <div class="text-center mb-4">
            <h3 class="fw-bold"><span style="color: var(--cyan);"><i class="fas fa-bolt"></i></span> Career Pulse</h3>
            <p class="text-muted">Admin Login</p>
        </div>

        <form action="{{ route('admin.login.check') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label-admin">Email</label>
                <input type="email" name="email" class="form-control form-control-admin" required value="admin@careerpulse.com">
            </div>
            <div class="mb-4">
                <label class="form-label-admin">Password</label>
                <input type="password" name="password" class="form-control form-control-admin" required value="password123">
            </div>
            <button type="submit" class="btn btn-admin w-100">Login</button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" style="color: var(--cyan);">← Back to Home</a>
        </div>
    </div>
</div>
@endsection