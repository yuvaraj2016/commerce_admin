
@extends('layouts.app')
@section('content')


{{-- <a href="{{ route('albums.index') }}">back</a> --}}
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Stock Master</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           
                                <i class="">Edit Stock Master</i>
                          
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('stock_master.index') }}">Stock Master</a>
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
                        



                        <form class="dropzone" action="{{route('stock_masters.update',['stock_master'=>$stock_master['id']]) }}" method="post" id="editstockmaster"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            @if(session('success') !== null)
                                <div class='alert alert-green'>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error') !== null)

                            {{-- @foreach(session('error') as $v)
                               @foreach($v as $e)
                               <div class='alert alert-red'>
                                   {{ $e }}
                                </div>
                               @endforeach

                            @endforeach --}}
                            <div class='alert alert-red'>
                                {{ session('error') }}
                             </div>
                        @endif
                        <div class="form-group row">
                                                       

                            <div class="col-sm-3">
                                <label class="col-form-label text-md-right ">Item</label>
                                <select  class="js-example-basic-single col-sm-12" name="item_id" id="" placeholder="Item" required class="form-control selectric" required>
                                    <option value="">Select</option>

                                    @foreach($items as $item)
                                        
                                        <option value="{{ $item['id'] }}" {{ ($stock_master['item_id'] == $item['id']) ? "selected":(old("item_id") == $item['id'] ? "selected":"") }}>{{ $item['item_desc'] }}</option>
                                    @endforeach
                                </select>
                                </div>


                                                                  <!-- Modal large-->
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" style="margin-top: 30px;height:40px">+</button>
                 



                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Variants</label>
                                                    <select  class="js-example-basic-single col-sm-12" name="variant_id" id="" placeholder="Variant" required class="form-control selectric" required>
                                    <option value="">Select</option>

                                    @foreach($variants as $variant)
                                        
                                        <option value="{{ $variant['id'] }}" {{ ($stock_master['variant_id'] == $variant['id']) ? "selected":(old("variant_id") == $variant['id'] ? "selected":"") }}>{{ $variant['variant_desc'] }}</option>
                                    @endforeach
                                </select>
                  
                                </div>



                                                                  <!-- Modal large-->
                               <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal2" style="margin-top: 30px;height:40px">+</button>
                   


                                <div class="col-sm-3">
                                <label class="col-form-label text-md-right ">Vendor Name</label>
                                <select  class="js-example-basic-single col-sm-12" name="vendor_id" id="" placeholder="Vendor Store" required class="form-control selectric" required>
                                    <option value="">Select</option>

                                    @foreach($vendors as $vendor)
                                        
                                        <option value="{{ $vendor['id'] }}" {{ ($stock_master['vendor_id'] == $vendor['id']) ? "selected":(old("vendor_id") == $vendor['id'] ? "selected":"") }}>{{ $vendor['vendor_name'] }}</option>
                                    @endforeach
                                </select>

                                </div>

<!-- Modal large-->
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal3" style="margin-top: 30px;height:40px">+</button>
                                     





                            </div>


                            <div class="form-group row">
                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Stock Quantity</label>
                                <input type="number" name="stock_quantity" value="{{ old('stock_quantity',$stock_master['stock_quantity']) }}" class="form-control" required>
                                </div>
                                <div class="col-sm-4">
                                <label class="col-form-label text-md-right ">Stock Threshold</label>
                                <input type="number" name="stock_threshold" value="{{ old('stock_threshold',$stock_master['stock_threshold']) }}" class="form-control" required>
                  
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-md-right ">Status</label>
                                    <select  class="js-example-basic-single col-sm-12" name="status_id" id="" placeholder="Status" required class="form-control selectric" required>
                                        <option value="">Select</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status['id'] }}" {{ ($stock_master['status_id'] == $status['id']) ? "selected":(old("status_id") == $status['id'] ? "selected":"") }}>{{ $status['status_desc'] }}</option>
                                        @endforeach
                                    </select>
                      
                                    </div>
                            </div>
                            
                        </div>
                                                    
                   

                            

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right "></label>
                                <div class="col-sm-12 col-md-7 offset-5">
                                    <button type="submit" class="btn btn-blue">Update </button>
                                    <a href="{{ url('stock_master_list') }}"
                        class=" d-inline text-center btn btn-blue back" ><i
                            class="icofont icofont-arrow-left" ></i>Back&nbsp;&nbsp;</a>
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
