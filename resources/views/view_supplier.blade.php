@extends('layouts.app')
@section('content')
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Suppliers</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Suppliers</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Suppliers</a>
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
            <a href="{{ route('supplier.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>View Supplier</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Suppliers</a></div>
            <div class="breadcrumb-item">View Supplier</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Name</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $supplier['supplier_name'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Image
                                    Picture</label>
                                <div class="col-sm-12 col-md-7 mt-2">

                                    <img src="{{ isset($supplier['Assets']['data'][0]['links']) ? $supplier['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>

                                </div>


                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Category</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $supplier['supplier_category_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Desc</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $supplier['supplier_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Address</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $supplier['supplier_address'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Contact</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $supplier['supplier_contact'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Email</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $supplier['supplier_email'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $supplier['status_desc'] }}
                                </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created At : </label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                   {{ date("Y-m-d H:i:s",$supplier['created_at']) }}
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
