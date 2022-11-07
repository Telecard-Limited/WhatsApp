<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;


class WhatsAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    
    public function index(Request $request)
    {

        dump($request->all());
        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '110829038490956',
            'access_token' => 'EAAJVc3j40G8BAFH4mcdKDCLRHyucTrNcRZC0k9zjtQyO9iPmZBCSwMYFyZCWWR4kofFmCvbOsPB36kkREJyJvK9KZAQDxZAoXKmfbeYi2SPEbOjU0Wdo8QT5yLkXtHlF2c2wW2EbZBdAQdRqZANQltjsMg7ia3A9QaXyqS8NaM8XaZASk9aVpcXmZAXAz3P9I3G2ABYqgqKLEeQZDZD',
            //'verify_token' => 'umer',
        ]);
        
        $whatsapp_cloud_api->sendTextMessage('923462901820', 'Hello Najam');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
    

        $verify_token = env('VERIFY_TOKEN');
        dump($request);
        $challenge = $request->hub_challenge;
        $mode = $request->hub_mode;
        $token = $request->hub_verify_token;

        if( $mode && $token ){

            if($mode === 'subscribe' && $token === $verify_token ){
                return response($challenge, 200);
                
            }else{
                return response(403);
            }

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
