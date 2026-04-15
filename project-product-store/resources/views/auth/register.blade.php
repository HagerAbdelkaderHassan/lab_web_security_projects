@extends('layouts.guest')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white"><h4>Register</h4></div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error){{ $error }}<br>@endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>
            <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}" required></div>
            <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
            <div class="mb-3"><label>Confirm Password</label><input type="password" name="password_confirmation" class="form-control" required></div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="mt-3 text-center"><a href="{{ route('login') }}">Already have an account? Login</a></div>
    </div>
</div>
@endsection