<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Http $client)
    {
        if(session()->has('token'))
        {
            // session()->flush();
            // echo "sadf";exit;
        }
        else {

            return redirect()->route('home');
        }
        $this->client = $client;
    }


    public function index(Request $request,$page = 1)
    {
        //

        $token = session()->get('token');
        try{

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/item?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $items = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

          return view('item_list', compact('items', 'pagination','lastpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $token = session()->get('token');

        try{

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/prodSubCat');

            $scresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $subcategories = $scresponse['data'];





        try{

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendors');

            $vresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $vendors = $vresponse['data'];


        try{

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];


            return view(
                'create_item', compact(
                    'subcategories','vendors','statuses',
                )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = session()->get('token');
        $fileext = '';
        $filename = '';
        if ($request->file('file') !== null) {

            $files =$request->file('file');
            $response = Http::withToken($session);
            foreach($files as $k => $ufile)
            {
                $filename = fopen($ufile, 'r');
                $fileext = $ufile->getClientOriginalName();
                $response = $response->attach('file['.$k.']', $filename,$fileext);
            }

            $response = $response->withHeaders(['Accept'=>'application/vnd.api.v1+json'])->post(config('global.url') . '/api/item',
            [
            [
                'name' => 'item_code',
                'contents' => $request->item_code
            ],
            [
                'name' => 'item_desc',
                'contents' => $request->item_desc
            ],
            [
                'name' => 'sub_category_id',
                'contents' => $request->sub_category_id
            ],
            [
                'name' => 'status_id',
                'contents' => $request->status_id
            ],
            [
                'name' => 'vendor_store_id',
                'contents' => $request->vendor_store_id
            ]

            ]);


        }



        else{
            $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/item', [
                "item_code"=>$request->item_code,
                "item_desc"=>$request->item_desc,
                "sub_category_id"=>$request->sub_category_id,
                "status_id"=>$request->status_id,
                "vendor_store_id"=>$request->vendor_store_id

            ]);
            // dd($response);
        }

        if($response->status()==201){
            return redirect()->route('items.create')->with('success','Item Created Successfully!');
        }else{
            $request->flash();

            return redirect()->route('items.create')->with('error',$response['errors']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $token = session()->get('token');

        try{

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/item/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);

        }catch (\Exception $e){



        }
         $item = $response['data'];



            return view(
                'view_item', compact(
                    'item'
                )
        );
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
        $session = session()->get('token');

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/item/'.$id);
       // return $response->status();
        // if($response->serverError()){
        //     $error=[['Server Error'],['Please Delete All Photos to this Album']];
        //     return redirect()->route('albums.index')->with('error',$error);
        // }
        // if($response->headers()['Content-Type'][0]=="text/html; charset=UTF-8"){
        //     return redirect()->route('home');
        // }
        if($response->status()==204){

             return redirect()->route('item.index')->with('success','Item Deleted Sucessfully !..');
        }
        else{

          //  dd($response);
             return redirect()->route('item.index')->with('error',$response->json()['message']);
        }
    }

}
