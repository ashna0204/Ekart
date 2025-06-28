@extends('admin.Layouts.Main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $product->name }}</h3>
    </div>
    <div class="card-body">
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>Category:</strong> {{ $product->subcategory->category->name }}</p>
        <p><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
        <p><strong>Status:</strong> {{ $product->status ? 'Active' : 'Inactive' }}</p>
        <p><strong>Favourite:</strong> {{ $product->is_favourite ? 'Yes' : 'No' }}</p>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="200">
        @endif
    </div>
    <a href="{{route('products.index')}}" class="btn btn-primary">Back Home</a>
</div>
@endsection
