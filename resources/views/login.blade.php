 <form id="create_wallet" method="POST" action="login">
                        {{ csrf_field() }}
<table class="table">

        
        <tr>
             <td>  Email </td>
             <td> <input type="text" name="email" id="email"></td>
        </tr>
        <tr>
             <td>  Password </td>
             <td><input type="password" name="password" id="password"> </td>
         </tr>
        
         
         <tr>
            <td> <input type="submit" name="submit" value="Register"> </td>
          
         </tr>

              
    </table>          
</form>
