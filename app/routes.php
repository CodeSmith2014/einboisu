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

Route::get('/', function()
{
	$zones_array = array();
	$timestamp = time();
	foreach(timezone_identifiers_list() as $key => $zone) {
		date_default_timezone_set($zone);
		$zones_array[$key]['zone'] = $zone;
		$zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
	}
});

Route::get ('login', 'AuthController@showLogin')->before('guest');
// Route::group(array('before' => 'csrf'), function(){
Route::post ('login', 'AuthController@doLogin');
// });

Route::get('logout', array('uses' => 'AuthController@doLogout'));


Route::group(array('before' => 'auth'), function()
{
	Route::get ('dashboard', array(
		"as"=>"dashboard",
		function (){
			return View::make ('admin/dashboard');
		}));
	Route::resource('users','UserController',array('except'=>array('create')));
	
	Route::post('clients/setdefaultcontact{id}{cid}',array(
		"as"=>"client.set.default.contact",
		"uses"=>"ClientController@set_default_contact"
		));
	Route::resource('clients','ClientController', ['except'=>['create','edit']]);
	Route::resource('contacts','ContactController', ['except'=>['create','show','edit']]);
	Route::post('contacts/ajaxGetContacts','ContactController@ajaxGetContacts');
	Route::resource('maintenance','MaintenanceController', ['except'=>['create','edit']]);
	Route::resource('onsitesupport','OnsitesupportController', ['except'=>['create','show','edit']]);

	Route::resource('invoices','InvoiceController');
	Route::resource('systems','SystemController',array('only'=>array('index','update')));
});


/*
| Filter For Super Admin
| Route::group(array('before'=>'super-role'), function(){});
*/

