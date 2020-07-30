@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Item</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Item</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a>
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
            <a href="{{ route('item.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Item</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a></div>
            <div class="breadcrumb-item">Create Item</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="post" id="additem"
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
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Code</label>
                                                        <input type="text" name="item_code" value="{{ old('item_code') }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Item Desc</label>
                                                        <input name="item_desc" value="{{ old('item_desc') }}" class="summernote-simple form-control" required>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Sub Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="sub_category_id" id="sub_category_id" placeholder="Sub Category" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option>
                                        @endforeach
                                    </select>
               
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}"  {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                       
                                    </select>
               
                                                        </div>
                                                      
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="vendor_store_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor['id'] }}" {{ (old("vendor_store_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
                                        @endforeach
                                    </select>
               
                                                        </div>
                                                        <div class="col-sm-4">
                                                      
                                          
                                                        </div>
                                                    </div>






<!-- 



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Code</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="item_code" value="{{ old('item_code') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="item_desc" class="summernote-simple form-control" required>{{ old('item_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="sub_category_id" id="sub_category_id" placeholder="Sub Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory['id'] }}" {{ (old("sub_category_id") == $subcategory['id'] ? "selected":"") }}>{{ $subcategory['sub_category_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Image
                                    Picture</label>
                                <div class="col-sm-12 col-md-7">

                                        <div class="gallery"></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file[]" id="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>

                                          </div>

                                </div>


                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="vendor_store_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor['id'] }}" {{ (old("vendor_store_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Item</button>
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



