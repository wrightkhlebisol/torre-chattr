<?php

namespace App\Http\Controllers;

use App\Chattr;
use App\Jobs;
use App\TorreDetail;
use Facade\FlareClient\Http\Response;
use FFI\CData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChattrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chattrs = Chattr::all();
        return view('home', ['chattrs' => $chattrs]);
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

    Public function getTorreUserDetails(Request $request){
        $torre_username = $request->user;
        $response = Http::get('https://bio.torre.co/api/bios/' . $torre_username);
        if($response->successful()){
            return $response->json();
        }else{
            return $response->body();
        }
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
        $torre_username = $request->user;
        $chattr_data = $request->chattr;
        $createdTorreUser = TorreDetail::firstOrCreate([
            'torre_username' => $torre_username
        ]);



        $latestChattr = Chattr::create([
            'job_id' => 1,
            'torre_details_id' => $createdTorreUser->id,
            'chattr' => $chattr_data
        ]);
        // $userId = $createdTorreUser;
        return $latestChattr;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chattr  $chattr
     * @return \Illuminate\Http\Response
     */
    public function show(Chattr $chattr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chattr  $chattr
     * @return \Illuminate\Http\Response
     */
    public function edit(Chattr $chattr)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chattr  $chattr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chattr $chattr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chattr  $chattr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chattr $chattr)
    {
        //
    }
}
