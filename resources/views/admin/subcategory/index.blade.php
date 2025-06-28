@extends('admin.Layouts.Main')
@section('content')

<button class="btn btn-primary m-2" onclick="window.location.href='{{route('subcategories.create')}}'">Add SubCategory</button>
<div class="row">
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">SubCategories </h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">Sl.No</th>
                          <th>Category </th>
                          <th>Subcategory </th>
                          <th  style="width: 250px; text-align: center;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($subcategories as $subcategory)
                        <tr class="align-middle">

                        <td>{{$loop->iteration}}</td>
                        <td>{{$subcategory->category->name}}</td>
                        <td>{{$subcategory->name}}</td>
                        <td>
                          <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-secondary">Edit</a>
                          <form action="{{route('subcategory.delete',$subcategory->id)}}" method="POST" style="display:inline;" >
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