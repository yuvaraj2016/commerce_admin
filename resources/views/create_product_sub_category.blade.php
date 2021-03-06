@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Product Sub Categories</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Product Sub Categories</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('product_sub_cat.index') }}">Product Sub Categories</a>
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
            <a href="{{ route('product_sub_cat.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Product Sub Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('product_sub_cat.index') }}">Product Sub Categories</a></div>
            <div class="breadcrumb-item">Create Product Sub Category</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product_sub_categories.store') }}" method="post" id="addprosubcat"
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

                            @if(session('error') !== null)

                                @foreach(session('error') as $v)
                                   @foreach($v as $e)

                                   <div class="errorWrap"><strong>ERROR</strong>:  {{ $e }} </div>

                                   <!-- <div class='alert alert-danger'>
                                       {{ $e }}
                                    </div> -->
                                   @endforeach

                                @endforeach
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
                            <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Sub Category Title</label>
                                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                                          
                                                        </div>


                                                        <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="category_id" id="category_id" placeholder="Category" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}" {{ (old("category_id") == $category['id'] ? "selected":"") }}>{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>


       <!-- Modal large-->
       <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>
                                                          









                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Sub Category Short Code</label>
                                                        <input type="text" name="sub_category_short_code" value="{{ old('sub_category_short_code') }}" class="form-control" required>
                                          
                                                        </div>
                                                        <!-- <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Sub Category Desc</label>
                                                        <input type="text" name="sub_category_desc" value="{{ old('sub_category_desc') }}" class="summernote-simple form-control" required>
                                          
                                                        </div> -->

                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Sub Category Image Picture</label>
                                                        <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                        </div>


                                                        <div class="col-sm-4">
                                                      
                                                        <label class="col-form-label text-md-right ">Sub Category Desc</label>
                                                        <input type="text" name="sub_category_desc" value="{{ old('sub_category_desc') }}" class="summernote-simple form-control" required>
                                                      </div>


                                                        <div class="col-sm-4">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                      
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                                          
                                                        </div>
                      
                                                    </div>




<!-- 
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="category_id" id="category_id" placeholder="Category" required class="form-control selectric" required>
                                        <option value="">Select</option>

                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}" {{ (old("category_id") == $category['id'] ? "selected":"") }}>{{ $category['category_desc'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category Short Code</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="sub_category_short_code" value="{{ old('sub_category_short_code') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="sub_category_desc" class="summernote-simple form-control" required>{{ old('sub_category_desc') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category Image
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
                            </div> -->

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Product Sub Category</button>
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
                                                                                <h4 class="modal-title">Add Product Category</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="{{ route('product_categories.store') }}" method="post" id="addprocat"
                            enctype="multipart/form-data">
                            @csrf
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Category Short Code</label>
                                                        <input type="text" id="category_short_code" name="category_short_code" value="{{ old('category_short_code') }}" class="form-control" required>
                                                        </div>


                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Category Desc</label>
                                                        <input type="text" name="category_desc" value="{{ old('category_desc') }}" class="summernote-simple form-control" required>
                                                        </div>

                                                        </div>
                                                        <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        
                                                        <label class="col-form-label text-md-right ">Product Category Image Picture</label>
                                            <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
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



