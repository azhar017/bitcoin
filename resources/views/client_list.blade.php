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

<table class="table">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>api_code</th>
		<th>wallet_address</th>
		<th>wallet_id</th>
		<th>wallet_pw</th>
		
	</tr>


	

		@foreach ($client_list as $user)
				<tr>
   				 <td>{{ $user->name }}</td>
   				 <td>{{ $user->email }}</td>
   				 <td>{{ $user->api_code }}</td>
   				 <td>{{ $user->wallet_address }}</td>
   				 <td>{{ $user->wallet_id }}</td>
   				 <td>{{ $user->wallet_pw }}</td>
   				</tr>
		@endforeach

</table>

</body>

</html>


		
	


