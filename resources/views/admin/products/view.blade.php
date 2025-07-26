@extends('admin.Layouts.Main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $product->name }}</h3>
    </div>
    <div class="card-body">
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>Category:</strong> {{ $product->subcategory->category->name }}</p>
        <p><strong>Sub Category:</strong> {{ $product->subcategory->name }}</p>
        <p><strong>Childcategory:</strong> {{ $product->childcategory_id? $product->childcategory->name : 'Nil' }}</p>
        @if($product->brand)
        <p><strong>Brand:</strong>{{$product->brand->name}}</p>
        @else
        <P><strong>Brand:</strong>Nil</P>
        @endif
        <p><strong>Status:</strong> {{ $product->status ? 'Active' : 'Inactive' }}</p>
        <p><strong>Favourite:</strong> {{ $product->is_favourite ? 'Yes' : 'No' }}</p>
<!--     
        <table class="table">
            <thead>
                <tr>
                <th>Colours</th>
                <th>Size</th>
                </tr>
            </thead>
            <tbody class="table">
                 @foreach($product->variants as $variant)
                <tr>
                <td>{{$variant->colour->name}}</td>
                <td>{{$variant->size->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table> -->

        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="200">
        @endif
    </div>
    <a href="{{route('products.index')}}" class="btn btn-primary">Back Home</a>
</div>
@endsection
