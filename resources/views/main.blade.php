 <form id="create_wallet" method="POST" action="create">
                        {{ csrf_field() }}
<table class="table">

        <tr>
             <td>    Name </td>
             <td> <input type="text" name="name" id="name"></td>
        </tr>
        <tr>
             <td>  Email </td>
             <td> <input type="text" name="email" id="email"></td>
        </tr>
        <tr>
             <td>  Password </td>
             <td><input type="text" name="password" id="password"> </td>
         </tr>
         <tr>
             <td>  Api code  </td>
             <td><input type="hidden" name="api_code" id="api_code" value="f6ae5b05-11c2-45a3-bfda-9ab0e21fb668"></td>
         </tr>
         <tr>
             <td>  Interested to be :  </td>
             <td>
                    <select name="client_type" >
                            <option value="">Choose</option>
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>

                     </select>   
             </td>
         </tr>
         <tr>
             <td>  Amount  </td>
             <td><input type="text" name="amount" id="amount"></td>
         </tr>
         <tr>
            <td> <input type="submit" name="submit" value="Register"> </td>
            <td> <input type="submit" name="submit" value="Login"> </td>
         </tr>

              
    </table>          
</form>

@if(\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif


<a href="balance" class="btn btn-info"> Check Balance </a><br>
<a href="send" class="btn"> Send BIC </a><br>

<a href="client" class="btn"> Check Clients Info </a><br>
<a href="address" class="btn">  Address Info </a><br>


