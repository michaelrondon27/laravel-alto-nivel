@extends('layouts.master')

@section('content')
    <h1>Create a product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="form-row">
            <label>Title</label>

            <input class="form-contorl" type="text" name="title" required value="{{ old('title') }}">
        </div>

        <div class="form-row">
            <label>Description</label>
            
            <input class="form-contorl" type="text" name="description" required value="{{ old('description') }}">
        </div>

        <div class="form-row">
            <label>Price</label>
            
            <input class="form-contorl" type="number" min="1.00" step="0.01" name="price" required value="{{ old('price') }}">
        </div>

        <div class="form-row">
            <label>Stock</label>
            
            <input class="form-contorl" type="number" min="0" name="stock" required value="{{ old('stock') }}">
        </div>

        <div class="form-row">
            <label>Status</label>
            
            <select class="custom-select" name="status" required>
                <option value="" selected>Select...</option>
                <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Available</option>
                <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
            </select>
        </div>

        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>
    </form>
@endsection