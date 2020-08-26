
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Vendor</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Edit Vendor</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}">Vendors</a>
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
                        


                        <form class="dropzone" action="{{route('vendors.update',['vendor'=>$vendors['id']]) }}" method="post" id="editprosubcat"
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

                            @if(session('error') !== null)

                              

                                   <div class="errorWrap">
                                   {{ session('error') }}
                                        </div>

                                 
                              
                            @endif

                            <!-- @if(session('success') !== null)
                                <div class='alert alert-green'>
                                    {{ session('success') }}
                                </div>
                            @endif
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
                       
                  
                        @endif -->
                        <div class="form-group row">

                                                  
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text" id="vendor_name" name="vendor_name" value="{{ old('vendor_name',$vendors['vendor_name']) }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Click below to edit images</label><br>
                                                            <a href="{{ url('vendors/'.$vendors['id'].'/edit/assets') }}" class="btn btn-blue">Edit Image</a>
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="vendor_category_id" id="" placeholder="Category" required class="form-control selectric" required>
                                                            <option value="">Select</option>
                                                            @foreach($vendorcat as $vendorcategories)
                                                                <option value="{{  $vendorcategories['id'] }}" {{ ($vendors['vendor_category_id'] == $vendorcategories['id']) ? "selected":(old("vendor_category_id") ==  $vendorcategories['id'] ? "selected":"") }}>{{ $vendorcategories['vendor_cat_desc'] }}</option>
                                                            @endforeach
                                                        </select>
                                        
                                                        </div>
                                                                                               
                                                    </div>

                                                    <div class="form-group row">

                                                  
<div class="col-sm-4">
<label class="col-form-label text-md-right ">Vendor Desc</label>
<input type="text" id="vendor_desc" name="vendor_desc" value="{{ old('vendor_desc',$vendors['vendor_desc']) }}" class="form-control" required>
</div>
<div class="col-sm-4">
<label class="col-form-label text-md-right ">Vendor Address</label>
<input type="text" id="vendor_address" name="vendor_address" value="{{ old('vendor_address',$vendors['vendor_address']) }}" class="form-control" required>
</div>

<div class="col-sm-4">
<label class="col-form-label text-md-right ">Vendor Contact</label>
<input type="number" id="vendor_contact" name="vendor_contact" value="{{ old('vendor_contact',$vendors['vendor_contact']) }}" class="form-control" required>
</div>
                                       
</div>

<div class="form-group row">

                                                  
<div class="col-sm-4">
<label class="col-form-label text-md-right ">Vendor E-mail</label>
<input type="text" id="vendor_email" name="vendor_email" value="{{ old('vendor_email',$vendors['vendor_email']) }}" class="form-control" required>
</div>

<div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                                            <option value="">Select</option>
                                                            @foreach($statuses as $status)
                                                                <option value="{{ $status['id'] }}" {{ ($vendors['status_id'] == $status['id']) ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
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
                                    <a href="{{ url('vendor_list') }}"
                                    class=" d-inline text-center btn btn-blue back" ><i
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

