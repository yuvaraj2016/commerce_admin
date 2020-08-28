
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Purchase Tracker</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Edit Purchase Tracker</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('stock_tracker.index') }}">Purchase Tracker</a>
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
                        



                        <form class="dropzone" action="{{route('stock_tracker.update',['stock_tracker'=>$stock_tracker['id']]) }}" method="post" id="editstocktracker"
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
                                <label class="col-form-label text-md-right ">Item</label>
                                <select  class="js-example-basic-single col-sm-12" name="item_id" id="" placeholder="Item" required class="form-control selectric" required>
                                    <option value="">Select</option>


                                    @foreach($items as $item)
                                        
                                        <option value="{{ $item['id'] }}" {{ ($stock_tracker['item_id'] == $item['id']) ? "selected":(old("item_id") == $item['id'] ? "selected":"") }}>{{ $item['item_desc'] }}</option>
                                    @endforeach
                                </select>
                                </div>


                                                                  <!-- Modal large-->
                                <!-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button> -->
                 



                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Variants</label>
                                                    <select  class="js-example-basic-single col-sm-12" name="variant_id" id="" placeholder="Variant" required class="form-control selectric" required>
                                    <option value="">Select</option>

                                    @foreach($variants as $variant)
                                        
                                        <option value="{{ $variant['id'] }}" {{ ($stock_tracker['variant_id'] == $variant['id']) ? "selected":(old("variant_id") == $variant['id'] ? "selected":"") }}>{{ $variant['variant_desc'] }}</option>
                                    @endforeach
                                </select>
                  
                                </div>



                                                                  <!-- Modal large-->
                               <!-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal2" style="margin-top: 30px;height:40px">+</button> -->
                   


                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Supplier Name</label>
                                <select  class="js-example-basic-single col-sm-12" name="supplier_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                    <option value="">Select</option>

                                    @foreach($suppliers as $supplier)
                                        
                                        <option value="{{ $supplier['id'] }}" {{ ($stock_tracker['supplier_id'] == $supplier['id']) ? "selected":(old("supplier_id") == $supplier['id'] ? "selected":"") }}>{{ $supplier['supplier_name'] }}</option>
                                    @endforeach
                                </select>

                                </div>
<!-- Modal large-->
                                <!-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal3" style="margin-top: 30px;height:40px">+</button> -->
                                 
                            </div>


                            <div class="form-group row">
                            <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Vendor Name</label>
                                <select  class="js-example-basic-single col-sm-12" name="vendor_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                    <option value="">Select</option>

                                    @foreach($vendor as $vendors)
                                        
                                        <option value="{{ $vendors['id'] }}" {{ ($stock_tracker['vendor_id'] == $vendors['id']) ? "selected":(old("vendor_id") == $vendors['id'] ? "selected":"") }}>{{ $vendors['vendor_name'] }}</option>
                                    @endforeach
                                </select>

                                </div>
                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Vendor Stored Name</label>
                                <select  class="js-example-basic-single col-sm-12" name="vendor_store_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                    <option value="">Select</option>

                                    @foreach($vendorstore as $vendorst)
                                        
                                        <option value="{{ $vendorst['id'] }}" {{ ($stock_tracker['vendor_store_id'] == $vendorst['id']) ? "selected":(old("vendor_store_id") == $vendorst['id'] ? "selected":"") }}>{{ $vendorst['vendor_store_name'] }}</option>
                                    @endforeach
                                </select>

                                </div>
                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Purchase Price</label>
                               
                                <input type="number" name="purchase_price" step="any" value="{{ old('purchase_price',$stock_tracker['purchase_price']) }}" class="form-control" required>
                  
                                </div>                        
                            </div>








                            <div class="form-group row">
                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Purchase Order Ref</label>
                                <input type="text" name="purchase_order_ref" value="{{ old('purchase_order_ref',$stock_tracker['purchase_order_ref']) }}" class="form-control" required>
                               
                                </div>
                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Purchase Order Date</label>
                                <input type="date" name="purchase_order_date" value="{{ old('purchase_order_date',$stock_tracker['purchase_order_date']) }}" class="form-control" required>
                                               
                                </div>
                                <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Stock Quantity</label>
                                                        <input type="text" name="stock_quantity" value="{{ old('stock_quantity',$stock_tracker['stock_quantity']) }}" class="form-control" required>
                                                        </div>
                                <!-- <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Purchase Price</label>
                               
                                <input type="number" name="purchase_price" step="any" value="{{ old('purchase_price',$stock_tracker['purchase_price']) }}" class="form-control" required>
                  
                                </div>                         -->
                            </div>

<div class="form-group row">



                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Comments</label>
                                                        <textarea name="comments" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('comments',$stock_tracker['comments']) }}</textarea>
                                          
                                                        </div>




                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right ">Status</label>
                                    <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ ($stock_tracker['status_id'] == $status['id']) ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                      
                                    </div>
                            </div>
                            
                        </div>
                                                    
                   

                            

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('stock_tracker_list') }}"
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
