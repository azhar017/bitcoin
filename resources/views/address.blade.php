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

<?php
if(null!=Session::get('address_info'))
	$result=\Session::get('address_info');
?>

<a href="create_address" class="btn"> Create New Address </a><br>

@if(isset($result))
		@foreach($result as $value)
		<br>
			Balance is:	{{$value->balance}} 
			Address is	{{$value->address}}
		@endforeach

@endif

<table class="table" style="width:70%;" align="center" border="1">
	<tr>
		<th>Address</th>
		<th>Amount</th>
		<th>Ower_id</th>
		<th>Type (Seller/Buyer)</th>
	</tr>
	@foreach($result_address as $value_address)
	<tr>
		<td>{{$value_address->address}}</td>
		<td>{{$value_address->amount}}</td>
		<td>{{$value_address->amount}}</td>
		<td>{{$value_address->amount}}</td>
		

	</tr>
	@endforeach
</table>


