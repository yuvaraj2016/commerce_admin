@extends('layouts.app')
@section('content')



    @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
    @if(Session::has('error'))
                <div class="alert errorWrap">
                    {{session('error')}}
                </div>
    @endif
    <div class="section-header-button">
        <a href="{{ route('vendors.create') }}" class="btn btn-primary">Add New</a>
    </div> 

<style>
#pagination li
{

    display:inline-flex;
    float:left;
    margin-left:10px;
    /* float:right; */
}

 </style>
<div class="page-wrapper">

<div class="page-header m-t-50">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Vendors Stores List</h4>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-1.htm">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                      
                        <li class="breadcrumb-item"><a href="{{ route('vendorstores.index') }}">Vendors Stores List</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">

    <div class="row">
    <div class="col-sm-12">
                                        <!-- @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
        @endif
        -->
                                            
                                                <!-- HTML5 Export Buttons table start -->
                                                <div class="card">
                                                    
                                                    <div class="card-header table-card-header">
                                                    <div class="row">
                                                    <div class="section-header-button col-md-4" >
                    <a href="{{ route('vendorstores.create') }}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
                </div>
                <div class="section-header-button col-md-5" >
                  
                </div>
                <div class="section-header-button col-md-3 " >
                <div class="col" >
                <ul id="pagination" class="float-right m-0 p-0">
                        <li><a href="{{ route('vendorstores.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('vendorstores.index',$page) }}" class="btn btn-primary">Previous</a></li>
                        @php
                            }
                        @endphp


                        {{-- @for($i = 1; $i <= $pagination['total_pages']; $i++)
                        <?php
                        // $isCurrentPage =  $pagination['current_page'] == $i;
                        ?>
                        <li class="{{ $isCurrentPage ? 'active' : '' }}" >
                            <a href="{{ !$isCurrentPage ? route('product_cat.index',$i) : '#' }}"  class="btn btn-primary">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor --}}



                        @php
                           if(isset($pagination['links']['next']))
                            {
                                $endurl = explode("?page=",$pagination['links']['next']);
                                $page = $endurl[1];
                                // echo
                        @endphp
                        <li> <a href="{{ route('vendorstores.index',$page) }}" class="btn btn-primary">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('vendorstores.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

                        @php
                        }

                        @endphp

                    </ul>

                       {{-- <a href="{{ route('product_categories.create') }}" class="btn btn-primary float-right">Add New</a> --}}

                    </div>
                </div>
                                                    </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                    <th>Vendor Name</th>
                                    <th>Vendor Store Name</th>
                                    <th>Vendor Store Image</th>
                                    <th>Vendor Store Location</th>
                                    <th>Vendor Store Address</th>
                                    <th>Vendor Store Contact</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                {{-- @dd($prodcategories) --}}
                                @foreach($vendorstores as $vendors)
                                    @php
                                        $id=$vendors['id'];
                                    @endphp

                                    <tr>


                                        <td>
                                            {{ $vendors['vendor_name'] }}
                                        </td>

                                        <!-- <td><img src="{{ isset($vendor['Assets']['data'][0]['links']) ? $vendor['Assets']['data'][0]['links']['full'].'?width=52&height=52' : asset('img/no-image.gif')  }}"/></td> -->

                                        <td>{{ $vendors['vendor_store_name'] }}</td>
   <td><img src="{{ isset($vendors['Assets']['data'][0]['links']) ? $vendors['Assets']['data'][0]['links']['full'].'?width=52&height=52' : asset('img/no-image.gif')  }}"/></td>
                                        <td>{{ $vendors['vendor_store_location'] }}</td>

                                        <td>{{ $vendors['vendor_store_address'] }}</td>

                                        <td>{{ $vendors['vendor_store_contact'] }}</td>

                                        <td>{{ $vendors['latitude'] }}</td>
                                        <td>{{ $vendors['longitude'] }}</td>
                                        

                                        <td>{{ $vendors['status_desc'] }}</td>

                                        <td>{{ date("Y-m-d H:i:s",$vendors['created_at']) }}</td>
                                        <td>
            <div class="d-flex">
            <ul class="list-group list-inline ml-1">
  <li class="list-group-item border1"><a href="{{ url('vendorstores/'.$id) }}"
                        class=" d-inline font1 view-confirmation"  data-toggle="tooltip" data-placement="top" title="View"><i
                            class="fa fa-eye"></i></a></li>
  <li class="list-group-item border1"><a href="{{ url('vendorstores/'.$id.'/edit') }}"
                        class=" d-inline font1 edit-confirmation"  data-toggle="tooltip" data-placement="top" title="Edit"><i
                            class="fa fa-edit" ></i></a></li>
  <!-- <li class="list-group-item border1"> <form
                    action="{{ route('vendors.destroy',$id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:7px!important;padding-bottom:8px!important;"
                    class=" job-delete d-inline font1"  data-toggle="tooltip" data-placement="top" title="Delete"> <i
                        class="fa fa-trash"></i></button>
                </form></li> -->



                <li class="list-group-item border1">
                                                    <form id="delete_from_{{$vendors['id']}}" method="POST" action="{{ route('vendors.destroy', $vendors['id']) }}">
                    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <div class="form-group">
        <a href="javascript:void(0);" data-id="{{$vendors['id']}}" class="_delete_data"  data-toggle="tooltip" data-placement="top" title="Delete" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;">
        <i class="fa fa-trash" style="position: relative;top:-5;color:#01a9ac"></i>
        </a>                    
    </div>
</form></li>
                <!-- <li class="list-group-item border1"><a href="{{ url('vendors/'.$id) }}"
                        class=" d-inline font1"  data-toggle="tooltip" data-placement="top" title="Audit"><i
                            class="fa fa-calculator"></i></a></li> -->

</ul>

            </div>
        </td>
    </tr>

    
@endforeach
  
</tbody>


                                                         
                                                            </table>
                                   
                                                        </div>

                                                        
                                                    </div>
                                                </div>
                                                <!-- HTML5 Export Buttons end -->
                     
                                               
                                       
                                            </div>
                                        </div>

    </div>
</div>


</section>
@endsection
