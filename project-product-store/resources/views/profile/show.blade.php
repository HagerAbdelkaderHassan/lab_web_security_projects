@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Profile Information</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr><th>Name</th><td>{{ auth()->user()->name }}</td></tr>
                    <tr><th>Email</th><td>{{ auth()->user()->email }}</td></tr>
                    <tr><th>Role</th><td>{{ auth()->user()->role }}</td></tr>
                    @if(auth()->user()->role === 'customer')
                        <tr><th>Credit Balance</th><td class="fw-bold text-success">${{ number_format(auth()->user()->credit, 2) }}</td></tr>
                    @endif
                </table>
                
                @if(auth()->user()->role === 'customer')
                    <a href="{{ route('my.purchases') }}" class="btn btn-info w-100">View My Purchases</a>
                @endif
            </div>
        </div>
    </div>
    
    @if(auth()->user()->role === 'customer')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h4 class="mb-0">Recent Purchases</h4>
            </div>
            <div class="card-body">
                @if(auth()->user()->purchases && auth()->user()->purchases->count() > 0)
                    @foreach(auth()->user()->purchases->take(5) as $purchase)
                    <div class="border-bottom mb-2 pb-2">
                        <strong>{{ $purchase->product->name }}</strong>
                        <br>
                        <small>Qty: {{ $purchase->quantity }} | Total: ${{ number_format($purchase->total_price, 2) }}</small>
                        <br>
                        <small class="text-muted">{{ $purchase->created_at->format('Y-m-d') }}</small>
                    </div>
                    @endforeach
                    <a href="{{ route('my.purchases') }}" class="btn btn-sm btn-primary mt-2">View All</a>
                @else
                    <p class="text-muted">No purchases yet.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">Browse Products</a>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
@endsection