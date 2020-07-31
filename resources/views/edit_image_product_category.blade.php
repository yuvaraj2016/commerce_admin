
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Product Category Image</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Edit Image  Product Category Image</i>
                          
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
                                            <label class="col-form-label text-md-right ">Category Short Code : </label>
                                            <b>{{ $editdata['category_short_code'] }}</b>
                                            </div>
                                            <div class="col-sm-4 offset-1">
                                            <label class="col-form-label text-md-right ">Category Desc : </label>
                                            <b>{{ $editdata['category_desc'] }}</b>
                                
                                            </div>

                                           
                                            

                                
                                        </div>

                                                    

                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1 card">
                                                            
                                                            <div class="card-header">
                                                                <h5>Files Already Uploaded</h5>


                                                                @if(session('imagesuccess') !== null)
                                                                 <div class='alert alert-success my-auto'>
                                                                        {{ session('imagesuccess') }}
                                                                </div>
                                                                @endif
                                                                @if(session('imageerror') !== null)

                                                                @foreach(session('imageerror') as $v)
                                                                @foreach($v as $e)
                                                                <div class='alert alert-danger my-auto'>
                                                                    {{ $e }}
                                                                    </div>
                                                                @endforeach

                                                                @endforeach
                                                            @endif



                                                            </div>
                                                            <div class="card-block">
                                                                @php 
                                                                $imagedata = $editdata['Assets']['data'];
                                                                if(count($imagedata)==0)
                                                                {
                                                                    echo "<h5 class='alert alert-danger'>There is no image for this category.</h5>";

                                                                }
                                                                else {
                                                                    # code...
                                                               
                                                                // echo count($imagedata);
                                                                @endphp 

                                                            @foreach ($imagedata as $image)
                                                              <div class="row mt-3">  

                                                               <div class="col-sm-6 my-auto">
                                                                <a href=""><img src="{{ isset($image['links']) ? $image['links']['full'].'?width=100&height=100' : asset('img/no-image.gif')  }}"/></a>
                                                               </div>

                                                               <div class="col-sm-6 my-auto">
                                                               
                                                                  

                                                                <form id="myForm" action="{{ route('assets.destroy',$image['id']) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button id="formsubmit" type="submit"
                                                                    class=" job-delete d-inline btn btn-danger font1" > <i
                                                                        class="icofont icofont-trash"></i>Delete</button>
                                                            </form>
                                                              
                                                               </div>

                                                             </div>    
                                                             
                                                             @endforeach

                                                            @php
                                                            }
                                                            @endphp

                                                             {{-- <div class="row mt-3">  

                                                                <div class="col">
                                                                 <a href=""><img src="{{ isset($editdata['Assets']['data'][0]['links']) ? $editdata['Assets']['data'][0]['links']['full'].'?width=100&height=100' : asset('img/no-image.gif')  }}"/></a>
                                                                </div>
 
                                                                <div class="col">
                                                                 <a href="" class="btn btn-danger">Delete</a>
                                                                </div>
                                                                
                                                              </div>   --}}


                                                            </div>

                                                        </div>
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
                                                            <div class="card-block">
                                                                <form class="dropzone" action="{{route('storeimage',$module='product_categories') }}" method="post" id="addprocat"
                                                                    enctype="multipart/form-data">
                                                                  @csrf
                                                                <p id="msg"></p>
                                                                <div class="sub-title">Category Image Picture</div>
                                                                <input type="file" name="file[]" id="filer_input" multiple="multiple" class="form-control">
                                                                <button type="submit" class="btn btn-primary">Upload Image</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                       
                                                      


                                                      

                                         
                                                    </div>

                                                   
 
                            

                            {{-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Update Product Category</button>
                                </div>
                            </div> --}}

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
// 	$(document).ready(function (e) {
//         $('#formsubmit').on('click', function () {

//         });
// 		$('#upload').on('click', function () {
// 			var form_data = new FormData();
// 			var ins = document.getElementById('filer_input').files.length;
// 			for (var x = 0; x < ins; x++) {
// 				form_data.append("file[]", document.getElementById('filer_input').files[x]);
//             }
//             // alert(form_data);
//             $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });
// 			$.ajax({
//                 url: "http://ecommerce-api.hridham.com/api/ProdCat/1",
//                 headers:'Authorization: Bearer ' // point to server-side PHP script 
//                 dataType: 'json', // what to expect back from the PHP script
//                 // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
// 				cache: false,
// 				contentType: false,
// 				processData: false,
// 				data: {file:form_data},
// 				type: 'patch',
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
//     });
    

   
// });


</script>

