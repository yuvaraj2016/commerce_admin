@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}

<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Purchase Tracker</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Purchase Tracker</i>
                          
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
    <!-- <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('stock_master.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>View Stock Master</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('stock_master.index') }}">Stock Masters</a></div>
            <div class="breadcrumb-item">View Stock Master</div>
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
                                                        <input type="text"  value=" {{$stocktracker['item_desc']}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Variants</label>
                                                        <input type="text"  value="    {{$stocktracker['variant_desc']}}" class="form-control" readonly>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Name</label>
                                                        <input type="text"  value=" {{$stocktracker['supplier_name']}}" class="form-control" readonly>
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                      
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Purchase Order Ref</label>
                                                        <input type="text"  value="    {{$stocktracker['purchase_order_ref']}}" class="form-control" readonly>
                                          
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Purchase Order Date</label>
                                                        <input type="text"  value=" {{$stocktracker['purchase_order_date']}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Purchase Price</label>
                                                        <input type="text"  value="      {{$stocktracker['purchase_price']}}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Stock Quantity</label>
                                                        <input type="text"  value=" {{$stocktracker['stock_quantity']}}" class="form-control" readonly>
                                                        </div>

                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text"  value=" {{$stocktracker['vendor']}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Name</label>
                                                        <input type="text"  value=" {{$stocktracker['vendor_store_name']}}" class="form-control" readonly>
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                       
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Comments</label>
                                                        <input type="text"  value="      {{$stocktracker['comments']}}" class="form-control" readonly>
                                          
                                                        </div>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <input type="text"  value="{{$stocktracker['status_desc']}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Created At</label>
                                                        <input type="text"  value="{{ date("Y-m-d H:i:s",$stocktracker['created_at']) }}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>

                                                 



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
</div>
@endsection



