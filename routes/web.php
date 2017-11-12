<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('braintree/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');

Route::post('/checkout/{tier}', function(Request $request, $tier) {
    $user = Auth::user();

    $user->newSubscription('main', "tier$tier")->create($_POST['payment_method_nonce'], [
        'email' => 'joticmirko@gmail.com',
    ]);
    echo(json_encode($user));
    echo(json_encode($tier));
    echo(json_encode($_POST));
})->where('tier', '[1-3]');



