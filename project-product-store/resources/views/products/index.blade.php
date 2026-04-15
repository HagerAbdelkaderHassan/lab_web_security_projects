@extends('layouts.app')

@section('content')
<h1>Products</h1>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5>{{ $product->name }}</h5>
                <p>{{ $product->description }}</p>
                <p><strong>Category:</strong> {{ $product->category->name ?? 'No Category' }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Stock:</strong> {{ $product->stock }}</p>
                @auth
                    @if(auth()->user()->role === 'customer')
                    <form action="{{ route('products.buy', $product) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                        <button type="submit" class="btn btn-success">Buy</button>
                    </form>
                    @endif
                    @if(in_array(auth()->user()->role, ['admin', 'employee']))
                    <div class="mt-2">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    @endforeach
</div>
@auth
    @if(in_array(auth()->user()->role, ['admin', 'employee']))
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    @endif
@endauth
@endsection