
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Item Variant</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Edit Item Variant</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('item_variant.index') }}">Item Variant</a>
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
                        
                   

                    <form class="dropzone" action="{{route('item_variants.update',['item_variant'=>$itemVariants['id']]) }}" method="post" id="editprosubcat"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            @if(session('success') !== null)
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
                       
                  
                        @endif

                        <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item </label>
                                                        <select  class="js-example-basic-single col-sm-12" name="item_id" id="item_id" placeholder="Item" required class="form-control selectric" required>
        <option value="">Select</option>
        @foreach($item as $items)

            <option value="{{ $items['id'] }}" {{ ( $itemVariants['item_id'] == $items['id']) ? "selected":(old("item_id") == $items['id'] ? "selected":"") }}>{{ $items['item_desc'] }}</option>
         
            @endforeach
    </select>
                                                        </div>


                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Variant Code</label>
                                                        <input name="variant_code" value="{{ old('variant_code',$itemVariants['variant_code']) }}" class="summernote-simple form-control" required>
                                          
                                                        </div>


                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Variant Description</label>
                                                        <input name="variant_desc" value="{{ old('variant_desc',$itemVariants['variant_desc']) }}" class="summernote-simple form-control" required>
                                          
                                                        </div>
                                                       

                                                </div>



                                                <div class="form-group row">
                                                <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Click below to edit images</label><br>
                                                            <a href="{{ url('item_variants/'.$itemVariants['id'].'/edit/assets') }}" class="btn btn-blue font1">Edit Image</a>
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">MRP Price</label>
                                                        <input name="MRP" value="{{ old('MRP',$itemVariants['MRP']) }}" step="any" class="summernote-simple form-control" required>
                                          
                                                        </div>


                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Selling Prince</label>
                                                        <input name="selling_price" value="{{ old('selling_price',$itemVariants['selling_price']) }}" step="any" class="summernote-simple form-control" required>
                                          
                                                        </div>




                                                         
                                                       

                                                    
                   
                                                </div>


                                                <div class="form-group row">
                                                <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Variant Default</label>
                                                        
                                                        {{-- <input name="default" value="{{ old('default',$itemVariants['default']) }}" class="summernote-simple form-control" required> --}}
                                                        <select  class="js-example-basic-single col-sm-12"  name="default" id="" placeholder="default" class="form-control selectric" required>
                                                            <option value="">Select</option>
                                                          
                                                            <option value="1" {{ ($itemVariants['default'] == 1) ? "selected":(old("default") == 1 ? "selected":"") }}>Yes</option>
                                                            <option value="0" {{ ($itemVariants['default'] == 0) ? "selected":(old("default") == 0 ? "selected":"") }}>No</option>
                                                            

                                                        </select>
                                                        </div>

                                                <div class="col-sm-4">

                                               

<label class="col-form-label text-md-right ">Status</label>
<select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
<option value="">Select</option>
@foreach($statuses as $status)
<!-- <option value="{{ $status['id'] }}"  {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
<option value="{{ $status['id'] }}" {{ ($itemVariants['status_id'] == $status['id']) ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
@endforeach

</select>

</div>


<div class="col-sm-4">
<label class="col-form-label text-md-right ">Item Variant Group</label>
<select  class="js-example-basic-single col-sm-12" name="variant_group_id" id="" placeholder="variant_group_id" required class="form-control selectric" required>
<option value="">Select</option>
@foreach($itemvariantgroup as $variantgroup)

<option value="{{ $variantgroup['id'] }}" {{ ($itemVariants['variant_group_id'] == $variantgroup['id']) ? "selected":(old("variant_group_id") == $variantgroup['id'] ? "selected":"") }}>{{ $variantgroup['item_group_desc'] }}</option>
@endforeach

</select>

</div>


                                                </div>


                   
                                                    

                                          

                                                   
                                                  

                            

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue font1">Update </button>
                                    <a href="{{ url('item_variant_list') }}"
                                    class=" d-inline text-center btn btn-black font1 back" ><i
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

