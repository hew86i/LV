<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });


/*======================================
=            Route to home             =
======================================*/
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'

));


/*===========================================
=            Authenticated group            =
===========================================*/

Route::group(array('before' => 'auth'), function() {

	/*==================================
	=            CSRF group            =
	==================================*/
	
	Route::group(array('before' => 'csrf'), function(){

		/*=================================
		=            Sign out (POST)       =
		=================================*/

    	Route::post('/account/change-password', array(
		'as' => 'account-change-password-post',
		'uses' => 'AccountController@postChangePassword'		
		));


	}); 

	/*-----  End of CSRF group  ------*/

	

	/*=================================
	=            Sign out (GET)       =
	=================================*/

	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));
	
	/*========================================
	=            Change password (GET)       =	
	========================================*/

	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'		
	));

});


/*-----  End of Authenticated group  ------*/





/*=============================================
=            Unauthenticated gorup            =
=============================================*/

Route::group(array('before' => 'guest'), function() {

	/*==================================
	=            CSRF group            =
	==================================*/
	
	Route::group(array('before' => 'csrf'), function() {

		/*=============================================
		=            Create account (POST)            =
		=============================================*/		

		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'));

		/*========================================
		=             Sign in (POST)             =
		========================================*/		

		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'));

	});
	
	/*-----  End of CSRF group  ------*/

	
	/*======================================
	=            Sign in (GET)             =
	======================================*/

	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'));

	/*=============================================
	=            Create account (GET)             =
	=============================================*/	

	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));


});


/*-----  End of Unauthenticated gorup  ------*/






