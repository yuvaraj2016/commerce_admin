<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$page = 1)
    {
        //

           //  echo $page;

           $token = session()->get('token');
           try{
   
               $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/stockTracker?page='.$page);
   
               $response = json_decode($call->getBody()->getContents(), true);
               //  return $response;
           }catch (\Exception $e){
               //buy a beer
   
   
           }
            $stocktracker = $response['data'];
            $pagination = $response['meta']['pagination'];
   
             $lastpage = $pagination['total_pages'];
   
               return view(
                   'stock_tracker_list', compact(
                       'stocktracker', 'pagination','lastpage'
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

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/suppliers');

            $sresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $suppliers = $sresponse['data'];



       try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];


            return view(
                'create_stock_tracker', compact(
                    'items','variants','suppliers','statuses',
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


        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/stockTracker',

        [
            "item_id"=>$request->item_id,

            "variant_id"=>$request->variant_id,

            "supplier_id"=>$request->supplier_id,

            "purchase_order_ref"=>$request->purchase_order_ref,

            "purchase_order_date"=>$request->purchase_order_date,

            "purchase_price"=>$request->purchase_price,

            "stock_quantity"=>$request->stock_quantity,

            "comments"=>$request->comments,

            "status_id"=>$request->status_id

        ]);
        // dd($request->all());

        // dd($response);
        // echo $response->status();exit;

        if($response->status()===201){

            return redirect()->route('stock_tracker.create')->with('success','Stock Tracker Created Successfully!');
        }else{
            // var_dump($response);exit;
          // return dd($response->json());
            $request->flash();
            return redirect()->route('stock_tracker.create')->with('error',$response['errors']);
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
        //
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
