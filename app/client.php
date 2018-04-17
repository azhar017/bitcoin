<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class client extends Model
{
    //

    public function create($wallet,$request)
    {

    	$client=new client;

    	$client->name=$request->name;
    	$client->email=$request->email;
    	$client->wallet_pw=$request->password;
    	$client->api_code=$request->api_code;
    	$client->client_type=$request->client_type;
    	$client->amount=$request->amount;
    	$client->wallet_id=$wallet->guid;
    	$client->wallet_address=$wallet->address;


    	$client->save();

    	return "Register successful";
    }


    public function client_list()
    {

    	$client=new client;

    	$client_list=$client::all();

    	return $client_list;
    }

    public function login_check($request)
    {
    	$client_list=client::where("wallet_pw",$request->password)->where("email",$request->email)->get();
    	//$row=row_count($client_list);
    	//echo "FUCK".$client_list['name'];
    	
    	
    	return $client_list;
    }

}
