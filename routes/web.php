<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aboutus\ConstitutionHistoryController;
// use App\Http\Controllers\Aboutus\BudgetController;
use App\Http\Controllers\Aboutus\OrganizationChartController;
use App\Http\Controllers\TendersController;
use App\Http\Controllers\PoliciesActsController;


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

Route::get('/login', function () {
    return view('admin.login');
});

// Route::get('/add-users', function () {
//     return view('admin.pages.users.add-users');
// });

Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@index']);
Route::post('/submitLogin', ['as' => 'submitLogin', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@submitLogin']);

Route::resource('/constitutionHistory', ConstitutionHistoryController::class);
// Route::resource('/budget', BudgetController::class);
Route::resource('/organizationchart', OrganizationChartController::class);
Route::resource('/tender', TendersController::class);
Route::resource('/policiesacts', PoliciesActsController::class);

Route::get('/list-budget', ['as' => 'list-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@index']);
Route::get('/add-budget', ['as' => 'add-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@addBudget']);
Route::post('/add-budget', ['as' => 'add-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@budget']);
Route::post('/show-budget', ['as' => 'show-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@show']);
Route::post('/delete-budget', ['as' => 'delete-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@destroy']);
Route::get('/update-budget/{id}', ['as' => 'update-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@edit']);
Route::put('/update-budget/{id}', ['as' => 'update-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@update']);

// Route::get('show-budget/{id}', 'App\Http\Controllers\Aboutus\BudgetController@show');


Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', ['as' => '/dashboard', 'uses' => 'App\Http\Controllers\Dashboard\DashboardController@index']);
    Route::get('/list-users', ['as' => 'list-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@index']);
    Route::get('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@addUsers']);
    Route::post('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@register']);


    Route::get('/log-out', ['as' => 'log-out', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@logout']);

});
