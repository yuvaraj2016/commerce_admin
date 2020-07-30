@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Supplier</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Supplier</i>
                          
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
        <h1>Create Supplier</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Suppliers</a></div>
            <div class="breadcrumb-item">Create Supplier</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('suppliers.store') }}" method="post" id="addsupplier"
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
                                                        <label class="col-form-label text-md-right ">Supplier Name</label>
                                                        <input type="text" name="supplier_name" value="{{ old('supplier_name') }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Image Picture</label>
                                                        <input type="file" class="custom-file-input" name="file[]" id="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="supplier_category_id" id="supplier_category_id" placeholder="Supplier Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($suppliercategories as $suppliercategory)
                                            <option value="{{ $suppliercategory['id'] }}" {{ (old("supplier_category_id") == $suppliercategory['id'] ? "selected":"") }}>{{ $suppliercategory['supplier_cat_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Desc</label>
                                                        <textarea name="supplier_desc" class="summernote-simple form-control" required>{{ old('supplier_desc') }}</textarea>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Address</label>
                                                        <textarea name="supplier_address" class="summernote-simple form-control" required>{{ old('supplier_address') }}</textarea>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Contact</label>
                                                        <input type="number" name="supplier_contact" value="{{ old('supplier_contact') }}" class="form-control" required>
               
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Supplier Email</label>
                                                        <input type="email" name="supplier_email" value="{{ old('supplier_email') }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>

                                                        </div>
                                                        <div class="col-sm-4">
                                                        
               
                                                        </div>
                                                    </div>


                          


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Supplier</button>
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



