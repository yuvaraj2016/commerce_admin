@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Supplier Categories</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Supplier Categories</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('supplier_cat.index') }}">Supplier Categories</a>
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
            <a href="{{ route('supplier_cat.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>View Supplier Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('supplier_cat.index') }}">Supplier Categories</a></div>
            <div class="breadcrumb-item">View Supplier Category</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('supplier_categories.store') }}" method="post" id="addsuppliercat"
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
                            <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Supplier Category Title</label>
                                                        <input type="text"  value="   {{ $suppliercategory['title'] }}" class="form-control" readonly>
                                          
                                                        </div>
                            <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Supplier Category Desc</label>
                                                        <input type="text"  value="   {{ $suppliercategory['supplier_cat_desc'] }}" class="form-control" readonly>
                                          
                                                        </div>

                                                        <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Status </label>
                                                        <input type="text"  value="    {{ $suppliercategory['status_desc'] }}" class="form-control" readonly>
                                                        </div>
                                                     
                                         
                                                    </div>

                                                    <div class="form-group row">
                            <div class="col-sm-4 ">
                                                        <label class="col-form-label text-md-right ">Created At</label>
                                                        <input type="text"  value="   {{ date("Y-m-d H:i:s",$suppliercategory['created_at']) }}" class="form-control" readonly>
                                          
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        
                                                        </div>
                                                     
                                         
                                                    </div>
















                            <!-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier Category Desc</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $suppliercategory['supplier_cat_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $suppliercategory['status_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created At : </label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                   {{ date("Y-m-d H:i:s",$suppliercategory['created_at']) }}
                                </div>
                            </div> -->


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
</div>
@endsection




