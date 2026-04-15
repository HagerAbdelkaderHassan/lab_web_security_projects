@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">My Purchases</h4>
                </div>
                <div class="card-body">
                    @if($purchases && $purchases->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                        <th>Purchase Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $index => $purchase)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $purchase->product->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($purchase->product->description, 50) }}</small>
                                        </td>
                                        <td>{{ $purchase->quantity }}</td>
                                        <td>${{ number_format($purchase->product->price, 2) }}</td>
                                        <td class="fw-bold text-success">${{ number_format($purchase->total_price, 2) }}</td>
                                        <td>{{ $purchase->created_at->format('Y-m-d h:i A') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-secondary">
                                    <tr>
                                        <th colspan="4" class="text-end">Total Spent:</th>
                                        <th colspan="2">${{ number_format($purchases->sum('total_price'), 2) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            <i class="bi bi-cart-x"></i>
                            <p>You haven't made any purchases yet.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary mt-2">Browse Products</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection