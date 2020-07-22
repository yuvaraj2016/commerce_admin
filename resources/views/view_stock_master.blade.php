@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}





<section class="section" >
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('stock_master.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>View Stock Master</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('stock_master.index') }}">Stock Masters</a></div>
            <div class="breadcrumb-item">View Stock Master</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

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
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



