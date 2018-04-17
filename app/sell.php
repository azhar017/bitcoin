<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sell extends Model
{
    //

    public function get_data(){

    	$result=sell::all();

    	return $result;
    }
}
