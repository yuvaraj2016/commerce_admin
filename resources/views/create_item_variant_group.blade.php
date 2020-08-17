@extends('layouts.app')
@section('content')

{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Item Variants Group</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Create Item Variants Group</i>
                          
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
  

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('item_variants_group.store') }}" method="post" id="additem"
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
                                                        <label class="col-form-label text-md-right ">Item</label>
                                                        <select id="tm" class="js-example-basic-single col-sm-12"  name="item_id" id="" placeholder="Item" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($items as $item)
                                            <option value="{{ $item['id'] }}" {{ (old("item_id") == $item['id'] ? "selected":"") }}>{{ $item['item_desc'] }}</option>
                                        @endforeach
                                    </select>
                                                        </div>
                                                       
                                                                <!-- Modal large-->
                                                                <button id="btn1" type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>
                                                                               

                                                        <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Variant Group Description</label>
                                                        <input type="text" name="item_group_desc" value="{{ old('item_group_desc') }}" class="form-control" required>
                                          
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
                                                    </div>



                                                    <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label text-md-right ">Default</label>
                                                        {{-- <input type="text" name="default" value="{{ old('default') }}" class="form-control" required> --}}

                                                        <select  class="js-example-basic-single col-sm-12"  name="default" id="" placeholder="default" class="form-control selectric" required>
                                                            <option value="">Select</option>
                                                          
                                                            <option value="1" {{ (old("default") == "1" ? "selected":"") }}>Yes</option>
                                                            <option value="0" {{ (old("default") == "0" ? "selected":"") }}>No</option>
                                                            

                                                        </select>
                                          
                                                        </div>
                                                       
                                                                <!-- Modal large-->
                                                       
                                                    </div>










                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-primary">Create Item Variant Group</button>
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
                                                                                <h4 class="modal-title">Add Item</h4>
                                                                                <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="/action_page.php">
                                                                            <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Code</label>
                                                        <input id="ic" type="text"  value="    " class="form-control" >
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Item Desc</label>
                                                        <input id="id" type="text"  value=" " class="form-control" >
                                          
                                                        </div>
                                         
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Sub Category</label>
                                                        <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ (old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
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
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 offset-1">
                                                        <label class="col-form-label text-md-right ">Vendor Name</label>
                                                        <input id="vn" type="text"  value="    " class="form-control" >
                                                        </div>
                                                        <div class="col-sm-4 offset-1">
                                                       
                                          
                                                        </div>
                                         
                                                    </div>

                                                                            
                                                                            <div class="modal-footer" id="ad">
                                                    <div type="button" id="clear" class="btn btn-default" name="">Clear</div>
                                                    
                                                    <div type="button" id="ad" class="btn btn-primary submitBtn" data-dismiss="modal">ADD</div>
                                                    <!--<button type="button" id="" class="btn btn-primary submitBtn" name="">ADD</button>-->
                                                </div>
                                                </form> 
                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
</section>
@endsection
<script type="text/javascript" src="{{ asset('modules/upload-preview/assets/js/jquery-2.0.3.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script  type="text/javascript">


        
$(document).ready(function() {
        $('#btn1').click(function() {
         //   alert ("ss");
            $('#tm').val('').change();
            $('#tm').prop('disabled', true);


        });
   
        $('#clear').click(function() {
           // alert ("Hi");
            $('#ic').val('');
            $('#id').val('');
            $('#vn').val(null);
            // $('#des').prop('disabled', false);
        });
    });

</script>
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



