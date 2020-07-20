@extends('layouts.app')
@section('content')



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
        <a href="{{ route('item_variants.create') }}" class="btn btn-primary">Add New</a>
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
                             <h4>Item Variants List</h4>
                        </div>

                    <div class="col">
                        <ul id="pagination" class="float-right m-0 p-0">
                        <li><a href="{{ route('item_variant.index',$page=1) }}" class="btn btn-primary @if($pagination['current_page']==1) {{ "disabled" }} @endif">First</a></li>
                        @php
                        if(isset($pagination['links']['previous']))
                        {
                                # code...
                                $endurl = explode("?page=",$pagination['links']['previous']);
                                $page = $endurl[1];

                        @endphp
                        <li><a href="{{ route('item_variant.index',$page) }}" class="btn btn-primary">Previous</a></li>
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
                        <li> <a href="{{ route('item_variant.index',$page) }}" class="btn btn-primary">Next</a></li>
                        @php
                            }

                        @endphp

                        @php
                        if($pagination['total_pages']>1)
                        {
                        @endphp
                        <li> <a href="{{ route('item_variant.index',$pagination['total_pages']) }}" class="btn btn-primary float-right">Last</a> </li>

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
                                    <th>Item Desc</th>
                                    <th>Variant Code</th>
                                    <th>Variant Desc</th>
                                    <th>Variant Image</th>
                                    <th>Status</th>
                                    {{-- <th>Created At</th> --}}
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                {{-- @dd($prodcategories) --}}
                                @foreach($item_variants as $item_variant )
                                    @php
                                        $id=$item_variant['id'];
                                    @endphp

                                    <tr>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $item_variant['item_desc'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                                style="padding-top:10px;">{{ $item_variant['variant_code'] }}</span>

                                        </td>
                                        <td><span class="text-center justify-content-center"
                                            style="padding-top:10px;">{{ $item_variant['variant_desc'] }}</span>

                                        </td>

                                        <td><img src="{{ isset($item_variant['Assets']['data'][0]['links']) ? $item_variant['Assets']['data'][0]['links']['full'].'?width=52&height=52' : asset('img/no-image.gif')  }}"/></td>

                                        <td>{{ $item_variant['status_desc'] }}</td>

                                        {{-- <td>{{ date("Y-m-d H:i:s",$item_variant['created_at']) }}</td> --}}
                                        <td>
                                            <div class="d-flex">

                                                <a href="{{ url('item_variants/'.$id) }}"
                                                    class="badge badge-primary d-inline"><i
                                                        class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                                                <a href="{{ url('item_variants/'.$id.'/edit') }}"
                                                    class="badge badge-info d-inline"><i
                                                        class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a href="{{ action('AlbumController@destroy', $id) }}"
                                                    class="job-delete badge badge-danger d-inline"><i
                                                        class="fas fa-trash"></i>Deletes</a> --}}

                                                <form
                                                    action="{{ route('item_variants.destroy',$id) }}"
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


</section>
@endsection
