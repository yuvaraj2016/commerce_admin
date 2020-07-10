@extends('layouts.app')
@section('content')



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
        <a href="{{ route('product_sub_categories.create') }}" class="btn btn-primary">Add New</a>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid m-2">
                    <div class="row">
                        <div class="col">
                             <h4>Product Sub Category List</h4>
                        </div>

                    <div class="col">
                        <ul id="pagination" class="float-right m-0 p-0">
                        <li><a href="{{ route('product_sub_cat.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('product_sub_cat.index',$page) }}" class="btn btn-primary">Previous</a></li>
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
                        <li> <a href="{{ route('product_sub_cat.index',$page) }}" class="btn btn-primary">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('product_sub_cat.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                                    <th>Category Desc</th>
                                    <th>Sub Category Short Code</th>
                                    <th>Sub Category Desc</th>
                                    <th>Sub Category Image</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                {{-- @dd($prodcategories) --}}
                                @foreach($prodsubcategories as $prodsubcategory )
                                    @php
                                        $id=$prodsubcategory['id'];
                                    @endphp

                                    <tr>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $prodsubcategory['category_desc'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                                style="padding-top:10px;">{{ $prodsubcategory['sub_category_short_code'] }}</span>

                                        </td>
                                        <td>
                                            {{ $prodsubcategory['sub_category_desc'] }}
                                        </td>
                                        <td><img src="{{ isset($prodsubcategory['Assets']['data']['links']) ? $prodsubcategory['Assets']['data']['links']['thumb'] : asset('img/no-image.gif')  }}" style="width:100px;height:auto;"/></td>
                                        <td>{{ $prodsubcategory['status_desc'] }}</td>
                                        {{-- <td>
                                            <a href="#">
                                                <img alt="image"
                                                    src="{{ config('global.storage') }}/cover_pictures/{{ $album['cover_picture'] }}"
                                                    class="rounded-circle" width="35" data-toggle="title" title="">
                                            </a>
                                        </td> --}}

                                        <td>{{ date("Y-m-d H:i:s",$prodsubcategory['created_at']) }}</td>
                                        <td>
                                            <div class="d-flex">

                                                <a href="{{ url('product_sub_categories/'.$id) }}"
                                                    class="badge badge-primary d-inline"><i
                                                        class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                                                <a href="{{ url('product_sub_categories/'.$id.'/edit') }}"
                                                    class="badge badge-info d-inline"><i
                                                        class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a href="{{ action('AlbumController@destroy', $id) }}"
                                                    class="job-delete badge badge-danger d-inline"><i
                                                        class="fas fa-trash"></i>Deletes</a> --}}

                                                <form
                                                    action="{{ route('product_sub_categories.destroy',$id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="job-delete badge badge-danger d-inline"> <i
                                                            class="fas fa-trash"></i>Delete</button>
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
