<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpesaController extends Controller
{
    //

    public function getAccessToken(){
         $url = env('MPESA_ENV')==0? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials':
         'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
         $curl = curl_init($url);
         curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADERS => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER =>true,
                CURLOPT_HEADER=>false,
                CURLOPT_USERPWD=> env('MPESA_CONSUMER_KEY'). ':' . env('MPESA_CONSUMER_SECRET')
            )
         );
         $response = curl_exec($curl);
         \curl_close($curl);

         return $response;

    }
public function makeHttp($url, $body){
    
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL =>$url,
            CURLOPT_HTTPHEADER => array('Content-type:application/json','Authorization:Bearer'.$this.getAccessToken()),
            CURLOPT_RETURNTRANSFER =>true,
            CURLOPT_POST=>true,
            CURLOPT_POST=> json_encode($body)
        )

    ); 
    $curl_response = curl_exec($curl);
    curl_close($curl);
    return $curl_respose;
}
    public function stkPush( Request $request){
/*  'password': 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjExMTMwMTg1ODQy', */
 $password =env('MPESA_ST_SHORTCODE').env('MPESA_PASSKEY').$timestamp;
 $timestamp = date('YmdHis');
 $curl_post_data = array(

    'BusinessShortCode' => env('MPESA_ST_SHORTCODE'),
    'Timestamp' => $timestamp,
    'password' => $password,
    'TransactionType'=>'CustomerPayBillOnline',
    'Amount'=>$request->amount,
    'PartyA' => $request->phone,/* 254708374149 */
    'PartyB'=> 174379,
    'PhoneNumber' => env('MPESA_ST_SHORTCODE'),
    'CallBackURL' =>env('MPESA_TEST_URL'). '/stkpush',
    'AccountReference' => $request->account,
    'TransactionDesc'=> $request->account 
 );

 $url = '';
 $response = $this->makeHttp($url, $curl_post_data);

 return $response;
    }

}