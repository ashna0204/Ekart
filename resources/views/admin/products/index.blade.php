@extends('admin.Layouts.Main')
@section('content')

<button class="btn btn-primary m-2" onclick="window.location.href='{{route('products.create')}}'">Add Product</button>
<div class="row">
              <div >
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Products</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th >Sl.No</th>
                          <th>Product</th>
                          <th>Subcategory</th>
                          <!-- <th>Category</th>
                          <th>Sub Category</th> -->
                          <th>Price</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Favourite</th>
                          <th style="width: 250px; text-align: center;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr class="align-middle">
                          <td>{{$loop->iteration}}</td>
                         <td>{{$product->name}}</td>
                         <td>{{$product->subcategory->name}}</td>
                         <!-- <td>{{$product->subcategory->category->name}}</td>
                         <td>{{$product->subcategory->name}}</td> -->
                         <td>{{$product->price}}</td>
                         <td>
                          @if($product->image)
                          <img src="{{asset('storage/' .$product->image)}}" width=100 />
                          @else
                          No image
                          @endif
                         </td>
                         <td>
                          <span class="badge {{$product->status ? 'bg-success' : 'bg-secondary'}}">{{$product->status_name}}
                          </span>
                          </td>
                          <td>
                            <span class="badge {{$product->is_favourite? 'bg-warning' : 'bg-light text-dark'}}">
                              {{$product->is_favourite_name}}
                            </span>
                          </td>
                          <td>

                          <a href="{{route('products.edit',$product->id)}}" class="btn btn-secondary">Edit</a>
                          <a href="{{route('products.show',$product->id)}}" class="btn btn-primary">View</a>
                          <form action="{{route('products.delete',$product->id)}}" method="POST" style="display:inline;" >
                            @csrf
                            @method("DELETE")
                          <button class="btn btn-danger">Delete</button>
                          </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
</div>
</div>



@endsection