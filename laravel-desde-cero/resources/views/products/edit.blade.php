@extends('layouts.master')

@section('content')
    <h1>Create a product</h1>

    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf

        @method('PUT')

        <div class="form-row">
            <label>Title</label>

            <input class="form-contorl" type="text" name="title" value="{{ old('title') ?? $product->title }}" required>
        </div>

        <div class="form-row">
            <label>Description</label>
            
            <input class="form-contorl" type="text" name="description" value="{{ old('description') ?? $product->description }}" required>
        </div>

        <div class="form-row">
            <label>Price</label>
            
            <input class="form-contorl" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') ?? $product->price }}" required>
        </div>

        <div class="form-row">
            <label>Stock</label>
            
            <input class="form-contorl" type="number" min="0" name="stock" value="{{ old('stock') ?? $product->stock }}" required>
        </div>

        <div class="form-row">
            <label>Status</label>
            
            <select class="custom-select" name="status" required>
                <option {{ old('stock') == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '') }} value="available">Available</option>
                <option {{ old('stock') == 'unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '') }} value="unavailable">Unvailable</option>
            </select>
        </div>

        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
        </div>
    </form>
@endsection