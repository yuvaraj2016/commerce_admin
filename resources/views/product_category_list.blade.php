@extends('layouts.app')
@section('content')





<style>
    #pagination li {

        display: inline-flex;
        float: left;
        margin-left: 10px;
        /* float:right; */
    }
</style>

<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Product Category List</h4>
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

                        <li class="breadcrumb-item"><a href="{{ route('product_cat.index') }}">Product Category List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
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

            <div class="col-sm-12">
                <!-- HTML5 Export Buttons table start -->
                <div class="card">

                    <div class="card-header table-card-header">
                        <div class="row">
                            <div class="section-header-button col-md-4">
                                <a href="{{ route('product_categories.create') }}" class="btn btn-primary" style="padding-top:7px; padding-bottom:7px;border-radius:30px">Add New</a>
                            </div>
                            <div class="section-header-button col-md-5">

                            </div>
                            <div class="section-header-button col-md-3 ">
                                <div class="col">
                                <ul id="pagination" class="float-right m-0 p-0">
                                        <li><a href="{{ route('product_cat.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                                        @php
                                        if(isset($pagination['links']['previous']))
                                        {
                                        # code...
                                        $endurl = explode("?page=",$pagination['links']['previous']);
                                        $page = $endurl[1];

                                        @endphp
                                        <li><a href="{{ route('product_cat.index',$page) }}" class="btn btn-primary">Previous</a></li>
                                        @php
                                        }
                                        @endphp


                                        {{-- @for($i = 1; $i <= $pagination['total_pages']; $i++)
                            <?php
                            // $isCurrentPage =  $pagination['current_page'] == $i;
                            ?>
                            <li class="{{ $isCurrentPage ? 'active' : '' }}" >
                                        <a href="{{ !$isCurrentPage ? route('product_cat.index',$i) : '#' }}" class="btn btn-primary">
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
                                        <li> <a href="{{ route('product_cat.index',$page) }}" class="btn btn-primary">Next</a></li>
                                        @php
                                        }

                                        @endphp

                                        @php
                                        if($pagination['total_pages']>1)
                                        {
                                        @endphp
                                        <li> <a href="{{ route('product_cat.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                                        <th>Category Title</th>
                                    <th>Category Short Code</th>
                                        <th>Category Desc</th>
                                        <th>Category Image</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

{{-- @dd($prodcategories) --}}
@foreach($prodcategories as $prodcategory )
@php
$id=$prodcategory['id'];
@endphp

<tr>
<td><span class="text-center justify-content-center" style="padding-top:10px;">{{ $prodcategory['title'] }}</span>

    </td>
    <td><span class="text-center justify-content-center" style="padding-top:10px;">{{ $prodcategory['category_short_code'] }}</span>

    </td>
    <td>
        {{ $prodcategory['category_desc'] }}
    </td>
    {{-- <td>{{ dd($prodcategory['Assets']) }}</td> --}}
    <td align="center">

        <img src="{{ isset($prodcategory['Assets']['data'][0]['links']) ? $prodcategory['Assets']['data'][0]['links']['full'].'?width=52&height=52' : asset('img/no-image.gif')  }}" /></td>
    <td>{{ $prodcategory['status_desc'] }}</td>
    {{-- <td>
            <a href="#">
                <img alt="image"
                    src="{{ config('global.storage') }}/cover_pictures/{{ $album['cover_picture'] }}"
    class="rounded-circle" width="35" data-toggle="title" title="">
    </a>
    </td> --}}

    <td>{{ date("Y-m-d H:i:s",$prodcategory['created_at']) }}</td>
    <td>
        <div class="d-flex">
        <ul class="list-group list-inline ml-1">
  <li class="list-group-item border1"><a href="{{ url('product_categories/'.$id) }}"
                        class=" d-inline font1 view-confirmation" data-toggle="tooltip" data-placement="top" title="View"><i
                            class="fa fa-eye"></i></a></li>
  <li class="list-group-item border1"><a href="{{ url('product_categories/'.$id.'/edit') }}"
                        class=" d-inline text-center font1 edit-confirmation" data-toggle="tooltip" data-placement="top" title="Edit"><i
                            class="fa fa-edit" ></i></a></li>
  <!-- <li class="list-group-item border1"> <form
                    action="{{ route('product_categories.destroy',$id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;"
                        class=" job-delete d-inline font1" data-toggle="tooltip" data-placement="top" title="Delete" > <i
                            class="fa fa-trash" style="position: relative;top:-5;"></i></button>
                </form></li> -->


                <li class="list-group-item border1">
                                                    <form id="delete_from_{{$prodcategory['id']}}" method="POST" action="{{route('product_categories.destroy', $prodcategory['id']) }}">
                    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <div class="form-group">
        <a href="javascript:void(0);" data-id="{{$prodcategory['id']}}" class="_delete_data"  data-toggle="tooltip" data-placement="top" title="Delete" style="background-color:#fff!important;position: relative;top:-1px!important; padding-top:3px!important;padding-bottom:8px!important;">
        <i class="fa fa-trash" style="position: relative;top:-5;color:#01a9ac"></i>
        </a>                    
    </div>
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
    <!-- Page body end -->
</div>






{{-- <script>
    $(function () {
        $('.job-delete').click(function (event) {
            var token = $("meta[name='csrf-token']").attr("content");
            event.preventDefault();
            event.stopPropagation();


            $.ajax({
                type: 'DELETE',
                url: $(this).attr('href'),
                data: {
                    "_token": token
                },
                success: function (response) {
                    alert('Deleted');
                    location.reload();
                }

            });
        });
    });

</script> --}}

</section>
@endsection