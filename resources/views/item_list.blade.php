@extends('layouts.app')
@section('content')



    <!-- @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error') !== null)
        {{-- @echo "hai" --}}
        @foreach(session('error') as $k =>$v)
            <div class='alert alert-danger'>
                {{ $v[0] }}
            </div>
        @endforeach
    @endif
    <div class="section-header-button">
        <a href="{{ route('items.create') }}" class="btn btn-primary">Add New</a>
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
                        <h4>Item List</h4>
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
                      
                        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Item List</a>
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
                    <a href="{{  route('items.create') }}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;border-radius:30px">Add New</a>
                </div>
                <div class="section-header-button col-md-5" >
                  
                </div>
                <div class="section-header-button col-md-3 " >
                <div class="col" >
                <ul id="pagination" class="float-right m-0 p-0">
                        <li><a href="{{ route('item.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('item.index',$page) }}" class="btn btn-primary">Previous</a></li>
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
                        <li> <a href="{{ route('item.index',$page) }}" class="btn btn-primary">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('item.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                                                                    <th>Item Code</th>
                                    <th>Item Desc</th>
                                    <th>Sub Category Desc</th>
                                    <th>Item Image</th>
                                    <th>Status</th>
                                    <th>Vendor</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                {{-- @dd($prodcategories) --}}
                                @foreach($items as $item )
                                    @php
                                        $id=$item['id'];
                                    @endphp

                                    <tr>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $item['item_code'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                                style="padding-top:10px;">{{ $item['item_desc'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $item['sub_category_desc'] }}</span>

                                        </td>

                                        <td><img src="{{ isset($item['Assets']['data'][0]['links']) ? $item['Assets']['data'][0]['links']['full'].'?width=52&height=52' : asset('img/no-image.gif')  }}"/></td>

                                        <td>{{ $item['status_desc'] }}</td>

                                        <td>{{ $item['vendor'] }}</td>

                                        <td>{{ date("Y-m-d H:i:s",$item['created_at']) }}</td>
                                        <td>
            <div class="d-flex">
            <ul class="list-inline ml-1">
  <li class="list-group-item border1"><a href="{{ url('items/'.$id) }}"
                        class=" d-inline font1"  data-toggle="tooltip" data-placement="top" title="View"><i
                            class="fa fa-eye"></i></a>&nbsp;&nbsp;</li>
  <li class="list-group-item border1"><a href="{{ url('items/'.$id.'/edit') }}"
                        class=" d-inline text-center font1"  data-toggle="tooltip" data-placement="top" title="Edit"><i
                            class="fa fa-edit" ></i></a>&nbsp;&nbsp;</li>
  <li class="list-group-item border1"> <form
                    action="{{ route('items.destroy',$id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:7px!important;padding-bottom:8px!important;"
                        class=" job-delete d-inline font1"  data-toggle="tooltip" data-placement="top" title="Delete"> <i
                            class="fa fa-trash"></i></button>
                </form></li>


                <li class="list-group-item border1"><a href="{{ url('items/'.$id) }}"
                        class=" d-inline font1"  data-toggle="tooltip" data-placement="top" title="Audit"><i
                            class="fa fa-calculator"></i></a>&nbsp;&nbsp;</li>

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


























    <!-- <div class="row">
        <div class="col-12">
        @if(session('success') !== null)
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error') !== null)
        {{-- @echo "hai" --}}
        @foreach(session('error') as $k =>$v)
            <div class='alert alert-danger'>
                {{ $v[0] }}
            </div>
        @endforeach
    @endif
        <div class="section-header-button">
                    <a href="{{  route('items.create') }}" class="btn btn-primary" style="box-shadow: 0 2px 6px #acb5f6;
                    background-color: #6777ef;
                    border-color: #6777ef;">Add New</a>
                </div>
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid m-2">
                    <div class="row">
                        <div class="col">
                             <h4>Item List</h4>
                        </div>

                    <div class="col">
                        <ul id="pagination" class="float-right m-0 p-0">
                        <li><a href="{{ route('item.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('item.index',$page) }}" class="btn btn-primary">Previous</a></li>
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
                        <li> <a href="{{ route('item.index',$page) }}" class="btn btn-primary">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('item.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

                        @php
                        }

                        @endphp

                    </ul>

                       {{-- <a href="{{ route('product_categories.create') }}" class="btn btn-primary float-right">Add New</a> --}}

                    </div>

                    </div>
                    </div>

                </div>


                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Item Desc</th>
                                    <th>Sub Category Desc</th>
                                    <th>Item Image</th>
                                    <th>Status</th>
                                    <th>Vendor</th>
                                    <th>Created At</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                {{-- @dd($prodcategories) --}}
                                @foreach($items as $item )
                                    @php
                                        $id=$item['id'];
                                    @endphp

                                    <tr>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $item['item_code'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                                style="padding-top:10px;">{{ $item['item_desc'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $item['sub_category_desc'] }}</span>

                                        </td>

                                        <td><img src="{{ isset($item['Assets']['data'][0]['links']) ? $item['Assets']['data'][0]['links']['full'].'?width=52&height=52' : asset('img/no-image.gif')  }}"/></td>

                                        <td>{{ $item['status_desc'] }}</td>

                                        <td>{{ $item['vendor'] }}</td>

                                        <td>{{ date("Y-m-d H:i:s",$item['created_at']) }}</td>
                                        <td>
                                            <div class="d-flex">

                                                <a href="{{ url('items/'.$id) }}"
                                                    class="btn btn-success d-inline" style="border-radius:30px;box-shadow: 0 2px 6px #acb5f6;
                                                        background-color: #6777ef;
                                                        border-color: #6777ef;"><i
                                                        class="icofont icofont-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                                                <a href="{{ url('items/'.$id.'/edit') }}"
                                                    class="btn btn-info d-inline text-center" style="border-radius:30px;box-shadow: 0 2px 6px #acb5f6;
                                                        background-color: #6777ef;
                                                        border-color: #6777ef;"><i
                                                        class="icofont icofont-ui-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a href="{{ action('AlbumController@destroy', $id) }}"
                                                    class="job-delete badge badge-danger d-inline"><i
                                                        class="fas fa-trash"></i>Deletes</a> --}}

                                                <form
                                                    action="{{ route('items.destroy',$id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-danger job-delete d-inline" style="border-radius:30px;box-shadow: 0 2px 6px #acb5f6;
                                                            background-color: #6777ef;
                                                            border-color: #6777ef;"> <i
                                                            class="icofont icofont-trash"></i>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>
</div>

</section>
@endsection
