<?php
     //   $client_type="sellere" ;
       
?>     

 @if (\Session::has('level'))
    <?php  $level= \Session::get('level'); echo "this is level".$level;?>                           
 @endif
  @if (\Session::has('offer_id'))
    <?php  $offer_id= \Session::get('offer_id'); echo "this is offer_id".$offer_id;?>                           
 @endif

  @if (\Session::has('client_type'))
    <?php  $client_type= \Session::get('client_type'); echo "this is offer_id".$client_type;?>                           
 @endif

 @if($client_type!="seller")

    @if($level=="1")
     <form id="create_wallet" method="POST" action="offer">
                            {{ csrf_field() }}
    <table class="table">
                <tr>
                     <td>  Offer how much want to buy: </td>
                     <td> <input type="text" name="amount" id="amount"></td>
                </tr>
                <tr>
                     <td>  Offer per BIT </td>
                     <td><input type="text" name="prize" id="prize"> </td>
                     <input type="hidden" name="offer_id" id="offer_id" value="<?php echo $offer_id?>">
                     <input type="hidden" name="client_type" id="client_type" value="<?php echo $client_type?>">
                 </tr>
                        
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @else
                 <tr>
                    <td> <input type="submit" name="submit" value="offer"> </td>
                  
                 </tr>
                 @endif

            </table>          
        </form>
     @endif

    @if($level=="2")
        <h1> Offer has been successfully send to buy and wait for reply</h1>
    @endif

    @if($level=="3")
     <form id="create_wallet" method="POST" action="buyer_confirm">
                        {{ csrf_field() }}
<table class="table">

            @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
             @else

            <tr>
                 <td>Seller has accepted the offer plz cofirm </td>
                 
            </tr>
                <input type="hidden" name="offer_id" id="offer_id" value="<?php echo $offer_id?>">
                <input type="hidden" name="client_type" id="client_type" value="<?php echo $client_type?>">
             <tr>
                <td> <input type="submit" name="submit" value="Comfirm"> </td>
              
             </tr>

             @endif
                  
        </table>          
    </form>  
       

 @endif

    @if($level=="4")
        <h1>You have comfirm to do the trade with seller (seller name) and wait for his bank acc number</h1>
    @endif


 @if($level=="5")
     <form id="create_wallet" method="POST" action="payment_confirm">
                        {{ csrf_field() }}
<table class="table">
 @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
             @else

            <td>  Amount Transfer</td>
                     <td> <input type="text" name="amount_transfer" id="amount"></td>
            </tr>
             <tr>
                 <td>have you made the payment.Please confirm </td>
                  <input type="hidden" name="offer_id" id="offer_id" value="<?php echo $offer_id?>">
                  <input type="hidden" name="client_type" id="client_type" value="<?php echo $client_type?>">
            </tr>
               
             <tr>
                <td> <input type="submit" name="submit" value="Comfirm"> </td>
              
             </tr>

             @endif
                  
        </table>          
    </form>  
       

 @endif  

 @if($level=="6")
        <h1>thank for payment confirmation and once seller have confime you will get your BTC</h1>
 @endif


@else

<?php $amount=0.1; $per_btc=7000;?>

         @if($level=="1")
        <h1>You dont have any offer yet!!</h1>
        @endif
        @if($level=="2")
           
                <form id="create_wallet" method="POST" action="seller_accept_offer">
                                        {{ csrf_field() }}
                <table class="table">

                      <tr>

                        <td>  Buyer offer </td>
                        <td> {{$amount}}</td>
                      <input type="hidden" name="offer_id" id="offer_id" value="<?php echo $offer_id?>">
                      <input type="hidden" name="client_type" id="client_type" value="<?php echo $client_type?>">
                       </tr>
                        <tr>
                             <td>per bt</td>
                             <td>{{$per_btc}}</td>
                         </tr>
                 @if(\Session::has('success'))
                       <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @else
                         <tr>
                            <td>Do you Agree? </td>
                            <input type="hidden" name="agreemnet" value="ok">
                            <td> <input type="submit" name="submit" value="Agree"> </td>
                          
                         </tr>
                    @endif

                              
                    </table>          
                </form>
           @endif

    @if($level=="3")
        <h1>You have accpet the offer of buyer.Wait to buyer to comfirm</h1>
    @endif

        @if($level=="4")
            <form id="create_wallet" method="POST" action="getbank_acc">
                                {{ csrf_field() }}
            <table class="table">
                 <input type="hidden" name="offer_id" id="offer_id" value="<?php echo $offer_id?>">
                 <input type="hidden" name="client_type" id="client_type" value="<?php echo $client_type?>">

                 @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                 @else
                    <tr>
                         <td> Buyer has confirm to buy:</td>
                         <td> Plz send bank address</td>
                    </tr>
                    <tr>
                         <td> Bank name</td>
                         <td><input type="text" name="bank_name" id="prize"> </td>
                     </tr>
                      <tr>
                         <td> Bank Acc</td>
                         <td><input type="text" name="bank_acc" id="prize"> </td>
                     </tr>
                            
                       
                     <tr>
                        <td> <input type="submit" name="submit" value="Send"> </td>
                      
                     </tr>
                     @endif

                          
                </table>          
            </form>
        @endif

    @if($level=="5")
        <h1>You have send the buyer your bank accont number and will get money soon..</h1>
    @endif
    @if($level=="6")
     <form id="create_wallet" method="POST" action="btc_transfer_confirm">
                        {{ csrf_field() }}
                         <input type="hidden" name="offer_id" id="offer_id" value="<?php echo $offer_id?>">
                         <input type="hidden" name="client_type" id="client_type" value="<?php echo $client_type?>">
        <table class="table">

            @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
             @else

            <tr>
                 <td>Seller has made the payment plz confirm.Once confirm,your bit coin will be transfer to buyer </td>
                 
            </tr>
               
             <tr>
                <td> <input type="submit" name="submit" value="Final Comfirm"> </td>
              
             </tr>

             @endif
                  
        </table>          
    </form>  

    @endif

@endif