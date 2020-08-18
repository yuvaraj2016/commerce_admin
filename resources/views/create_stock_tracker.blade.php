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
                            @endif

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
                                                                            <form action="/action_page.php">
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Code</label>
                                                        <input type="text"  value="    " class="form-control" >
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Desc</label>
                                                        <input type="text"  value=" " class="form-control" >
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Sub Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text"  value="    " class="form-control" >
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
                                                                            <form action="/action_page.php">
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                       <select>
                                                           <option>select</option>
                                                       </select>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Variant Code</label>
                                                        <input type="text"  value=" " class="form-control" >
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Variant Desc</label>
                                                        <input type="text"  value=" " class="form-control" >
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                    <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Variant Image Picture</label>
                                                        <input type="file" class="custom-file-input" name="file[]" id="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
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
                                                                                <h4 class="modal-title">Add Vendor Category</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="/action_page.php">
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text"  value="    " class="form-control" >
                                                        </div>

                                                      
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="vendor_category_id" id="vendor_category_id" placeholder="Vendor Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                     
                                    </select>
                                                        </div>
                                                      


                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Desc</label>
                                                        <input type="text"  value="    " class="form-control" >
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Image Picture</label>
                                                        <input type="file" class="custom-file-input" name="file[]" id="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                                            </div>

                                                                            <div class="form-group row">

                                                                            <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Address</label>
                                                        <input type="text"  value="    " class="form-control" >
                                                        </div>


                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                          
                                                        </div>
                                                        <div class="col-sm-4 offset-1"></div>    
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Contact</label>
                                                        <input type="text"  value="    " class="form-control" >
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Email</label>
                                                        <input type="text"  value="    " class="form-control" >
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



