<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
  Route::post('register', 'AuthController@register');
  Route::post('login', 'AuthController@login');

  Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/logout', 'AuthController@logout');
  });
});

//Backend (/admin prefix)
Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/products/search/{title}', 'ProductController@search')->name('products.search'); 
  Route::apiResource('products', 'ProductController'); 

  Route::get('/permissions/search/{name}', 'PermissionController@search')->name('permissions.search'); 
  Route::apiResource('permissions', 'PermissionController'); 

  Route::get('/roles/search/{name}', 'RoleController@search')->name('roles.search'); 
  Route::apiResource('roles', 'RoleController'); 

  Route::get('/users/search/{title}', 'UserController@search')->name('users.search'); 
  Route::apiResource('users', 'UserController'); 
});

//Frontend (no /admin prefix)
Route::group([ 'namespace'=> '\App\Http\Controllers\Api', 'prefix' => '',  'as'=>'', 'middleware' => ['auth:api']], function () { 
  Route::get('/products/search/{title}', 'ProductController@search')->name('products.search'); 
  Route::apiResource('products', 'ProductController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/work-types/search/{title}', 'WorkTypeController@search')->name('work-types.search'); 
  Route::apiResource('work-types', 'WorkTypeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/family-relations/search/{title}', 'FamilyRelationController@search')->name('family-relations.search'); 
  Route::apiResource('family-relations', 'FamilyRelationController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/home-ownership-statuses/search/{title}', 'HomeOwnershipStatusController@search')->name('home-ownership-statuses.search'); 
  Route::apiResource('home-ownership-statuses', 'HomeOwnershipStatusController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/home-facilities/search/{title}', 'HomeFacilityController@search')->name('home-facilities.search'); 
  Route::apiResource('home-facilities', 'HomeFacilityController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/credit-times/search/{title}', 'CreditTimeController@search')->name('credit-times.search'); 
  Route::apiResource('credit-times', 'CreditTimeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/purpose-usages/search/{title}', 'PurposeUsageController@search')->name('purpose-usages.search'); 
  Route::apiResource('purpose-usages', 'PurposeUsageController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/income-sources/search/{title}', 'IncomeSourceController@search')->name('income-sources.search'); 
  Route::apiResource('income-sources', 'IncomeSourceController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/debt-guarantees/search/{title}', 'DebtGuaranteeController@search')->name('debt-guarantees.search'); 
  Route::apiResource('debt-guarantees', 'DebtGuaranteeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/guarantee-statuses/search/{title}', 'GuaranteeStatusController@search')->name('guarantee-statuses.search'); 
  Route::apiResource('guarantee-statuses', 'GuaranteeStatusController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/credit-forms/search/{title}', 'CreditFormController@search')->name('credit-forms.search'); 
  Route::apiResource('credit-forms', 'CreditFormController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/recipients/search/{title}', 'RecipientController@search')->name('recipients.search'); 
  Route::apiResource('recipients', 'RecipientController'); 
});