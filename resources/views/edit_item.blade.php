
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Item</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Edit Item</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">




<section class="section" >
    
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        



                        <form class="dropzone" action="{{route('items.update',['item'=>$item['id']]) }}" method="post" id="editprosubcat"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @if(session('success') !== null)
                            <div class="succWrap">
                            {{ session('success') }}
                            </div>
                                <!-- <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div> -->
                            @endif

                    
                            <!-- @if(session('success') !== null)
                                <div class='alert alert-green'>
                                    {{ session('success') }}
                                </div>
                            @endif -->
                            @if(session('error') !== null)

                            {{-- @foreach(session('error') as $v)
                               @foreach($v as $e)
                               <div class='alert alert-red'>
                                   {{ $e }}
                                </div>
                               @endforeach

                            @endforeach --}}


                       
                            <div class='alert alert-red'>
                                {{ session('error') }}
                             </div>
                       
                  
                        @endif

                        <div class="form-group row">

                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Title</label>
                                                        <input type="text" name="title" value="{{ old('title',$item['title']) }}" class="form-control" required>
                                                        </div>
                        
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Code</label>
                                                        <input type="text" name="item_code" value="{{ old('item_code',$item['item_code']) }}" class="form-control" required>
                                                        </div>


                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Desc</label>
                                                        <input name="item_desc" value="{{ old('item_desc',$item['item_desc']) }}" class="summernote-simple form-control" required>
                                          
                                                        </div>


                                                       
                                                                   <!-- Modal large-->
                   
                                                </div>
                                                <div class="form-group row">

                                                <div class="col-sm-4">
<label class="col-form-label text-md-right ">Vendor Name</label>
<select  class="js-example-basic-single col-sm-12"  name="vendor_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
<option value="">Select</option>
@foreach($vendors as $vendor)
<!-- <option value="{{ $vendor['id'] }}" {{ (old("vendor_store_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option> -->
<option value="{{ $vendor['id'] }}" {{ ( $item['vendor_id'] == $vendor['id']) ? "selected":(old("vendor_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
@endforeach
</select>

</div>


                                                <div class="col-sm-4">
    <label class="col-form-label text-md-right "> Category</label>
    <select  class="js-example-basic-single col-sm-12" name="category_id" id="category_id" placeholder=" Category" required class="form-control selectric" required>
        <option value="">Select</option>
        @foreach($prodCat as $category)
            {{-- <!-- <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option> --> --}}
            <option value="{{ $category['id'] }}" {{ ( $item['category_id'] == $category['id']) ? "selected":(old("category_id") == $category['id'] ? "selected":"") }}>{{ $category['category_desc'] }}</option>
            @endforeach
    </select>

    </div>

                                                <div class="col-sm-4">
    <label class="col-form-label text-md-right ">Sub Category</label>
    <select  class="js-example-basic-single col-sm-12" name="sub_category_id" id="sub_category_id" placeholder="Sub Category" required class="form-control selectric" required>
        <option value="">Select</option>
        @foreach($prodSubCat as $subcategory)
            {{-- <!-- <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option> --> --}}
            <option value="{{ $subcategory['id'] }}" {{ ( $item['sub_category_id'] == $subcategory['id']) ? "selected":(old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option>
            @endforeach
    </select>

    </div>
                                         
                                                  


                                                                   <!-- Modal large-->
                   
                                                </div>


                                                <div class="form-group row">

                                                <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Min Order Quantity</label>
                                                        <input type="number" name="min_order_quantity" value="{{ old('min_order_quantity',$item['min_order_quantity']) }}" class="summernote-simple form-control" required>
                                          
                                                        </div>

                                                <div class="col-sm-4">
    <label class="col-form-label text-md-right ">Min Order Amount</label>
    <input type="number" step="any" name="min_order_amount" value="{{ old('min_order_amount',$item['min_order_amount']) }}" class="summernote-simple form-control" required>

    </div>

    <div class="col-sm-4">
    <label class="col-form-label text-md-right ">Max Order Quantity</label>
    <input type="number"  name="max_order_quantity" value="{{ old('max_order_quantity',$item['max_order_quantity']) }}" class="summernote-simple form-control" required>

    </div>
                                         
  
                                                                   <!-- Modal large-->
                   
                                                </div>


                                                <div class="form-group row">
                                                <div class="col-sm-4">
    <label class="col-form-label text-md-right ">Max Order Amount</label>
    <input type="number" step="any" name="max_order_amount" value="{{ old('max_order_amount',$item['max_order_amount']) }}" class="summernote-simple form-control" required>

    </div>



                                                <div class="col-sm-4">
<label class="col-form-label text-md-right ">Discount Percentage</label>
<input type="number"  name="discount_percentage" value="{{ old('discount_percentage',$item['discount_percentage']) }}" class="summernote-simple form-control" required>

</div>

<div class="col-sm-4">
<label class="col-form-label text-md-right ">Discount Amount</label>
<input step="any" type="number"  name="discount_amount" value="{{ old('discount_amount',$item['discount_amount']) }}" class="summernote-simple form-control" required>

</div>
                                         

                                                                   <!-- Modal large-->
                   
                                                </div>

                                                <div class="form-group row">

                                                <div class="col-sm-4">
<label class="col-form-label text-md-right ">Quantity</label>
<input type="number"  name="quantity" value="{{ old('quantity',$item['quantity']) }}" class="summernote-simple form-control" required>

</div>

                                                <div class="col-sm-4">
<label class="col-form-label text-md-right ">Threshold</label>
<input type="number"  name="threshold" value="{{ old('threshold',$item['threshold']) }}" class="summernote-simple form-control" required>

</div>

<div class="col-sm-4">
<label class="col-form-label text-md-right ">Mrp Amount</label>
<input step="any" type="number"  name="MRP" value="{{ old('MRP',$item['MRP']) }}" class="summernote-simple form-control" required>

</div>
                                         

                                                                   <!-- Modal large-->
                   
                                                </div>






                                                <div class="form-group row">
                                                <div class="col-sm-4">
<label class="col-form-label text-md-right ">Selling Price</label>
<input type="number"  step="any" name="selling_price" value="{{ old('selling_price',$item['selling_price']) }}" class="summernote-simple form-control" required>

</div>



                                                <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Click below to edit images</label><br>
                                                            <a href="{{ url('items/'.$item['id'].'/edit/assets') }}" class="btn btn-blue">Edit Image</a>
                                                        </div>



                                                <div class="col-sm-4">
    <label class="col-form-label text-md-right ">Suppliers</label>
    <select  class="js-example-basic-single col-sm-12" name="supplier_id" id="supplier_id" placeholder="Suppliers" required class="form-control selectric" required>
        <option value="">Select</option>
        @foreach($suppliers as $supp)
            {{-- <!-- <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option> --> --}}
            <option value="{{ $supp['id'] }}" {{ ( $item['supplier_id'] == $supp['id']) ? "selected":(old("supplier_id") == $supp['id'] ? "selected":"") }}>{{ $supp['supplier_name'] }}</option>
            @endforeach
    </select>

    </div>


   

    <!-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal1" style="margin-top: 30px;height:40px">+</button> -->



</div>


<div class="form-group row">

<div class="col-sm-4">
    <label class="col-form-label text-md-right ">Vendor Stored Name</label>
    <select  class="js-example-basic-single col-sm-12" name="vendor_store_id" id="" placeholder="Suppliers" required class="form-control selectric" required>
        <option value="">Select</option>
        @foreach($vendorStore as $vendorstores)
            {{-- <!-- <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option> --> --}}
            <option value="{{ $vendorstores['id'] }}" {{ ( $item['vendor_store_id'] == $vendorstores['id']) ? "selected":(old("vendor_store_id") == $vendorstores['id'] ? "selected":"") }}>{{ $vendorstores['vendor_store_name'] }}</option>
            @endforeach
    </select>

    </div>

<div class="col-sm-4">
<label class="col-form-label text-md-right ">Status</label>
<select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
<option value="">Select</option>
@foreach($statuses as $status)
<!-- <option value="{{ $status['id'] }}"  {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
<option value="{{ $status['id'] }}" {{ ($item['status_id'] == $status['id']) ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
@endforeach

</select>

</div>
</div>





                   
                                                    

                                          

                                                   
                                                  

<!-- 
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="category_short_code">Category Short Code</label>
                                <div class="col-sm-12 col-md-7">
                                    {{-- <input type="text" id="category_short_code" name="category_short_code" value="{{ old('category_short_code') }}" class="form-control" required> --}}
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    {{-- <textarea name="category_desc" class="summernote-simple form-control" required>{{ old('category_desc') }}</textarea> --}}
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Image
                                    Picture</label>
                                <div class="col-sm-12 col-md-7">

                                        <div class="gallery"></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file[]" id="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>

                                          </div>

                                </div>


                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        {{-- @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div> -->
                            

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('item_list') }}"
                                    class=" d-inline text-center btn btn-blue font1 back" ><i
                                        class="icofont icofont-arrow-left" ></i>Back&nbsp;&nbsp;</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function (e) {
        $('#formsubmit').on('click', function () {

        });
		$('#upload').on('click', function () {
			var form_data = new FormData();
			var ins = document.getElementById('filer_input').files.length;
			for (var x = 0; x < ins; x++) {
				form_data.append("file[]", document.getElementById('filer_input').files[x]);
            }
            // alert(form_data);
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
			$.ajax({
                url: "http://ecommerce-api.hridham.com/api/ProdCat/1",
                headers:'Authorization: Bearer ' // point to server-side PHP script 
                dataType: 'json', // what to expect back from the PHP script
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				cache: false,
				contentType: false,
				processData: false,
				data: {file:form_data},
				type: 'patch',
				success: function (response) {
                   
					$('#msg').html(response); // display success response from the PHP script
				},
				error: function (response) {
                    // alert(response.message);
               
                    console.log(response);
					$('#msg').html(response); // display error response from the PHP script
				}
			});
		});
    });
    

    $(document).ready(function(){
    $("#formsubmit").click(function(){        
        $("#myForm").submit(); // Submit the form
    });
});


</script>

