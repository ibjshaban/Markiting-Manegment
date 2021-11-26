<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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

Route::group(['middleware' => 'auth'],

	function () {
        Route::post('/broadcasting/auth', function(\Illuminate\Http\Request $request) {
            $pusher = new Pusher\Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                array(
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'useTLS' => false,
                    'host' => env('APP_URL'),
                    'port' => 6001,
                    'scheme' => 'http',
                )
            );
            return $pusher->socket_auth($request->request->get('channel_name'), $request->request->get('socket_id'));
        });

        Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
	});

Route::get('/', function () {
	return view('welcome');
});

Route::middleware(ProtectAgainstSpam::class)->group(function () {
	Auth::routes(['verify' => true]);

});
