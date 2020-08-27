@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Item Variants</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Item Variants</i>
                          
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
        <h1>View Item Variant</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('item_variant.index') }}">View Variants</a></div>
            <div class="breadcrumb-item">View Item Variant</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    <div class="form-group row">
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                        <input type="text"  value="  {{ $itemvariant['item_desc'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Variant Code</label>
                                                        <input type="text"  value="    {{ $itemvariant['variant_code'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Variant Desc</label>
                                                        <input type="text"  value="    {{ $itemvariant['variant_desc'] }}" class="form-control" readonly>
                                                        </div>
                                         
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Variants Group</label>
                                                        <input type="text"  value="  {{ $itemvariant['variant_group_desc'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Min Order Quantity</label>
                                                        <input type="text"  value="    {{ $itemvariant['min_order_quantity'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Min Order Amount</label>
                                                        <input type="text"  value="    {{ $itemvariant['min_order_amount'] }}" class="form-control" readonly>
                                                        </div>
                                         
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Max Order Quantity</label>
                                                        <input type="text"  value="  {{ $itemvariant['max_order_quantity'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Max Order Amount</label>
                                                        <input type="text"  value="    {{ $itemvariant['max_order_amount'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Discount Percentage</label>
                                                        <input type="text"  value="    {{ $itemvariant['discount_percentage'] }}" class="form-control" readonly>
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Discount Amount</label>
                                                        <input type="text"  value="  {{ $itemvariant['discount_amount'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Suppliers</label>
                                                        <input type="text"  value="    {{ $itemvariant['supplier_name'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Vendors</label>
                                                        <input type="text"  value="    {{ $itemvariant['vendor'] }}" class="form-control" readonly>
                                                        </div>
                                         
                                                    </div>



                                                    <div class="form-group row">
                                                       
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <input type="text"  value="    {{ $itemvariant['status_desc'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Mrp Price</label>
                                                        <input type="text"  value="{{ $itemvariant['MRP'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Selling Price</label>
                                                        <input type="text"  value="{{ $itemvariant['selling_price'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>


                                                  



                                                    <div class="form-group row">

                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Name</label>
                                                        <input type="text"  value="{{ $itemvariant['vendor_store_name'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                         

                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Created At</label>
                                                        <input type="text"  value="   {{ date("Y-m-d H:i:s",$itemvariant['created_at']) }}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Item Variant Image</label>
                                                        <img src="{{ isset($itemvariant['Assets']['data'][0]['links']) ? $itemvariant['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>
                                                        </div>
                                                        
                                         
                                                    </div>














                            <!-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $itemvariant['item_desc'] }}
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Variant Code</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $itemvariant['variant_code'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Variant Desc</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $itemvariant['variant_desc'] }}
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Variant Image
                                    Picture</label>
                                <div class="col-sm-12 col-md-7 mt-2">

                                    <img src="{{ isset($itemvariant['Assets']['data'][0]['links']) ? $itemvariant['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>

                                </div>


                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $itemvariant['status_desc'] }}
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created At : </label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                   {{ date("Y-m-d H:i:s",$itemvariant['created_at']) }}
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



