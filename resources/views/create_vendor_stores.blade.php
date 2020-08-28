@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}



<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Vendor Stores</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Vendor Stores</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('vendorstores.index') }}">Vendor Stores</a>
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
        <h1>Create Vendor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('vendor.index') }}">Vendors</a></div>
            <div class="breadcrumb-item">Create Vendor</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('vendorstores.store') }}" method="post" id="addvendor"
                            enctype="multipart/form-data">
                            @csrf
                            @if(session('success') !== null)
                            <div class="succWrap">
                            {{ session('success') }}
                            </div>
                                <!-- <div class='alert alert-success'>
                                    {{ session('success') }}
                                </div> -->
                            @endif


                            <!-- @if(session('error') !== null)

@foreach(session('error') as $v)
   @foreach($v as $e)
   <div class='alert alert-danger'>
       {{ $e }}
    </div>
   @endforeach

@endforeach
@endif -->
                            @if(session('error') !== null)
                             
                                   <div class="errorWrap">
                                   {{ session('error') }}
                                        </div>
                                                              
                            @endif
                            <!-- @if(session('success') !== null)
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
                            @endif -->


                            <div class="form-group row">
                            <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Vendor </label>
                                                        <select  class="js-example-basic-single col-sm-12" name="vendor_id" id="vendorid" placeholder="Vendor " required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($vendor as $vendors)
                                            <option value="{{ $vendors['id'] }}" {{ (old("vendor_id") == $vendors['id'] ? "selected":"") }}>{{ $vendors['vendor_name'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                      
                                                          <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>

                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Name</label>
                                                        <input name="vendor_store_name" value="{{ old('vendor_store_name') }}" class="summernote-simple form-control" required>
                                                        </div>
                                                       
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Location</label>
                                                        <input name="vendor_store_location" value="{{ old('vendor_store_location') }}" class="summernote-simple form-control" required>
                                                        </div>



                               <!-- Modal large-->
                               <!-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button> -->
                                                         







                                                    </div>


                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Address</label>
                                                        <input type="text" name="vendor_store_address" value="{{ old('vendor_store_address') }}" class="form-control" required>
                                                        </div>
                                                       
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Stored Contact</label>
                                                        <input type="number" name="vendor_store_contact" value="{{ old('vendor_store_contact') }}" class="form-control" required>
               
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Latitude</label>
                                                        <input name="latitude" value="{{ old('latitude') }}" class="summernote-simple form-control" required>
                                          
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Longitude</label>
                                                        <input name="longitude" value="{{ old('longitude') }}" class="summernote-simple form-control" required>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                       
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>

                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Stores Image Picture</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                                                    </div>
                                               


                          

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right offset-6"></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Vendor</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Add Vendor </h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="{{ route('vendors.store') }}" method="post" id="addvendor"
                            enctype="multipart/form-data">
                            @csrf
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" class="form-control" required>
                                                        </div>

                                                      
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Desc</label>
                                                        <textarea name="vendor_desc" class="summernote-simple form-control" required>{{ old('vendor_desc') }}</textarea>
                                                        </div>
                                                      


                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <div class="col-sm-4 offset-1">
                                                                            <label class="col-form-label text-md-right ">Vendor Category</label>
                                                        <select  class=" col-sm-12" name="vendor_category_id" id="vendor_category_id" placeholder="Vendor Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($vendorcategories as $vendorcategory)
                                            <option value="{{ $vendorcategory['id'] }}" {{ (old("vendor_category_id") == $vendorcategory['id'] ? "selected":"") }}>{{ $vendorcategory['vendor_cat_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Email</label>
                                                        <input type="email" name="vendor_email" value="{{ old('vendor_email') }}" class="form-control" required>
                                                        </div>
                                                                            </div>

                                                                            <div class="form-group row">

                                                                            <div class="col-sm-4 offset-1">
                                                                            <label class="col-form-label text-md-right ">Vendor Address</label>
                                                        <textarea name="vendor_address" class="summernote-simple form-control" required>{{ old('vendor_address') }}</textarea>
                                                        </div>


                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Contact</label>
                                                        <input type="number" name="vendor_contact" value="{{ old('vendor_contact') }}" class="form-control" required>
                                          
                                                        </div>
                                                        <div class="col-sm-4 offset-1"></div>    
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Image Picture</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>

                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class=" col-sm-12"  name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                       
                                        @foreach($statuses as $status)
                                        <option value="{{ $status['id'] }}" {{ ($status['id'] == "2") ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        <!-- <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option> -->
                                        @endforeach
                                    </select>
                                                        </div>


                                                                            </div>
                                            
                                                   
                                                    
                                                                           
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
                                                                            </div>
                                                                            </form> 
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


