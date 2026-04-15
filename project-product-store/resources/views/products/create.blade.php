@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Add Product</div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
            <div class="mb-3"><label>Description</label><textarea name="description" class="form-control" required></textarea></div>
            <div class="row">
                <div class="col-md-4"><label>Price</label><input type="number" step="0.01" name="price" class="form-control" required></div>
                <div class="col-md-4"><label>Stock</label><input type="number" name="stock" class="form-control" required></div>
                <div class="col-md-4"><label>Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection