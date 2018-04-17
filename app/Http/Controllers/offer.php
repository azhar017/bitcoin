<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\deal;

class offer extends Controller
{	
		//public $level=1;

	public function index($offer_id,$client_type)
	{
			//$level=$this->level;
		
			$offer_level=new deal;

			$level=$offer_level->get_data($offer_id);

			if($level=="0")
				$offer_level->create($offer_id);

			return redirect('offer')->with('level', $level)->with('offer_id',$offer_id)->with('client_type',$client_type); 
			
	}

    public function getoffer(Request $request)
    {
    	//here send request to model and save in data base offer.db    	
    	
    	//$msg=$client_model->create($wallet,$request);

    	$msg="Offer has been successfully send to buy and wait for reply";
    	    	$offer_level=new deal;

		$offer_level->update2($request->offer_id); 
		 //here update deal progress level both deal and seller table

    	$level=$offer_level->get_data($request->offer_id);

		return redirect()->back()->with('success', $msg)->with('level', $level)->with('client_type',$request->client_type); 

    	//return redirect("offer")->with('offer succssfully send',);
    }    

    public function seller_accept_offer(Request $request)
    {
    	//here send seller agrement to  to model and save in data base offer.db
    	
    	//probaly seller_accept colum in offer.db mostly flag 0 and 1
    	//$msg=$client_model->create($wallet,$request);

    	$msg="You have accpet the offer of buyer.Wait to buyer to comfirm";
    
		//return redirect("offer")->with('success', $msg[0])->with('level', $msg[1]); 

    	//return redirect("offer")->with('offer succssfully send',);

    	$offer_level=new deal;
		$offer_level->update2($request->offer_id);
		$level=$offer_level->get_data($request->offer_id);
		return redirect()->back()->with('success', $msg)->with('level', $level)->with('client_type',$request->client_type);
    }

    public function buyer_confirm(Request $request)
    {
    	//here buyer has confirm the the trade and ask the seller to share the back acc
    	$msg="You have comfirm to do the trade with seller (seller name) and wait for his bank acc number" ;
		
		 $offer_level=new deal;
		$offer_level->update2($request->offer_id);
		$level=$offer_level->get_data($request->offer_id);
		return redirect()->back()->with('success', $msg)->with('level', $level)->with('client_type',$request->client_type);
    }

    public function getbank_acc(Request $request)
    {
    	//here seller have received the confirmation from buyer and ready to send the bank account
    	$msg="You have send the buyer your bank accont number and will get money soon..";
		$offer_level=new deal;
		$offer_level->update2($request->offer_id);
		$level=$offer_level->get_data($request->offer_id);
		return redirect()->back()->with('success', $msg)->with('level', $level)->with('client_type',$request->client_type);
    }

    public function payment_confirm(Request $request)
    {
    	//here buyer have made the payment to seller 
    	$msg="thank for payment confirmation and once seller have confime you will get your BTC";

		$offer_level=new deal;
		$offer_level->update2($request->offer_id);
		$level=$offer_level->get_data($request->offer_id);
		return redirect()->back()->with('success', $msg)->with('level', $level)->with('client_type',$request->client_type); 

    }

    public function btc_transfer_confirm(Request $request)
    {
    	//here buyer have made the payment to seller 
    	$msg[0]="thank for the business your bitcoin has been transfer";

		return redirect("offer")->with('success', $msg[0]); 

    }



}


