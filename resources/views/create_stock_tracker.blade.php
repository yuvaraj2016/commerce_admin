@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}

<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Stock Tracker</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Stock Tracker</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('stock_tracker.index') }}">Stock Tracker</a>
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
            {{-- <a href="{{ route('stock_master.index') }}" class="btn btn-icon"><i --}}
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Stock Master</h1>
        <div class="section-header-breadcrumb">
            {{-- <div class="breadcrumb-item"><a href="{{ route('stock_master.index') }}">Stock tracker</a></div> --}}
            <div class="breadcrumb-item">Create Stock Master</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('stock_tracker.store') }}" method="post" id="additem"
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

                                <!-- @foreach(session('error') as $v)
                                   @foreach($v as $e) -->

                                   <div class="errorWrap">
                                   {{ session('error') }}
                                    </div>

                                   <!-- <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div> -->
                                   <!-- @endforeach

                                @endforeach -->
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
                                                        <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="item_id" id="" placeholder="Item" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($items as $item)
                                            <option value="{{ $item['id'] }}" {{ (old("item_id") == $item['id'] ? "selected":"") }}>{{ $item['item_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>


                                                                                          <!-- Modal large-->
                                                                                          <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>
                                         



                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Variants</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="variant_id" id="" placeholder="Variant" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($variants as $variant)
                                            <option value="{{ $variant['id'] }}" {{ (old("variant_id") == $variant['id'] ? "selected":"") }}>{{ $variant['variant_desc'] }}</option>
                                        @endforeach
                                    </select>
                                          
                                                        </div>



                                                                                          <!-- Modal large-->
                                                                                          <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal2" style="margin-top: 30px;height:40px">+</button>
                                           


                                                        <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Supplier Name</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="supplier_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier['id'] }}" {{ (old("supplier_id") == $supplier['id'] ? "selected":"") }}>{{ $supplier['supplier_name'] }}</option>
                                        @endforeach
                                    </select>
               
                                                        </div>

    <!-- Modal large-->
    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal3" style="margin-top: 30px;height:40px">+</button>
                                                             





                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Purchase Order Ref</label>
                                                        <input type="text" name="purchase_order_ref" value="{{ old('purchase_order_ref') }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Purchase Order Date</label>
                                                        <input type="date" name="purchase_order_date" value="{{ old('purchase_order_date') }}" class="form-control" required>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="col-form-label text-md-right ">Purchase Price</label>
                                                            <input type="number" name="purchase_price" step="any" value="{{ old('purchase_price') }}" class="form-control" required>
                                              
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Stock Quantity</label>
                                                        <input type="text" name="stock_quantity" value="{{ old('stock_quantity') }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Comments</label>
                                                        <textarea name="comments" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('comments') }}</textarea>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                    
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                            <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>
               
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
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Variants</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="variant_id" id="" placeholder="Variant" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        {{-- @foreach($variants as $variant)
                                            <option value="{{ $variant['id'] }}" {{ (old("variant_id") == $variant['id'] ? "selected":"") }}>{{ $variant['variant_desc'] }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="vendor_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        {{-- @foreach($vendors as $vendor)
                                            <option value="{{ $vendor['id'] }}" {{ (old("vendor_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Quantity</label>
                                <div class="col-sm-12 col-md-7">
                                    {{-- <input type="number" name="stock_quantity" value="{{ old('stock_quantity') }}" class="form-control" required> --}}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Threshold</label>
                                <div class="col-sm-12 col-md-7">
                                    {{-- <input type="number" name="stock_threshold" value="{{ old('stock_threshold') }}" class="form-control" required> --}}
                                </div>
                            </div>

                           <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                {{-- <div class="col-sm-12 col-md-7">
                                    <select name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                            </div> -->


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Stock Tracker</button>
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

<!-- item variant -->
<div class="modal fade" id="default-Modal2" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Add Item Variants</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="{{ route('item_variants.store') }}" method="post" id="additem"
                            enctype="multipart/form-data">
                            @csrf
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                        <select id="tm" class=" col-sm-12"  name="item_id" id="" placeholder="Item" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($items as $item)
                                            <option value="{{ $item['id'] }}" {{ (old("item_id") == $item['id'] ? "selected":"") }}>{{ $item['item_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Variant Code</label>
                                                        <input type="text" name="variant_code" value="{{ old('variant_code') }}" class="form-control" required>
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Variant Desc</label>
                                                        <input name="variant_desc" value="{{ old('variant_desc') }}" class="summernote-simple form-control" required>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Selling Price</label>
                                                        <input type="number"  name="selling_price" value="{{ old('selling_price') }}" step="any" class="form-control" required>
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                    <div class="col-sm-4 offset-1">
                                                    <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class=" col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                      
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                            <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Mrp Price</label>
                                                        <input type="number" name="MRP" value="{{ old('MRP') }}" step="any" class="form-control" required>
                                          
                                                        </div>
                                         
                                                    </div>


                                                    <div class="form-group row">
                                                    <div class="col-sm-4 offset-1">
                                                    <label class="col-form-label text-md-right ">Item Variant Default</label>
                                                        <select  class=" col-sm-12"  name="default" id="" placeholder="default" class="form-control selectric" required>
                                                            <option value="">Select</option>
                                                          
                                                            <option value="1" {{ (old("default") == "1" ? "selected":"") }}>Yes</option>
                                                            <option value="0" {{ (old("default") == "0" ? "selected":"") }}>No</option>
                                                            

                                                        </select>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Variants Group</label>
                                                        <select  class=" col-sm-12"  name="variant_group_id" id="" placeholder="variant_group_id" required class="form-control selectric" required>
                                                        <option value="">Select</option>
                                        @foreach($itemvariantgroup as $group)
                                       
                                        <option value="{{ $group['id'] }}" {{ (old("variant_group_id") == $group['id'] ? "selected":"") }}>{{ $group['item_group_desc'] }}</option>
                                        
                                        <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>
                                          
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4 offset-1">
                                                    <label class="col-form-label text-md-right ">Item Variant Image</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                       
                                          
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


<!-- vendor -->
<div class="modal fade" id="default-Modal3" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Add suppliers</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="{{ route('suppliers.store') }}" method="post" id="addsupplier"
                            enctype="multipart/form-data">
                            @csrf
                                                                            <div class="form-group row">
                                                                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Name</label>
                                                        <input type="text" name="supplier_name" value="{{ old('supplier_name') }}" class="form-control" required>
                                                        </div>
                                                       
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Desc</label>
                                                        <textarea name="supplier_desc" class="summernote-simple form-control" required>{{ old('supplier_desc') }}</textarea>
                                                        </div>
                                                       
                                                       
                                                       
                                                       
                                                       
                                                        <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Supplier Category</label>
                                                        <select  class=" col-sm-12" name="supplier_category_id" id="supplier_category_id" placeholder="Supplier Category" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                       

                                        @foreach($suppliercategories as $suppliercategory)
                                            <option value="{{ $suppliercategory['id'] }}" {{ (old("supplier_category_id") == $suppliercategory['id'] ? "selected":"") }}>{{ $suppliercategory['supplier_cat_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                      


                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Address</label>
                                                        <textarea name="supplier_address" class="summernote-simple form-control" required>{{ old('supplier_address') }}</textarea>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Contact</label>
                                                        <input type="number" name="supplier_contact" value="{{ old('supplier_contact') }}" class="form-control" required>
               
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Email</label>
                                                        <input type="email" name="supplier_email" value="{{ old('supplier_email') }}" class="form-control" required>
                                                        </div>
                                                                            </div>

                                                                            <div class="form-group row">

                                                                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Image Picture</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class=" col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>

                                                        </div>
                                                        <div class="col-sm-4">
                                                        
               
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



