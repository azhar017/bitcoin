<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\deal;
use App\sell;

class deal extends Model
{
    //
	public function create($id)
	{
		$seller=sell::find($id);

		$offer=new deal;

		$offer->sel_id=10;
		$offer->buy_id=$seller->seller_id;
		$offer->level=$seller->level;
		$offer->offer_id=$seller->id;
		$offer->save();

	} 


	public function get_data($offer_id)
	{
		$offer=deal::find($offer_id);

		if($offer)
		return $offer->level;	
		else
		return "0";
		
	}

	public function update2($id)
	{	

		$offer2=deal::find($id);			
		$new_level= $offer2->level +1;
		$offer2->level= $new_level;
		$offer2->save();

		$offer_sell=sell::find($id);


		$offer_sell->level=$new_level;
		$offer_sell->save();

		$offer_sell=sell::find($id);
		//dd($offer_sell);

	}
	public function update_sell_level($id)
	{	
		$new_level= $offer2->level +1;

		$offer2->level= $new_level;

		$offer2->save();

	}

	public function transfer($id)
	{	

	}
}
