@extends('layouts.app')
@section('content')


<!-- 
    @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error') !== null)
        @foreach(session('error') as $k =>$v)
            <div class='alert alert-danger'>
                {{ $v[0] }}
            </div>
        @endforeach
    @endif
    <div class="section-header-button">
        <a href="{{ route('vendors.create') }}" class="btn btn-primary">Add New</a>
    </div> -->

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
                        <h4>Stock Tracker List</h4>
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
                      
                        <li class="breadcrumb-item"><a href="{{ route('stock_tracker.index') }}">Stock Tracker List</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">

    <div class="row">
    <div class="col-sm-12">
                                        @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
        @endif
        @if(session('error') !== null)
            @foreach(session('error') as $k =>$v)
                <div class='alert alert-danger'>
                    {{ $v[0] }}
                </div>
            @endforeach
        @endif
                                            
                                                <!-- HTML5 Export Buttons table start -->
                                                <div class="card">
                                                <div class="card-header table-card-header">
                                                    <div class="row">
                                                    <div class="section-header-button col-md-4" >
                    <a href="{{ route('stock_tracker.create') }}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
                </div>
                <div class="section-header-button col-md-5" >
                  
                </div>
                <div class="section-header-button col-md-3 " >
                <div class="col" >
                <ul id="pagination" class="float-right m-0 p-0">
                        <li><a href="{{ route('stock_tracker.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('stock_tracker.index',$page) }}" class="btn btn-primary">Previous</a></li>
                        @php
                            }
                        @endphp




                        @php
                           if(isset($pagination['links']['next']))
                            {
                                $endurl = explode("?page=",$pagination['links']['next']);
                                $page = $endurl[1];
                                // echo
                        @endphp
                        <li> <a href="{{ route('stock_tracker.index',$page) }}" class="btn btn-primary">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('stock_tracker.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                                                                    <th>Item Desc</th>
                                    <th>Variant Desc</th>
                                    <th>Supplier Name</th>
                                    <th>Purchase Order Ref</th>
                                    <th>Purchase Order Date</th>
                                    <th>Purchase Price</th>
                                    <th>Stock Quantity</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                {{-- @dd($prodcategories) --}}
                                                                {{-- @dd($prodcategories) --}}
                                @foreach($stocktracker as $stocktracke )
                                @php
                                        $id=$stocktracke['id'];
                                    @endphp

                                    <tr>


                                    <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $stocktracke['item_desc'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                                style="padding-top:10px;">{{ $stocktracke['variant_desc'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $stocktracke['supplier_name'] }}</span>

                                        </td>

                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $stocktracke['purchase_order_ref'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $stocktracke['purchase_order_date'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $stocktracke['purchase_price'] }}</span>

                                        </td>



                                        <td>{{ $stocktracke['stock_quantity'] }}</td>

                                        <td>{{ $stocktracke['comments'] }}</td>

                                        <td>{{ $stocktracke['status_desc'] }}</td>

                                        <td>{{ date("Y-m-d H:i:s",$stocktracke['created_at']) }}</td>
                                        <td>
            <div class="d-flex">
            <ul class="list-group list-inline ml-1">
  <li class="list-group-item border1"><a href="{{ url('stock_tracker/'.$id)  }}"
                        class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="View"><i
                            class="fa fa-eye"></i></a></li>
  <li class="list-group-item border1"><a href="{{url('stock_tracker/'.$id.'/edit') }}"
                        class=" d-inline font1" data-toggle="tooltip" data-placement="top" title="Edit" ><i
                            class="fa fa-edit" ></i></a></li>
  <li class="list-group-item border1"> <form
                    action="{{route('stock_tracker.destroy',$id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;"
                    class=" job-delete d-inline font1" data-toggle="tooltip" data-placement="top" title="Delete" > <i
                        class="fa fa-trash" style="position: relative;top:-5;"></i></button>
                </form></li>

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
