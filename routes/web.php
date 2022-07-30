<?php

use Illuminate\Support\Facades\Route;

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
Route::group([ 'namespace'=> '\App\Http\Controllers' ], function () { 
  Route::resource('guest', 'GuestController');
});

Route::get('/', function () {
    // return view('welcome');
    return redirect(route('guest.index'));
});

Auth::routes();

//Backend : Admin Panel
Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 

  Route::get('/', function () {
    return redirect(route('admin.dashboard'));
  });
  
  //naming convention ignored for dashboard as /admin/dashboards sounds inappropriate!
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); 
  
  Route::resource('products', 'ProductController'); 
  Route::resource('permissions', 'PermissionController'); 
  Route::resource('roles', 'RoleController'); 
  Route::resource('users', 'UserController'); 

});

//Frontend
Route::group([ 'namespace'=> '\App\Http\Controllers', 'prefix' => '',  'as'=>'', 'middleware' => 'auth' ], function () { 
  Route::resource('products', 'ProductController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('work-types', 'WorkTypeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('family-relations', 'FamilyRelationController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('home-ownership-statuses', 'HomeOwnershipStatusController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('home-facilities', 'HomeFacilityController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('credit-times', 'CreditTimeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('purpose-usages', 'PurposeUsageController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('income-sources', 'IncomeSourceController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('debt-guarantees', 'DebtGuaranteeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('guarantee-statuses', 'GuaranteeStatusController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('credit-forms', 'CreditFormController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('form-responses', 'FormResponseController'); 
});