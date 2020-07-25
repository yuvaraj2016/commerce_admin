<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Http $client)
    {
       
        $this->client = $client;
    }

    public function index(Request $request,$page = 1)
    {

        //  echo $page;

        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/stockMaster?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $stockmasters = $response['data'];
         $pagination = $response['meta']['pagination'];

          $lastpage = $pagination['total_pages'];

            return view(
                'stock_master_list', compact(
                    'stockmasters', 'pagination','lastpage'
                )
        );
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/item');

            $iresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $items = $iresponse['data'];


         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/itemVariant');

            $ivresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $variants = $ivresponse['data'];



         try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendors');

            $vresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $vendors = $vresponse['data'];



       try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];


            return view(
                'create_stock_master', compact(
                    'items','variants','vendors','statuses',
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


        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/stockMaster',

        [
            "item_id"=>$request->item_id,

            "variant_id"=>$request->variant_id,

            "vendor_id"=>$request->vendor_id,

            "stock_quantity"=>$request->stock_quantity,

            "stock_threshold"=>$request->stock_threshold,

            "status_id"=>$request->status_id

        ]);
        // dd($request->all());

        // dd($response);
        // echo $response->status();exit;

        if($response->status()===201){

            return redirect()->route('stock_masters.create')->with('success','Stock Master Created Successfully!');
        }else{
            // var_dump($response);exit;
          // return dd($response->json());
            $request->flash();
            return redirect()->route('stock_masters.create')->with('error',$response['errors']);
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/stockMaster/'.$id);

            $response = json_decode($call->getBody()->getContents(), true);

        }catch (\Exception $e){



        }
         $stockmaster = $response['data'];



            return view(
                'view_stock_master', compact(
                    'stockmaster'
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

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/stockMaster/'.$id);

        if($response->status()==204){

             return redirect()->route('stock_master.index')->with('success','Stock Master Deleted Sucessfully !..');
        }
        else{

          //  dd($response);
             return redirect()->route('stock_master.index')->with('error',$response->json()['message']);
        }
    }
}
