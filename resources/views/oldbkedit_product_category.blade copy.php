
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

                                                        <div class="col-sm-4 offset-1 card">
                                                            <div class="card-header">
                                                                <h5>File Upload</h5>
                                                                <div class="card-header-right">
                                                                    <ul class="list-unstyled card-option">
                                                                        <li><i class="feather icon-maximize full-card"></i></li>
                                                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                                                        <li><i class="feather icon-trash-2 close-card"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="card-block">
                                                                <p id="msg"></p>
                                                                <div class="sub-title">Category Image Picture</div>
                                                                <input type="file" name="file[]" id="filer_input3" multiple="multiple" class="form-control">
                                                                <button id="upload" type="button">Upload</button>
                                                            </div> --}}
                                                        </div>
                                                        <div class="input-field">
                                                            <label class="active">Photos</label>
                                                            <div class="input-images-2" style="padding-top: .5rem;"></div>
                                                        </div>


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
                                        {{-- @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach --}}
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
{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}

<script type="text/javascript">
// 	$(document).ready(function (e) {

// 		$('#upload').on('click', function () {
// 			var form_data = new FormData();
// 			var ins = document.getElementById('filer_input3').files.length;
// 			for (var x = 0; x < ins; x++) {
// 				form_data.append("file[]", document.getElementById('filer_input3').files[x]);
//             }
//             // alert(form_data);
//             $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });
// 			$.ajax({
// 				url: "{{ route('assets.store') }}", // point to server-side PHP script 
//                 dataType: 'json', // what to expect back from the PHP script
//                 // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
// 				cache: false,
// 				contentType: false,
// 				processData: false,
// 				data: {file:form_data},
// 				type: 'post',
// 				success: function (response) {
                   
// 					$('#msg').html(response); // display success response from the PHP script
// 				},
// 				error: function (response) {
//                     // alert(response.message);
               
//                     console.log(response);
// 					$('#msg').html(response); // display error response from the PHP script
// 				}
// 			});
// 		});
// 	});
</script>

<script>
  $(document).ready(function () {

        let preloaded = [
    {id: 1, src: 'https://picsum.photos/500/500?random=1'},
    {id: 2, src: 'https://picsum.photos/500/500?random=2'},
    {id: 3, src: 'https://picsum.photos/500/500?random=3'},
    {id: 4, src: 'https://picsum.photos/500/500?random=4'},
    {id: 5, src: 'https://picsum.photos/500/500?random=5'},
    {id: 6, src: 'https://picsum.photos/500/500?random=6'},
];

$('.input-images-2').imageUploader({
    preloaded: preloaded,
    imagesInputName: 'photos',
    preloadedInputName: 'old'
});
    });

        
</script>