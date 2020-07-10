<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function login(Request $request)
    {
        // echo config('global.url');exit;
        $respose = Http::withHeaders([
            'Accept' => 'application/vnd.api.v1+json',
            'Content-Type' => 'application/json'
        ])->post(config('global.url').'/oauth/token', [
            "grant_type" => "password",
            "client_id" => 2,
            "client_secret" => "Hridhamtech",
            "username" => $request->username,
            "password" => $request->password,
            "scope" => ''
        ]);
        if($respose->ok()){
        $request->session()->put('token',$respose->json()['access_token']);
        $request->session()->save();
        return redirect()->route('product_cat.index');
        }
        else{

            return redirect()->route('home')->with($respose->json());
        }
        //  return 1;
        //
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
