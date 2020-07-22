@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}





<section class="section" >
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('item_variant.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>View Item Variant</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('item_variant.index') }}">View Variants</a></div>
            <div class="breadcrumb-item">View Item Variant</div>
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
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



