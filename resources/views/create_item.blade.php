@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Item</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Item</i>
                          
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
    <!-- <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('item.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Item</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a></div>
            <div class="breadcrumb-item">Create Item</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="post" id="additem"
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

                            @if(session('error') !== null)

                                @foreach(session('error') as $v)
                                   @foreach($v as $e)

                                   <div class="errorWrap"><strong>ERROR</strong>:  {{ $e }} </div>

                                   <!-- <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div> -->
                                   @endforeach

                                @endforeach
                            @endif
                            <!-- @if(session('success') !== null)
                                <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error') !== null)

                                @foreach(session('error') as $v)
                                   @foreach($v as $e)
                                   <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div>
                                   @endforeach

                                @endforeach
                            @endif -->
                            <div class="form-group row">
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Title</label>
                                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Code</label>
                                                        <input type="text" name="item_code" value="{{ old('item_code') }}" class="form-control" required>
                                                        </div>


                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Desc</label>
                                                        <input name="item_desc" value="{{ old('item_desc') }}" class="summernote-simple form-control" required>
                                          
                                                        </div>



                                                          


                                                        
                                                                   <!-- Modal large-->
                   
                                                </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="vendor_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor['id'] }}" {{ (old("vendor_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
                                        @endforeach
                                    </select>
               
                                                        </div>



             <!-- Modal large-->
             <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>
                                      

                                                    <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Category Desc</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="category_id" id="category" placeholder="Category" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{ $categorie['id'] }}" {{ (old("category_id") == $categorie['id'] ? "selected":"") }}>{{ $categorie['title'] }}</option>
                                        @endforeach
                                       
                                    </select>
               
                                                        </div>
                                                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal1" style="margin-top: 30px;height:40px">+</button>

                                                        <div class="col-sm-3">
                                                            <label class="col-form-label text-md-right ">Sub Category</label>
                                                            <select  class="js-example-basic-single col-sm-12" name="sub_category_id" id="sub_category" placeholder="Sub Category" required class="form-control selectric" required>
                                                                <option value="">Select</option>
                                                                @foreach($subcategories as $subcategory)
                                                                    <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['title'] }}</option>
                                                                @endforeach
                                                            </select>
                                    
                                                            </div>
                                                            <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal1" style="margin-top: 30px;height:40px">+</button>

                                         
                                                           


                                                       
                                                    </div>



                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Min Order Quantity</label>
                                                        <input type="number" name="min_order_quantity" value="{{ old('min_order_quantity') }}" class="summernote-simple form-control" >
                                          
                                                        </div>
                                                    <div class="col-sm-4">
    <label class="col-form-label text-md-right ">Min Order Amount</label>
    <input type="number" step="any" name="min_order_amount" value="{{ old('min_order_amount') }}" class="summernote-simple form-control">

    </div>

   
    <div class="col-sm-4">
    <label class="col-form-label text-md-right ">Max Order Quantity</label>
    <input type="number"  name="max_order_quantity" value="{{ old('max_order_quantity') }}" class="summernote-simple form-control">

    </div>

  


   
</div>


<div class="form-group row">
<div class="col-sm-4">
    <label class="col-form-label text-md-right ">Max Order Amount</label>
    <input type="number" step="any" name="max_order_amount" value="{{ old('max_order_amount') }}" class="summernote-simple form-control">

    </div>

<div class="col-sm-4">
<label class="col-form-label text-md-right ">Discount Percentage</label>
<input type="number"  name="discount_percentage" value="{{ old('discount_percentage') }}" class="summernote-simple form-control">

</div>


<div class="col-sm-4">
<label class="col-form-label text-md-right ">Discount Amount</label>
<input step="any" type="number"  name="discount_amount" value="{{ old('discount_amount') }}" class="summernote-simple form-control">

</div>





</div>


<div class="form-group row">
<div class="col-sm-4">
<label class="col-form-label text-md-right ">Quantity</label>
<input type="number"  name="quantity" value="{{ old('quantity') }}" class="summernote-simple form-control">

</div>
<div class="col-sm-4">
<label class="col-form-label text-md-right ">Threshold</label>
<input type="number"  name="threshold" value="{{ old('threshold') }}" class="summernote-simple form-control">

</div>


<div class="col-sm-4">
<label class="col-form-label text-md-right ">Mrp Amount</label>
<input step="any" type="number"  name="MRP" value="{{ old('MRP') }}" class="summernote-simple form-control">

</div>





</div>





                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
<label class="col-form-label text-md-right ">Selling Price</label>
<input type="number"  step="any" name="selling_price" value="{{ old('selling_price') }}" class="summernote-simple form-control">

</div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Desc</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="supplier_id" id="" placeholder="Supplier" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($supplier as $suppliers)
                                        <option value="{{ $suppliers['id'] }}" {{ (old("supplier_id") == $suppliers['id'] ? "selected":"") }}>{{ $suppliers['supplier_name'] }}</option>
                                        @endforeach
                                       
                                    </select>
               
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Name</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="vendor_store_id" id="" placeholder="vendor store" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($vendorstore as $vendorstores)
                                        <option value="{{ $vendorstores['id'] }}" {{ (old("vendor_store_id") == $vendorstores['id'] ? "selected":"") }}>{{ $vendorstores['vendor_store_name'] }}</option>
                                        @endforeach
                                       
                                    </select>
               
                                                        </div>
                                                          

                    
                                                      
                              
                                                        


                                                    
                                                    </div>


                                                    <div class="form-group row">

                                                    <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Item Image Picture</label>
                                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="status" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}"  {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                       
                                    </select>
               
                                                        </div>
                                                    </div>



<!-- 



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Code</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="item_code" value="{{ old('item_code') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="item_desc" class="summernote-simple form-control" required>{{ old('item_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="sub_category_id" id="sub_category_id" placeholder="Sub Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Image
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
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="vendor_store_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor['id'] }}" {{ (old("vendor_store_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Item</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="default-Modal1" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Add Product Sub Category</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="{{ route('product_sub_categories.store') }}" method="post" id="addprosubcat"
                            enctype="multipart/form-data">
                            @csrf
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Category</label>
                                                        <select  class=" col-sm-12" name="category_id" id="category_id" placeholder="Category" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}" {{ (old("category_id") == $category['id'] ? "selected":"") }}>{{ $category['category_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Sub Category Short Code</label>
                                                        <input type="text" name="sub_category_short_code" value="{{ old('sub_category_short_code') }}" class="form-control" required>
                                                        </div>


                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <div class="col-sm-4 offset-1">
                                                                            <label class="col-form-label text-md-right ">Sub Category Desc</label>
                                                        <input type="text" name="sub_category_desc" value="{{ old('sub_category_desc') }}" class="summernote-simple form-control" required>
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Sub Category Image Picture</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                                                                            </div>

                                                                            <div class="form-group row">

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class=" col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                      
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                          
                                                        </div>
                                                        <div class="col-sm-4 offset-1"></div>    
                                         
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




                                                                <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Add Vendor </h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="{{ route('vendors.store') }}" method="post" id="addvendor"
                            enctype="multipart/form-data">
                            @csrf
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" class="form-control" required>
                                                        </div>

                                                      
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Desc</label>
                                                        <textarea name="vendor_desc" class="summernote-simple form-control" required>{{ old('vendor_desc') }}</textarea>
                                                        </div>
                                                      


                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <div class="col-sm-4 offset-1">
                                                                            <label class="col-form-label text-md-right ">Vendor Category</label>
                                                        <select  class=" col-sm-12" name="vendor_category_id" id="vendor_category_id" placeholder="Vendor Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($vendorcategories as $vendorcategory)
                                            <option value="{{ $vendorcategory['id'] }}" {{ (old("vendor_category_id") == $vendorcategory['id'] ? "selected":"") }}>{{ $vendorcategory['vendor_cat_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Email</label>
                                                        <input type="email" name="vendor_email" value="{{ old('vendor_email') }}" class="form-control" required>
                                                        </div>
                                                                            </div>

                                                                            <div class="form-group row">

                                                                            <div class="col-sm-4 offset-1">
                                                                            <label class="col-form-label text-md-right ">Vendor Address</label>
                                                        <textarea name="vendor_address" class="summernote-simple form-control" required>{{ old('vendor_address') }}</textarea>
                                                        </div>


                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Contact</label>
                                                        <input type="number" name="vendor_contact" value="{{ old('vendor_contact') }}" class="form-control" required>
                                          
                                                        </div>
                                                        <div class="col-sm-4 offset-1"></div>    
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Image Picture</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class=" col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                       
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>
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
    </div>
</div>
@endsection


<script type="text/javascript" src="{{ asset('modules/upload-preview/assets/js/jquery-2.0.3.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>





<script>
//  $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });
// $(document).ready(function(){
//     $('#category').on('change', function () {
//         var catID = $(this).val();
//    alert(catID);
//     if (catID) {
        
//                 $.ajax({

//                     headers: {
        
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//         'Content-Type':'application/json',
//         'Accept' : 'application/vnd.api.v1+json',
//     }, 
                   
//                     url: 'http://ecommerce-api.hridham.com/api/member/prodCat/'+catID+'?include=SubCategories',
//                     // headers: {'X-CSRF-TOKEN': $('form[name="csrf-token"]').attr('content')},                    dataType: "json",
       
//                     method: 'GET',
//                     dataType: "json",
//                     //  data: {catID: catID},
//                     //data: 'wo_recipe_id=' + wor,
//                     success: function(data){
//                     console.log('succes: '+data);
    
//                         // if (data.status === 'ok') {
                           
//                         //     // $('#prp').val(data.result.recipe_percentage);
//                         //     $('#sub_category').val(data.result.sub_category_desc);
//                         // } else {
//                         //     // $('#prp').val('');
//                         //     $('#sub_category').val('');
//                         // }
//                     }
//                 });

//             } 
//     });
// });




            $(document).ready(function () {
             
                $('#category').on('change',function(e) {
                 
                 var cat_id = $(this).val();

                 alert(cat_id);

    //              $.ajaxSetup({
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //     'Content-Type':'application/json',
    //     'Accept' : 'application/vnd.api.v1+json'
    // });

                 $.ajax({
                    
                    headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Content-Type':'application/json',
        'Accept' : 'application/vnd.api.v1+json' },
                       url:"{{ url('getprodSubcat')}}" + "/" + cat_id,
                   
                       type:"GET",
                   
                        // data: {
                        //   id : cat_id
                        // },

                       crossDomain:true,

                       success:function (responsedata) {


                        // var data = JSON.parse(responsedata);
                        // console.log(responsedata.SubCategories.data);

                        var subcategories = responsedata.SubCategories.data;

                        $('#sub_category').empty();
                        $('#sub_category').append('<option value="">Select</option>');

                        $.each(subcategories,function(index,subcategory){
                            // alert(subcategory.id);
                            $('#sub_category').append('<option value="'+subcategory.id+'{{ (old("sub_category_id") =='. subcategory.id '? "selected":"") }}">'+subcategory.sub_category_desc +'</option>');
                        })

                       }
                   })


                   





                });

            });
</script>

<!-- sd -->

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
</script>



