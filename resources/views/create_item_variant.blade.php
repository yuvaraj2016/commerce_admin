@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Item Variants</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Item Variants</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('item_variant.index') }}">Item Variants</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">




<section class="section" >
    <!-- <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('item_variant.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Item Variant</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('item_variant.index') }}">Item Variants</a></div>
            <div class="breadcrumb-item">Create Item Variant</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('item_variants.store') }}" method="post" id="additem"
                            enctype="multipart/form-data">
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
                        
                            <!-- @if(session('success') !== null)
                                <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div>
                            @endif -->
                            @if(session('error') !== null)

                                @foreach(session('error') as $v)
                                   @foreach($v as $e)
                                   <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div>
                                   @endforeach

                                @endforeach
                            @endif
                            <div class="form-group row">

                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Variant Title</label>
                                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                        <select id="tm" class="js-example-basic-single col-sm-12"  name="item_id" id="" placeholder="Item" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($items as $item)
                                            <option value="{{ $item['id'] }}" {{ (old("item_id") == $item['id'] ? "selected":"") }}>{{ $item['title'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>

                                                       
                                                                <!-- Modal large-->
                                                                <button id="btn1" type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>
                                                                               

                                                        <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Variant Code</label>
                                                        <input type="text" name="variant_code" value="{{ old('variant_code') }}" class="form-control" required>
                                          
                                                        </div>
                                                       
                                                    </div>



                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Variant Desc</label>
                                                        <input name="variant_desc" value="{{ old('variant_desc') }}" class="summernote-simple form-control" required>
               
                                                        </div>


<div class="col-sm-4">
    <label class="col-form-label text-md-right ">Item Variant Default</label>
    <select  class="js-example-basic-single col-sm-12"  name="default" id="" placeholder="default" class="form-control selectric" required>
        <option value="">Select</option>
      
        <option value="1" {{ (old("default") == "1" ? "selected":"") }}>Yes</option>
        <option value="0" {{ (old("default") == "0" ? "selected":"") }}>No</option>
        

    </select>

    </div>

<div class="col-sm-4">
    <label class="col-form-label text-md-right ">Variants Group</label>
    <select  class="js-example-basic-single col-sm-12"  name="variant_group_id" id="" placeholder="variant_group_id" required class="form-control selectric" required>
    <option value="">Select</option>
@foreach($itemvariantgroup as $group)

<option value="{{ $group['id'] }}" {{ (old("variant_group_id") == $group['id'] ? "selected":"") }}>{{ $group['title'] }}</option>


@endforeach
</select>

    </div>

  

 
</div>



<div class="form-group row">
<div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Min Order Quantity</label>
                                                        <input type="number"  name="min_order_quantity" value="{{ old('min_order_quantity') }}" step="any" class="form-control">
               
                                                        </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Min Order Amount</label>
                                                        <input type="number"  name="min_order_amount" value="{{ old('min_order_amount') }}" step="any" class="form-control">
               
                                                        </div>
                                                    
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Max Order Quantity</label>
                                                        <input type="number" name="max_order_quantity" value="{{ old('max_order_quantity') }}" step="any" class="form-control">
               
                                                        </div>
                                                     
                                                     
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Max Order Amount</label>
                                                        <input type="number" name="max_order_amount" value="{{ old('max_order_amount') }}" step="any" class="form-control">
               
                                                        </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Quantity</label>
                                                        <input type="number"  name="quantity" value="{{ old('quantity') }}" step="any" class="form-control" required>
               
                                                        </div>
                                                    
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Threshold</label>
                                                        <input type="number" name="threshold" value="{{ old('threshold') }}" step="any" class="form-control" required>
               
                                                        </div>

                                                    
                                       
                                                    </div>


                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Discount Percentage</label>
                                                        <input type="number" name="discount_percentage" value="{{ old('discount_percentage') }}" step="any" class="form-control">
               
                                                        </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Discount Amount</label>
                                                        <input type="number"  name="discount_amount" value="{{ old('discount_amount') }}" step="any" class="form-control">
               
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Suppliers</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="supplier_id" id="" placeholder="Status" required class="form-control selectric" required>
                                                        <option value="">Select</option>
                                        @foreach($suppliers as $supp)
                                        <option value="{{ $supp['id'] }}" {{ (old("supplier_id") == $supp['id'] ? "selected":"") }}>{{ $supp['supplier_desc'] }}</option>
                                           
                                        @endforeach
                                    </select>
               
                                                        </div>
                                                    
                                                       
                                                    </div>

                                                    

                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendors</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="vendor_id" id="vendor" placeholder="Vendor" required class="form-control selectric" required>
                                                        <option value="">Select</option>
                                        @foreach($vendors as $vend)
                                        <option value="{{ $vend['id'] }}" {{ (old("vendor_id") == $vend['id'] ? "selected":"") }}>{{ $vend['vendor_name'] }}</option>
                                           
                                        @endforeach
                                    </select>
               
                                                        </div>

                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Selling Price</label>
                                                        <input type="number"  name="selling_price" value="{{ old('selling_price') }}" step="any" class="form-control" required>
                                                       
                                                        </div>
                                                     
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Mrp Price</label>
                                                        <input type="number" name="MRP" value="{{ old('MRP') }}" step="any" class="form-control" required>
               
                                                        </div>
                             
                                                    </div>



                                                    <div class="form-group row">

                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                      
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                            <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>
               
                                                        </div>
                                                    <!-- <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Variant Default</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="default" id="" placeholder="default" class="form-control selectric" required>
                                                            <option value="">Select</option>
                                                          
                                                            <option value="1" {{ (old("default") == "1" ? "selected":"") }}>Yes</option>
                                                            <option value="0" {{ (old("default") == "0" ? "selected":"") }}>No</option>
                                                            

                                                        </select>
               
                                                        </div>

                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Variants Group</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="variant_group_id" id="" placeholder="variant_group_id" required class="form-control selectric" required>
                                                        <option value="">Select</option>
                                        @foreach($itemvariantgroup as $group)
                                       
                                        <option value="{{ $group['id'] }}" {{ (old("variant_group_id") == $group['id'] ? "selected":"") }}>{{ $group['item_group_desc'] }}</option>
                                        
                                       
                                        @endforeach
                                    </select>
               
                                                        </div> -->
                                                     
                                                               <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Stores</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="vendor_store_id" id="vendor_store" placeholder="Vendor" required class="form-control selectric" required>
                                                        <option value="">Select</option>
                                        @foreach($vendorstores as $variantst)
                                        <option value="{{ $variantst['id'] }}" {{ (old("vendor_store_id") == $variantst['id'] ? "selected":"") }}>{{ $variantst['vendor_store_name'] }}</option>
                                           
                                        @endforeach
                                    </select>

                                                        <div id="response" style="position: absolute;
                                                        top: 10%;
                                                        left: 50%;
                                                        "></div>
                                
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Variant Image</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                                             
                                                     
                                                    </div>








                            <!-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="item_id" id="" placeholder="Item" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        {{-- @foreach($items as $item)
                                            <option value="{{ $item['id'] }}" {{ (old("item_id") == $item['id'] ? "selected":"") }}>{{ $item['item_desc'] }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Variant Code</label>
                                <div class="col-sm-12 col-md-7">
                                    {{-- <input type="text" name="variant_code" value="{{ old('variant_code') }}" class="form-control" required> --}}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Variant Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="variant_desc" class="summernote-simple form-control" required>{{ old('variant_desc') }}</textarea>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Variant Image
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
                                    <button type="submit" class="btn btn-primary">Create Item Variant</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- item -->

<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Add Item</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="{{ route('items.store') }}" method="post" id="additem"
                            enctype="multipart/form-data">
                            @csrf
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Code</label>
                                                        <input type="text" name="item_code" value="{{ old('item_code') }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Desc</label>
                                                        <input name="item_desc" value="{{ old('item_desc') }}" class="summernote-simple form-control" required>
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <select  class=" col-sm-12"  name="vendor_store_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor['id'] }}" {{ (old("vendor_store_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Sub Category</label>
                                                            <select  class=" col-sm-12" name="sub_category_id" id="sub_category_id" placeholder="Sub Category" required class="form-control selectric" required>
                                                                <option value="">Select</option>
                                                                @foreach($subcategories as $subcategory)
                                                                    <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option>
                                                                @endforeach
                                                            </select>
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class=" col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}"  {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                       
                                    </select>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Image Picture</label>
                                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                          
                                                        </div>
                                         
                                                    </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
                                                                            </div>
                                                                            </form> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
</section>
@endsection
{{-- <script type="text/javascript" src="{{ asset('modules/upload-preview/assets/js/jquery-2.0.3.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script  type="text/javascript">


        
$(document).ready(function() {
        $('#btn1').click(function() {
         //   alert ("ss");
            $('#tm').val('').change();
            $('#tm').prop('disabled', true);


        });
   
        $('#clear').click(function() {
           // alert ("Hi");
            $('#ic').val('');
            $('#id').val('');
            $('#vn').val(null);
            // $('#des').prop('disabled', false);
        });
    });

</script>
<script type="text/javascript">

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#file').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});



$(document).ready(function () {



    $('#vendor').on('change',function(e) {
                 
                 var vendor_id = e.target.value;

                //  alert(vendor_id);

    //              $.ajaxSetup({
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //     'Content-Type':'application/json',
    //     'Accept' : 'application/vnd.api.v1+json'
    // });
    if (vendor_id) {
                 $.ajax({
                    
                    headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Content-Type':'application/json',
        'Accept' : 'application/vnd.api.v1+json' },
                       url:"{{ url('getvendorStore')}}" + "/" + vendor_id,
                   
                       type:"GET",
                   
                        // data: {
                        //   id : cat_id
                        // },

                       crossDomain:true,
                       beforeSend: function() {
                            $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                        },

                       success:function (responsedata) {
                        $('#response').html('');

                        // var data = JSON.parse(responsedata);
                    //    alert(responsedata);

                        var vendorstores = responsedata.VendorStores.data;

                        // console.log(vendorstores);

                        $('#vendor_store').empty();
                        $('#vendor_store').append('<option value="">Select</option>');

                        $.each(vendorstores,function(index,vendorstore){
                            // alert(vendorstores.id);
                            $('#vendor_store').append('<option value="'+vendorstore.id+'{{ (old("vendor_store_id") =='. vendorstore.id '? "selected":"") }}">'+vendorstore.vendor_store_name +'</option>');
                        })

                       }
                   })


    }
    else             
    {
        
        $.ajax({
                    
                    headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Content-Type':'application/json',
        'Accept' : 'application/vnd.api.v1+json' },
                       url:"{{ url('getallVendorStore')}}",
                   
                       type:"GET",
                   
                        // data: {
                        //   id : cat_id
                        // },

                       crossDomain:true,
                       beforeSend: function() {
                            $('#response').html("<img src='{{ asset('files/assets/images/ajax-loader.gif') }}' />");
                        },

                       success:function (responsedata) {

                        $('#response').html('');
                        // var data = JSON.parse(responsedata);
                        // console.log(responsedata.SubCategories.data);

                        var vendorstores = responsedata;

                        $('#vendor_store').empty();
                        $('#vendor_store').append('<option value="">Select</option>');

                        $.each(vendorstores,function(index,vendorstore){
                       
                            $('#vendor_store').append('<option value="'+vendorstore.id+'{{ (old("vendor_store_id") =='. vendorstore.id '? "selected":"") }}">'+vendorstore.vendor_store_name +'</option>');
                        })

                       }
                   })
    }





                });



















});

</script>



