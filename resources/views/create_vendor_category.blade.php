@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Vendor Categories</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Vendor Categories</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('vendor_cat.index') }}">Vendor Categories</a>
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
            <a href="{{ route('vendor_cat.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Vendor Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('vendor_cat.index') }}">Vendor Categories</a></div>
            <div class="breadcrumb-item">Create Vendor Category</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('vendor_categories.store') }}" method="post" id="addvendorcat"
                            enctype="multipart/form-data">
                            @csrf
                            @if(session('success') !== null)
                                <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error') !== null)
                            @foreach(session('error') as $k =>$v)
                                <div class='alert alert-danger'>
                                    {{ $v[0] }}
                                </div>
                            @endforeach
                            @endif
                            <div class="form-group row">
                                                    <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Desc</label>
                                                        <input name="vendor_cat_desc" value="{{ old('vendor_cat_desc') }}" class="summernote-simple form-control" required>
               
                                                        </div>
                                                      
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" class="form-control selectric" required>
                                       
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
               
                                                        </div>
                                                     
                                                    </div>






                            <!-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Category Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="vendor_cat_desc" class="summernote-simple form-control" required>{{ old('vendor_cat_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="status_id" id="" placeholder="Status" class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Vendor Category</button>
                                </div>
                            </div>

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



