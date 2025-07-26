
 @extends('admin.Layouts.Main')
 @section('content') 
 <div class="col-md-6">
     <!--begin::Quick Example-->
     <div class="card card-primary card-outline mb-4">
     <!--begin::Header-->
      <div class="card-header"><div class="card-title">Product Form</div></div>
         <!--end::Header-->
          <!--begin::Form-->
           <form action="{{route('products.store')}}" enctype="multipart/form-data" method="POST" >
            @csrf
                   
            <!--begin::Body-->
             <div class="card-body">
                 <div class="mb-3">
                    <label for="Productname" class="form-label">Product Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="name" name="name"
                          
                        />
                  </div>

                  <div class=" mb-3">
                    <label for="subcategory" class="form-label">Sub Category </label>
                      <select class="form-control" name="subcategory_id" id="subcategory_id">
                          <option value="">Select Category</option>
                          @foreach($subcategories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>
                  </div>

                  <!-- <div class=" mb-3">
                      <label for="childcategory" class="form-label">  Child Category </label>
                        <select class="form-control" name="childcategory_id">
                          <option value="">Select Child Category</option>
                          @foreach($childcategories as $childcategory)
                          <option value="{{$childcategory->id}}">{{$childcategory->name}}</option>
                          @endforeach
                        </select>
                  </div> -->

                  <!-- child category is selected according to the subcategory id -->
                  <div class=" mb-3">
                      <label for="childcategory" class="form-label">  Child Category </label>
                        <select class="form-control" name="childcategory_id" id="childcategory">
                          <option value="">Select Child Category</option>
                          
                          <option value=""></option>
                          
                        </select>
                  </div>

                  <!-- colours -->

                  <div class="mb-3">
                    <label class="form-lable">Colours</label>
                    <div>
                      @foreach($colours as $colour)
                      <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="colours[]"
                        value="{{$colour->id}}"
                        id="colour_{{$colour->id}}">
                        <label for="colour_{{ $colour->id}}" class="form-check-label">{{ $colour->name }}</label>
                      </div>
                      @endforeach
                    </div>
                  </div>


                  <!-- sizes -->
                   <div class="mb-3 sizes-section">
                    <label class="form-label">Sizes</label>
                    <div>
                      @foreach($sizes as $size)
                      <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" name="sizes[]"
                      value="{{$size->id}}"
                      id="size_{{$size->id}}"
                      >
                      <label for="size_{{$size->id}}" class="form-check-label">{{$size->name}}</label>
                      </div>
                      @endforeach
                    </div>
                   </div>


                  <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" />
                  </div>

                  <div class=" mb-3">
                      <label for="brand" class="form-label">Brand </label>
                        <select class="form-control" name="brand_id">

                          <option value="">Select Brand</option>
                          @foreach($brands as $brand)
                          <option value="{{$brand->id}}">{{$brand->name}}</option>
                          @endforeach
                          
                        </select>
                  </div>

                  <div class=" mb-3">
                     <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image"/>
                        <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                  </div>

                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1"/>
                      <label class="status" for="status">Status</label>
                  </div>
                  
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_favourite" name="is_favourite" value="1"/>
                      <label class="form-check-label" for="is_favourite">Favourite</label>
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
 <!-- jQuery for AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/childcategory.js')}}"></script>

<script>
  $(document).ready(function(){
    $(".sizes-section").hide();
    
    $("#subcategory_id").change(function(){
      var selectedText = $("#subcategory_id option:selected").text();

      if(selectedText.includes("Womens Clothing") || selectedText.includes("Men's Clothing")|| selectedText.includes("Kids wear")){
        $(".sizes-section").show();
      }else{
        $(".sizes-section").hide();
      }
      
    })
  })
</script>
@endsection
