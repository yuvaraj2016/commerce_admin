@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}





<section class="section" >
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('vendor_cat.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>View Vendor Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('vendor_cat.index') }}">Vendor Categories</a></div>
            <div class="breadcrumb-item">View Vendor Category</div>
        </div>
    </div>

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

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Category Desc</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendorcategory['vendor_cat_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendorcategory['status_desc'] }}
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created At : </label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                   {{ date("Y-m-d H:i:s",$vendorcategory['created_at']) }}
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



