<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sell;

class client_info extends Controller
{
    //

    public function index(){
    		  // $seller_data=new sell;
        // $result_seller_data=$seller_data->get_data();

       
    	return view('client_info');
    }
}
