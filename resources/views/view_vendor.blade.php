@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}

<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Vendor</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Vendor</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}">Vendors</a>
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
            <a href="{{ route('vendor.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>View Vendor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('vendor.index') }}">Vendors</a></div>
            <div class="breadcrumb-item">View Vendor</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text"  value="  {{ $vendor['vendor_name'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Category</label>
                                                        <input type="text"  value="     {{ $vendor['vendor_category_desc'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Desc</label>
                                                        <input type="text"  value="   {{ $vendor['vendor_desc'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Address</label>
                                                        <input type="text"  value="   {{ $vendor['vendor_address'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Contact</label>
                                                        <input type="text"  value="    {{ $vendor['vendor_contact'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Email</label>
                                                        <input type="text"  value="    {{ $vendor['vendor_email'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <input type="text"  value="   {{ $vendor['status_desc'] }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Created At</label>
                                                        <input type="text"  value="    {{ date("Y-m-d H:i:s",$vendor['created_at']) }}" class="form-control" readonly>
                                          
                                                        </div>
                                         
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Image</label>
                                                        <img src="{{ isset($vendor['Assets']['data'][0]['links']) ? $vendor['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        
                                          
                                                        </div>
                                         
                                                    </div>












                            <!-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendor['vendor_name'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Image
                                    Picture</label>
                                <div class="col-sm-12 col-md-7 mt-2">

                                    <img src="{{ isset($vendor['Assets']['data'][0]['links']) ? $vendor['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>

                                </div>


                            </div>
                            {{-- {{ dd($suppliercategories) }} --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Category</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendor['vendor_category_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Desc</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendor['vendor_desc'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Address</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendor['vendor_address'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Contact</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendor['vendor_contact'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Email</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendor['vendor_email'] }}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                    {{ $vendor['status_desc'] }}
                                </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created At : </label>
                                <div class="col-sm-12 col-md-7 mt-2">
                                   {{ date("Y-m-d H:i:s",$vendor['created_at']) }}
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
<script type="text/javascript" src="{{ asset('modules/upload-preview/assets/js/jquery-2.0.3.min.js') }}"></script>

<script type="text/javascript">

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#file').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>



