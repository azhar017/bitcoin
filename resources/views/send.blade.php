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

<form id="create_wallet" method="POST" action="send">
                        {{ csrf_field() }}
<table class="table">

         <tr>
             <td>  Bitcoin Address </td>
             <td> <input type="text" name="Address" id="address"></td>
        </tr>
        <tr>
             <td>  Amount transfer </td>
             <td><input type="text" name="Amont" id="amount"> </td>
         </tr>
        
         
         <tr>
            <td> <input type="submit" name="submit" value="Send"> </td>
          
         </tr>

              
    </table>          
</form>