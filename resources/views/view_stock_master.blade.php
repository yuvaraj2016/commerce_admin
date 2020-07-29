@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}

<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Stock Master</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Stock Master</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('stock_master.index') }}">Stock Master</a>
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
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                        <input type="text"  value=" {{$stockmaster['item_desc']}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Variants</label>
                                                        <input type="text"  value="    {{$stockmaster['variant_desc']}}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text"  value=" {{$stockmaster['vendor_name']}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Stock Quantity</label>
                                                        <input type="text"  value="    {{$stockmaster['stock_quantity']}}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Stock Threshold</label>
                                                        <input type="text"  value=" {{$stockmaster['stock_threshold']}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <input type="text"  value="      {{$stockmaster['status_desc']}}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Created At</label>
                                                        <input type="text"  value="   {{ date("Y-m-d H:i:s",$stockmaster['created_at']) }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                      
                                          
                                                        </div>
                                         
                                                    </div>






<!-- 


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                  {{$stockmaster['item_desc']}}
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Variants</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{$stockmaster['variant_desc']}}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{$stockmaster['vendor_name']}}
                                </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Quantity</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{$stockmaster['stock_quantity']}}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Threshold</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{$stockmaster['stock_threshold']}}
                                </div>
                            </div>

                           <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{$stockmaster['status_desc']}}
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created At : </label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                   {{ date("Y-m-d H:i:s",$stockmaster['created_at']) }}
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



