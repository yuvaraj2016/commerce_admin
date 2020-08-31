@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Item</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Item</i>
                          
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
        <h1>View Item</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a></div>
            <div class="breadcrumb-item">View Item</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    <div class="form-group row">
                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Sub Category</label>
                                                        <!-- <input type="text"  value="    {{ $item['sub_category_desc'] }}" class="form-control" readonly> -->
                                                        <textarea  rows="4" cols="30" readonly> {{ $item['sub_category_desc'] }}</textarea>
                                                    </div>
                                                        
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Item Desc</label>
                                                        <!-- <input type="text"  value="   {{ $item['item_desc'] }}" class="form-control" readonly> -->
                                                        <textarea  rows="4" cols="30" readonly> {{ $item['item_desc'] }}</textarea>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Category Desc</label>
                                                        <!-- <input type="text"  value="    {{ $item['category_desc'] }}" class="form-control" readonly> -->
                                                        <textarea  rows="4" cols="30" readonly> {{ $item['category_desc'] }}</textarea>
                                                    </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Title</label>
                                                        <input type="text"  value="    {{ $item['title'] }}" class="form-control" readonly>
                                                        </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Code</label>
                                                        <input type="text"  value="    {{ $item['item_code'] }}" class="form-control" readonly>
                                                        </div>

                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Min Order Quantity</label>
                                                        <input type="text"  value="    {{ $item['min_order_quantity'] }}" class="form-control" readonly>
                                                        </div>

                                                      
                                                   
                                         
                                                    </div>



                                                    <div class="form-group row">
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Min Order Amount</label>
                                                        <input type="text"  value="    {{ $item['min_order_amount'] }}" class="form-control" readonly>
                                                        </div>

                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Max Order Quantity</label>
                                                        <input type="text"  value="    {{ $item['max_order_quantity'] }}" class="form-control" readonly>
                                                        </div>

                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Max Order Amount</label>
                                                        <input type="text"  value="    {{ $item['max_order_amount'] }}" class="form-control" readonly>
                                                        </div>

                                                        
                                                   
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Discound Percentage</label>
                                                        <input type="text"  value="    {{ $item['discount_percentage'] }}" class="form-control" readonly>
                                                        </div>

                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Discount Amount</label>
                                                        <input type="text"  value="    {{ $item['discount_amount'] }}" class="form-control" readonly>
                                                        </div>

                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Quantity</label>
                                                        <input type="text"  value="    {{ $item['quantity'] }}" class="form-control" readonly>
                                                        </div>

                                                       
                                                   
                                         
                                                    </div>



                                                    <div class="form-group row">
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Threshold</label>
                                                        <input type="text"  value="    {{ $item['threshold'] }}" class="form-control" readonly>
                                                        </div>
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Supplier Name</label>
                                                        <input type="text"  value="    {{ $item['supplier_name'] }}" class="form-control" readonly>
                                                        </div>

                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">MRP</label>
                                                        <input type="text"  value="    {{ $item['MRP'] }}" class="form-control" readonly>
                                                        </div>

                                                    
                                                   
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Selling Price</label>
                                                        <input type="text"  value="    {{ $item['selling_price'] }}" class="form-control" readonly>
                                                        </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <input type="text"  value="  {{ $item['status_desc'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text"  value="     {{ $item['vendor'] }}" class="form-control" readonly>
                                                        </div>
                                                     
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Name</label>
                                                        <input type="text"  value="     {{ $item['vendor_store_name'] }}" class="form-control" readonly>
                                                        </div>
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Created At</label>
                                                        <input type="text"  value=" {{ date("Y-m-d H:i:s",$item['created_at']) }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Item Image</label>
                                                        <img src="{{ isset($item['Assets']['data'][0]['links']) ? $item['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>
                                                        </div>
                                                       
                                         
                                                    </div>








<!-- 
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Code</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $item['item_code'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Desc</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $item['item_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $item['sub_category_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Image
                                    Picture</label>
                                <div class="col-sm-12 col-md-7 mt-2">

                                    <img src="{{ isset($item['Assets']['data'][0]['links']) ? $item['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>

                                </div>


                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $item['status_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $item['vendor'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created At : </label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                   {{ date("Y-m-d H:i:s",$item['created_at']) }}
                                </div>
                            </div> -->





                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
</div>
@endsection
