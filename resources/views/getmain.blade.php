<?php

$url = "http://localhost:3000/api/V2/create";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);
echo $obj->error;
dd($obj);

?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <form id="create_wallet" method="POST" action="http://localhost:3000/api/v2/create">
                        @csrf
               Password : <input type="text" name="password" id="password"><br>
               Api code : <input type="text" name="api_code" id="api_code"><br>

               <input type="submit" name="submit">
            </form>

            <div id="container">
                   

            </div>

        <script>
            $(document).ready(function () {

                $("#create_wallet").submit(function(e){

                    e.preventDefault();
                            var load_url = jQuery(this).attr('action');
             alert(load_url);
              var password=$('#password').val();
              var api_code= $('#api_code').val();
                
                  $.ajax({

              // The 'type' property sets the HTTP method.
              // A value of 'PUT' or 'DELETE' will trigger a preflight request.
              type: 'GET',

              // The URL to make the request to.

              
              url: load_url,
             // var load_url = jQuery(this).attr('action');
              // The 'contentType' property sets the 'Content-Type' header.
              // The JQuery default for this property is
              // 'application/x-www-form-urlencoded; charset=UTF-8', which does not trigger
              // a preflight. If you set this value to anything other than
              // application/x-www-form-urlencoded, multipart/form-data, or text/plain,
              // you will trigger a preflight request.
              contentType: 'text/plain',

              xhrFields: {
                // The 'xhrFields' property sets additional fields on the XMLHttpRequest.
                // This can be used to set the 'withCredentials' property.
                // Set the value to 'true' if you'd like to pass cookies to the server.
                // If this is enabled, your server must respond with the header
                // 'Access-Control-Allow-Credentials: true'.
                withCredentials: false
              },

              headers: {
                // Set any custom headers here.
                // If you set any non-simple headers, your server must include these
                // headers in the 'Access-Control-Allow-Headers' response header.
              },
            data:{

                "password":password,
                "api_code":api_code

            },
              success: function() {
                // Here's where you handle a successful response.

                alert('hi successful');
              },

              error: function() {
                // Here's where you handle an error response.
                // Note that if the error was due to a CORS issue,
                // this function will still fire, but there won't be any additional
                // information about the error.
              }
            });
        });
});

</script>


    </body>

