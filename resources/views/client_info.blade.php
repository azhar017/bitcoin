<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Client List</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       </head>
<body>
<div class="alert alert-success">
        <ul>
            <li>{{ $result=\Session::get('result') }}</li>
            <li>{{ $result_seller_data=\Session::get('result_seller_data') }}</li>


        </ul>
    </div>
<?php
//dd($result);
foreach ($result as $value){

        $Blockchain = new \Blockchain\Blockchain($value->api_code);
        $Blockchain->setServiceUrl("http://localhost:3000");
        $Blockchain->Wallet->credentials($value->wallet_id, $value->wallet_pw);
    }
        $active_id = $Blockchain->Wallet->getIdentifier();
        $balance = $Blockchain->Wallet->getBalance();

     
?>

<table class="table">
@foreach ($result as $value)
        <tr>
             <td>    Name </td>
             <td> {{$value->name}}</td>
        </tr>
        <tr>
             <td>  Email </td>
             <td> {{$value->email}}</td>
        </tr>
        <tr>
             <td>  Password </td>
             <td>{{$value->wallet_pw}}</td>
         </tr>
         <tr>
             <td>  Api code  </td>
             <td>{{$value->api_code}}</td>
         </tr>
         <tr>
             <td>  Wallet Id  </td>
              <td>{{$value->wallet_id}}</td>
         </tr>
         <tr>
             <td>  Wallet address </td>
          <td>{{$value->wallet_address}} <img src="https://blockchain.info/qr?data=1Agb153xWsbqS9vt8gP4vBFKHkAchLMdSX&size=200" alt="Smiley face" height="100" width="100"></td>
         </tr>
          <tr>
             <td>  Interested in </td>
              <td>
                {{ $value->client_type === "buyer" ? "Buying" : "Selling" }}
         </tr>

         <tr>
             <td>  Balance in Wallet  </td>$balance
              <td> {{$balance}}BTC</td>
         </tr>
         <tr>
             <td>  Amount Looking for</td>
              <td>{{$value->amount}}</td>
         </tr>
          <tr>
              <td> <a href="send"><input type="button" name="submit" value="Send" > </td></a>
               <td> <a href="receive"><input type="submit" name="submit" value="Receive"> </td></a>
         </tr>      
@endforeach
              
</table>  

<?php
//dd($result);
foreach ($result as $Cli){
   $client_type=$Cli->client_type;
  // $buyer_id=$Cli->id;
} 



?>


<table class="table">
    <tr>
        <th>offer ID</th>
        <th>Seller Name</th>
        <th>Amount Rm</th>
        <th>Amount BTC</th>
        <th>Offer Status </th>
        <th>Progress Status </th>
    </tr>

    @foreach($result_seller_data as $seller)
    <tr>
        <td>{{$seller->seller_id}}</td> 
        <td>{{$seller->seller_name}}</td>
        <td>{{$seller->amount}}</td>
        <td>{{$seller->per_btc}}</td>
        <td><a href="offer/{{$seller->id}}/{{$client_type}}" >make offer</a></td>
         <td>{{$seller->level}}</td>
    </tr>

  @endforeach
    
   