@extends('admin.Layouts.Main')
@section('content')

<button class="btn btn-primary m-2" onclick="window.location.href='{{route('categories.create')}}'">Add Category</button>
<!-- <div class="row">
  @if(session('success'))
  <div class="alert alert-success bg-success">{{session('success')}}</div>
  @endif -->
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Categories </h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">Sl.No</th>
                          <th>Category</th>
                          
                          <th >Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                       <tr class="align-middle">
                        
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                          <a href="{{route('category.edit',$category->id)}}" class="btn btn-secondary">Edit</a>
                          <form action="{{route('category.delete',$category->id)}}" method="post" style="display:inline;">
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