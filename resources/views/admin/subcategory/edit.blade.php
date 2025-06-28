
 @extends('admin.Layouts.Main')
 @section('content') 
 <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Category Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   @method("PUT")
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}" {{$cat->id == $subcategory->category_id ? 'selected': ''}}>{{old('name',$cat->name)}}</option>
                          @endforeach

                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="subcategoryname" class="form-label">SubCategory Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="subcategory_name" name="name"
                        value="{{ old('name', $subcategory->name) }}"

                        />
                       
                      </div>
                     
                     
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->
                
@endsection
