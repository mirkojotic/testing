<?php

use Illuminate\Http\Request;
use Braintree\ClientToken;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/token', function (Request $request) {
	$token = ClientToken::generate();
	die(json_encode($token));
});


Route::middleware('auth:api')->get('/subscribe', function (Request $request) {
	$user = Auth::user();
	/*
		$user->newSubscription('main', 'monthly')->create([
			'' => ''
		]);
	*/
	die(json_encode($user));
});
