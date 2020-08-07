@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}



<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Vendor</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Vendor</i>
                          
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
                        <form action="{{ route('vendors.store') }}" method="post" id="addvendor"
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
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Image Picture</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>
                                                        <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Vendor Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="vendor_category_id" id="vendor_category_id" placeholder="Vendor Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($vendorcategories as $vendorcategory)
                                            <option value="{{ $vendorcategory['id'] }}" {{ (old("vendor_category_id") == $vendorcategory['id'] ? "selected":"") }}>{{ $vendorcategory['vendor_cat_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>


                               <!-- Modal large-->
                               <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>
                                                         







                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Desc</label>
                                                        <textarea name="vendor_desc" class="summernote-simple form-control" required>{{ old('vendor_desc') }}</textarea>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Address</label>
                                                        <textarea name="vendor_address" class="summernote-simple form-control" required>{{ old('vendor_address') }}</textarea>
                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Contact</label>
                                                        <input type="number" name="vendor_contact" value="{{ old('vendor_contact') }}" class="form-control" required>
               
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Vendor Email</label>
                                                        <input type="email" name="vendor_email" value="{{ old('vendor_email') }}" class="form-control" required>
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
                                                        
               
                                                        </div>
                                                    </div>
                                               


                            <!-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Image
                                    Picture</label>
                                <div class="col-sm-12 col-md-7">

                                        <div class="gallery"></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file[]" id="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>

                                          </div>

                                </div>


                            </div>
                            {{-- {{ dd($suppliercategories) }} --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="vendor_category_id" id="vendor_category_id" placeholder="Vendor Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($vendorcategories as $vendorcategory)
                                            <option value="{{ $vendorcategory['id'] }}" {{ (old("vendor_category_id") == $vendorcategory['id'] ? "selected":"") }}>{{ $vendorcategory['vendor_cat_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="vendor_desc" class="summernote-simple form-control" required>{{ old('vendor_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Address</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="vendor_address" class="summernote-simple form-control" required>{{ old('vendor_address') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Contact</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="vendor_contact" value="{{ old('vendor_contact') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="email" name="vendor_email" value="{{ old('vendor_email') }}" class="form-control" required>
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
                            </div> -->



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
                                                                                <h4 class="modal-title">Add Vendor Category</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="/action_page.php">
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Desc</label>
                                                        <input type="text"  value="    " class="form-control" >
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                          
                                                        </div>
                                         
                                                    </div>
                                            
                                                   
                                                    </form> 
                                                                           
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
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



