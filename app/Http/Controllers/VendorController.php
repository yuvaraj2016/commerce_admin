<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VendorController extends Controller
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
        //

        $token = session()->get('token');
        try{

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendors?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $vendors = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

          return view('vendor_list', compact('vendors', 'pagination','lastpage'));
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

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confVendorCat');

            $vcresponse = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $vendorcategories = $vcresponse['data'];



       try{

            $call = $this->client::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
         $statuses = $response['data'];


            return view(
                'create_vendor', compact(
                    'vendorcategories','statuses',
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

            $response = $response->withHeaders(['Accept'=>'application/vnd.api.v1+json'])->post(config('global.url') . '/api/vendors',
            [
            [
                'name' => 'vendor_name',
                'contents' => $request->vendor_name
            ],
            [
                'name' => 'vendor_category_id',
                'contents' => $request->vendor_category_id
            ],
            [
                'name' => 'vendor_desc',
                'contents' => $request->vendor_desc
            ],
            [
                'name' => 'vendor_address',
                'contents' => $request->vendor_address
            ],
            [
                'name' => 'vendor_contact',
                'contents' => $request->vendor_contact
            ],
            [
                'name' => 'vendor_email',
                'contents' => $request->vendor_email
            ],
            [
                'name' => 'status_id',
                'contents' => $request->status_id
            ],

            ]);


        }



        else{
            $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/vendors', [
                "vendor_name"=>$request->vendor_name,
                "vendor_category_id"=>$request->vendor_category_id,
                "vendor_desc"=>$request->vendor_desc,
                "vendor_address"=>$request->vendor_address,
                "vendor_contact"=>$request->vendor_contact,
                "vendor_email"=>$request->vendor_email,
                "status_id"=>$request->status_id,

            ]);
            // dd($response);
        }

        if($response->status()==201){
            return redirect()->route('vendors.create')->with('success','Vendor Created Successfully!');
        }else{
            $request->flash();

            return redirect()->route('vendors.create')->with('error',$response['errors']);
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
        $session = session()->get('token');

        $response=Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->delete(config('global.url').'api/vendors/'.$id);

        if($response->status()==204){

             return redirect()->route('vendor.index')->with('success','Vendor Deleted Sucessfully !..');
        }
        else{

          //  dd($response);
             return redirect()->route('vendor.index')->with('error',$response->json()['message']);
        }

    }
}
