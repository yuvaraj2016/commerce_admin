<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
class ProductCategoryController extends Controller
{
    public function __construct(Http $client)
    {
        $this->client = $client;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$page = 1)
    {

        //  echo $page;

        $token = session()->get('token');
        try{

            $call = $this->client::withToken($token)->get(config('global.url') . '/api/prodCat?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $prodcategories = $response['data'];
         $pagination = $response['meta']['pagination'];

          $lastpage = $pagination['total_pages'];
        //  $current_page = $pagination['current_page'];

        //  if($numOfpages > 1)
        //  {
        //     $has_next_page = true;
        //     $has_previous_page = true;
        //  }
        //  if($current_page > 1 && $current_page<= $numOfpages)
        //  {
        //     $next_page = $current_page+1;

        //  }
        //  else if($current_page == 1 && $current_page != $numOfpages){
        //     $next_page = $current_page+1;
        //     $has_previous_page = false;
        //  }

        //  else if($current_page == $numOfpages){
        //      $next_page = '';
        //     $has_next_page = false;
        //  }
        // //  $next_page = $pagination['total_pages'];
        //  $next= $pagination['links']['next'];

        //  return  $next_page;
        // return view(
        //     'product_category_list', compact(
        //         'prodcategories', 'pagination','current_page',
        //         'has_next_page', 'has_previous_page', 'next_page',
        //     )

            return view(
                'product_category_list', compact(
                    'prodcategories', 'pagination','lastpage'
                )
        );

        // if (isset($url)) {
        //     $response = Http::withToken($token)->get($url);
        // } else {
        //     $response = Http::withToken($token)->get(config('global.url') . '/api/prodCat');
        // }
        // // return $response;
        // $prodcategories = $response->json();

        // return view('product_category_list', ['prodcategories' => $prodcategories, 'token' => $token]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
