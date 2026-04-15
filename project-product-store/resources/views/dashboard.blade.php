@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header bg-primary text-white"><h4>Dashboard</h4></div>
    <div class="card-body">
        <h4>Welcome, {{ auth()->user()->name }}!</h4>
        <p>Your role: <strong>{{ auth()->user()->role }}</strong></p>
        @if(auth()->user()->role === 'customer')
            <p>Your credit: <strong>${{ number_format(auth()->user()->credit, 2) }}</strong></p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Browse Products</a>
            <a href="{{ route('profile.show') }}" class="btn btn-info">My Profile</a>
        @elseif(auth()->user()->role === 'employee')
            <a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
            <a href="{{ route('profile.show') }}" class="btn btn-info">My Profile</a>
        @else
            <a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
            <a href="{{ route('profile.show') }}" class="btn btn-info">My Profile</a>
        @endif
    </div>
</div>
@endsection