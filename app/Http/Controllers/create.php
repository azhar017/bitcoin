<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\client;
use App\sell;
use App\address;

class create extends Controller
{ 
	private $api_code='f6ae5b05-11c2-45a3-bfda-9ab0e21fb668';
	private $wallet_id="6df68216-47f1-4e03-8c98-00302461611b";
	private $password="azhar83oo";


	 public function index(Request $request)
    {

    	if($request->submit=="Login")
    			return redirect("login"); 

    	$Blockchain = new \Blockchain\Blockchain($request->api_code);

		$Blockchain->setServiceUrl("http://localhost:3000");

		$wallet = $Blockchain->Create->create($request->password, $email=null, $label=null);
				
		$client_model=new client;
		$msg=$client_model->create($wallet,$request);



		return redirect()->back()->with('success', $msg);   

     }


     public function balance(){

     	$api_code=$this->api_code;
     	$wallet_id=$this->wallet_id;
     	$password=$this->password;

     	$Blockchain = new \Blockchain\Blockchain($api_code);
		$Blockchain->setServiceUrl("http://localhost:3000");
		$Blockchain->Wallet->credentials($wallet_id, $password);

		$active_id = $Blockchain->Wallet->getIdentifier();
		$balance = $Blockchain->Wallet->getBalance();



		return "Your balance is :".$balance;

     }

     public function address(){

        $api_code=$this->api_code;
        $wallet_id=$this->wallet_id;
        $password=$this->password;

        $Blockchain = new \Blockchain\Blockchain($api_code);
        $Blockchain->setServiceUrl("http://localhost:3000");
        $Blockchain->Wallet->credentials($wallet_id, $password);

        $active_id = $Blockchain->Wallet->getIdentifier();
        //$balance = $Blockchain->Wallet->getBalance();
        $addresses = $Blockchain->Wallet->getAddresses();
        $new_address = $Blockchain->Wallet->getNewAddress($label=null);

        echo "new address is :".$new_address->address;


        $create_address=new address;

        $create_address->address=$new_address->address;
        $create_address->amount=0;

        $create_address->save();




        return redirect("address")->with("address_info",$addresses);

     }

     public function send(){

     	$api_code=$this->api_code;
     	$wallet_id=$this->wallet_id;
     	$password=$this->password;

     	$to_address="1Gvf1UEBWYK5huki3r6GN8fUChk4QuDnkT";
     	
     	$amount="0.0005";
     	$fee="0.0001";    	


     	$Blockchain = new \Blockchain\Blockchain($api_code);
		$Blockchain->setServiceUrl("http://localhost:3000");
		$Blockchain->Wallet->credentials($wallet_id, $password);

		$response = $Blockchain->Wallet->send($to_address, $amount, null, $fee);

		return "Send Info is:".$response;

     }


     public function client_data(){

     	$client_data=new client;
		$client_list=$client_data->client_list();

		return view("client_list")->with('client_list', $client_list);  

     }

     public function login(Request $request){

     	$result=0;
     	$login_data=new client;
     	$result=$login_data->login_check($request);

        $seller_data=new sell;
        $result_seller_data=$seller_data->get_data();

        //dd($result_seller_data);


     	if($result->count()){
     		return redirect("client_info")->with('result', $result)->with('result_seller_data',$result_seller_data);
        }
        else
     		return "fail";

     }


}
