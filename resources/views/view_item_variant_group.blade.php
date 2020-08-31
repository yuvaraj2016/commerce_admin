@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>View Item Variants Group</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">View Item Variants Group</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('item_variant_group.index') }}">Item Variants Group</a>
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
                    <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Group Title</label>
                                                        <input type="text"  value="    {{ $itemvariantgroup['title'] }}" class="form-control" readonly>
                                          
                                                        </div>


                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                        <input type="text"  value="  {{ $itemvariantgroup['item_desc'] }}" class="form-control" readonly>
                                                        </div>
                                                        <!-- <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Group Description</label>
                                                        <input type="text"  value="    {{ $itemvariantgroup['item_group_desc'] }}" class="form-control" readonly>
                                          
                                                        </div> -->
                                         
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Group Description</label>
                                                        <input type="text"  value="    {{ $itemvariantgroup['item_group_desc'] }}" class="form-control" readonly>
                                          
                                                        </div>
                                                       
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <input type="text"  value="    {{ $itemvariantgroup['status_desc'] }}" class="form-control" readonly>
                                          
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



