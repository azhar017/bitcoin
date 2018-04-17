<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wallet', function () {
    return view('wallet');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/getmain', function () {
    return view('getmain');
});

Route::post('/create','create@index');

Route::get('/balance','create@balance');

Route::get('/send','create@send');

Route::get('/client','create@client_data');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login','create@login');

// Route::get('/client_info', function () {
//     return view('client_info');
// });

Route::get('/client_info','client_info@index');

Route::post('/send','create@send');


Route::get('/send', function () {
    return view('send');
});

Route::get('/receive', function () {
    return view('receive');
});

Route::get('/offer', function () {
    return view('offer');
});

Route::get('/offer/{offer_id}/{client_type}',['uses'=>'offer@index']);
Route::post('/offer','offer@getoffer');
Route::post('/seller_accept_offer','offer@seller_accept_offer');
Route::post('/buyer_confirm','offer@buyer_confirm');
Route::post('/getbank_acc','offer@getbank_acc');
Route::post('/payment_confirm','offer@payment_confirm');
Route::post('/btc_transfer_confirm','offer@btc_transfer_confirm');

Route::get('/address', function () {

		$address=new address;

		$result_address=$address->all();

	    return view('address')->with("result_address",$result_address);
});

Route::get('/create_address','create@address');




