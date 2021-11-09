<?php

use Illuminate\Support\Facades\Route;

\L::Panel(app('admin')); ///SetLangredirecttoadmin
\L::LangNonymous(); //RunRouteLang'namespace'=>'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {
    Route::get('lock/screen', 'Admin\AdminAuthenticated@lock_screen');
    Route::get('theme/{id}', 'Admin\Dashboard@theme');
    Route::group(['middleware' => 'admin_guest'], function () {

        Route::get('login', 'Admin\AdminAuthenticated@login_page');
        Route::post('login', 'Admin\AdminAuthenticated@login_post');


        Route::view('forgot/password', 'admin.forgot_password');

        Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
        Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
        Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');

    });

    Route::view('need/permission', 'admin.no_permission');

    Route::group(['middleware' => ['admin:admin']], function () {
        if (class_exists(\UniSharp\LaravelFilemanager\Lfm::class)) {
            Route::group(['prefix' => 'filemanager'], function () {
                \UniSharp\LaravelFilemanager\Lfm::routes();
            });
        }

        ////////AdminRoutes/*Start*///////////////
        Route::get('/', 'Admin\Dashboard@home');

        Route::any('logout', 'Admin\AdminAuthenticated@logout');
        Route::get('account', 'Admin\AdminAuthenticated@account');
        Route::post('account', 'Admin\AdminAuthenticated@account_post');


        Route::resource('settings', 'Admin\Settings');
        Route::resource('admingroups', 'Admin\AdminGroups');
        Route::post('admingroups/multi_delete', 'Admin\AdminGroups@multi_delete');
        Route::resource('admins', 'Admin\Admins');
        Route::post('admins/multi_delete', 'Admin\Admins@multi_delete');

        Route::resource('guest', 'GuestController');
        Route::post('guest/multi_delete', 'GuestController@multi_delete');
        Route::resource('cleint', 'CleintController');
        Route::post('cleint/multi_delete', 'CleintController@multi_delete');
        Route::resource('marketer', 'Marketer\MarketerController');
        Route::post('marketer/multi_delete', 'Marketer\MarketerController@multi_delete');
        Route::get('marketer/cleints/{cleints}', 'Marketer\MarketerController@cleints');
        Route::resource('transaction','Admin\TransactionController');
		Route::post('transaction/multi_delete','Admin\TransactionController@multi_delete');
		Route::resource('shipping','Admin\ShippingController');
		Route::post('shipping/multi_delete','Admin\ShippingController@multi_delete');
		Route::resource('advertisement','Admin\AdvertisementController');
		Route::post('advertisement/multi_delete','Admin\AdvertisementController@multi_delete');
		//Route::post('advertisement/upload/multi','Admin\AdvertisementController@multi_upload');
		Route::post('advertisement/delete/file','Admin\AdvertisementController@delete_file');
		////////AdminRoutes/*End*///////////////
    });
});

////////MarketerRoutes/*Start*///////////////
Route::group(['middleware' => ['Lang'], 'prefix' => 'marketer'], function () {

    // Marketer
    Route::get('login', 'Marketer\MarketerAuthenticated@login_page');
    Route::post('login', 'Marketer\MarketerAuthenticated@login_post');

    Route::get('register', 'Marketer\MarketerAuthenticated@register_page');
    Route::post('register/create', 'Marketer\MarketerAuthenticated@register_post')->name('marketer_register');

    // Marketer
    Route::view('forgot/password', 'admin.marketer.forgot_password');
    Route::post('reset/password', 'Marketer\MarketerAuthenticated@reset_password');
    Route::get('password/reset/{token}', 'Marketer\MarketerAuthenticated@reset_password_final');
    Route::post('password/reset/{token}', 'Marketer\MarketerAuthenticated@reset_password_change');

    Route::group(['middleware' => ['marketer:marketer']], function () {
        if (class_exists(\UniSharp\LaravelFilemanager\Lfm::class)) {
            Route::group(['prefix' => 'filemanager'], function () {
                \UniSharp\LaravelFilemanager\Lfm::routes();
            });
        }
        Route::get('/', 'Marketer\Dashboard@home');

        Route::any('logout', 'Marketer\MarketerAuthenticated@logout');
        Route::get('account', 'Marketer\MarketerAuthenticated@account');
        Route::post('account', 'Marketer\MarketerAuthenticated@account_post');
        // create Client
        Route::resource('cleint', 'CleintMarketerController');
        Route::post('cleint/multi_delete', 'CleintMarketerController@multi_delete');
        // Transactions
        Route::get('transaction', 'Admin\TransactionController@indexMarketer');
        // Shippings
        Route::get('shipping','Admin\ShippingController@indexMarketer');
        // Advertisement
        Route::get('advertisement','Admin\AdvertisementController@indexMarketer');
        Route::get('advertisement/{id}','Admin\AdvertisementController@show');
    });
});
////////MarketerRoutes/*End*///////////////
