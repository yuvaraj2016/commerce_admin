@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Product Category</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Edit Product Category</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('product_cat.index') }}">Product Category</a>
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
            <a href="{{ route('product_cat.index') }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
        </div>
        <h1>Create Product Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('product_cat.index') }}">Product Categories</a></div>
            <div class="breadcrumb-item">Create Product Category</div>
        </div>
    </div> -->

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="dropzone" action="{{ url('product_categories/'.$prodcategory['id']) }}" method="post" id="addprocat"
                            enctype="multipart/form-data">
                            @method('PUT')
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
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Category Short Code</label>
                                                        <input type="text" id="category_short_code" name="category_short_code" value="{{ old('category_short_code',$prodcategory['category_short_code']) }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Category Desc</label>
                                                        <textarea name="category_desc" class="summernote-simple form-control" required>{{ old('category_desc',$prodcategory['category_desc']) }}</textarea>
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        {{-- <div class="col-sm-4 offset-1">
                                                            <img src="{{ isset($prodcategory['Assets']['data'][0]['links']) ? $prodcategory['Assets']['data'][0]['links']['full'].'?width=300&height=300' : asset('img/no-image.gif')  }}"/>
                                                            <label class="col-form-label text-md-right ">Category Image Picture</label>
                                                            <input type="file" class="" name="file[]" id="file">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div> --}}
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Status</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                                            <option value="">Select</option>
                                                            @foreach($statuses as $status)
                                                                <option value="{{ $status['id'] }}" {{ ($prodcategory['status_id'] == $status['id']) ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                                            @endforeach
                                                        </select>
                                          
                                                        </div>
                                         
                                                    </div>

                                                    <div class="needsclick dropzone" id="document-dropzone">

                                                    </div>




<!-- 
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="category_short_code">Category Short Code</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" id="category_short_code" name="category_short_code" value="{{ old('category_short_code') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Desc</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="category_desc" class="summernote-simple form-control" required>{{ old('category_desc') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Image
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
                                    <button type="submit" class="btn btn-primary">Update Product Category</button>
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
<script type="text/javascript" src="{{ asset('modules/upload-preview/assets/js/jquery-2.0.3.min.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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



<script>
    $(function() {
        // var token = 

   
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
    //    paramName: "file",
      url: '{{ route('assets.store') }}',
      maxFilesize: 2, // MB
      addRemoveLinks: true,
    //   uploadMultiple:true,
      headers: {
        'X-CSRF-TOKEN': " @csrf ",
        // 'Accept' : 'application/vnd.api.v1+json',
        // 'Content-Type': 'image/jpeg'
        // 'Authorization' : 'Bearer ' + "{{ session()->get('token') }}"
      success: function (file, response) {
          alert(response);return;
        $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
      },
      removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="document[]"][value="' + name + '"]').remove()
      },
      init: function () {
      
    //     @if(isset($project) && $project->document)
    //     var files =
    //       {!! json_encode($project->document) !!}
    //     for (var i in files) {
    //       var file = files[i]
    //       this.options.addedfile.call(this, file)
    //       file.previewElement.classList.add('dz-complete')
    //       $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
    //     }
    //   @endif

      }
    }

});
  </script>