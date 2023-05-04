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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/', ['as' => '/', 'uses' => 'App\Http\Controllers\Website\IndexController@index']);
Route::post('/change-language', ['as' => '/change-language', 'uses' => 'App\Http\Controllers\Website\IndexController@changeLanguage']);


// Route::get('/add-users', function () {
//     return view('admin.pages.users.add-users');
// });

Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@index']);
Route::post('/submitLogin', ['as' => 'submitLogin', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@submitLogin']);


Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', ['as' => '/dashboard', 'uses' => 'App\Http\Controllers\Dashboard\DashboardController@index']);
    Route::get('/list-users', ['as' => 'list-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@index']);
    Route::get('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@addUsers']);
    Route::post('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@register']);


    Route::get('/list-budget', ['as' => 'list-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@index']);
    Route::get('/add-budget', ['as' => 'add-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@add']);
    Route::post('/add-budget', ['as' => 'add-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@store']);
    Route::post('/show-budget', ['as' => 'show-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@show']);
    Route::post('/delete-budget', ['as' => 'delete-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@destroy']);
    Route::post('/edit-budget', ['as' => 'edit-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@edit']);
    Route::post('/update-budget', ['as' => 'update-budget', 'uses' => 'App\Http\Controllers\Aboutus\BudgetController@update']);
    
    Route::get('/list-constitutionhistory', ['as' => 'list-constitutionhistory', 'uses' => 'App\Http\Controllers\Aboutus\ConstitutionHistoryController@index']);
    Route::get('/add-constitutionhistory', ['as' => 'add-constitutionhistory', 'uses' => 'App\Http\Controllers\Aboutus\ConstitutionHistoryController@add']);
    Route::post('/add-constitutionhistory', ['as' => 'add-constitutionhistory', 'uses' => 'App\Http\Controllers\Aboutus\ConstitutionHistoryController@store']);
    Route::post('/show-constitutionhistory', ['as' => 'show-constitutionhistory', 'uses' => 'App\Http\Controllers\Aboutus\ConstitutionHistoryController@show']);
    Route::post('/delete-constitutionhistory', ['as' => 'delete-constitutionhistory', 'uses' => 'App\Http\Controllers\Aboutus\ConstitutionHistoryController@destroy']);
    Route::post('/edit-constitutionhistory', ['as' => 'edit-constitutionhistory', 'uses' => 'App\Http\Controllers\Aboutus\ConstitutionHistoryController@edit']);
    Route::post('/update-constitutionhistory', ['as' => 'update-constitutionhistory', 'uses' => 'App\Http\Controllers\Aboutus\ConstitutionHistoryController@update']);
    
    Route::get('/list-organizationchart', ['as' => 'list-organizationchart', 'uses' => 'App\Http\Controllers\Aboutus\OrganizationChartController@index']);
    Route::get('/add-organizationchart', ['as' => 'add-organizationchart', 'uses' => 'App\Http\Controllers\Aboutus\OrganizationChartController@add']);
    Route::post('/add-organizationchart', ['as' => 'add-organizationchart', 'uses' => 'App\Http\Controllers\Aboutus\OrganizationChartController@store']);
    Route::post('/show-organizationchart', ['as' => 'show-organizationchart', 'uses' => 'App\Http\Controllers\Aboutus\OrganizationChartController@show']);
    Route::post('/delete-organizationchart', ['as' => 'delete-organizationchart', 'uses' => 'App\Http\Controllers\Aboutus\OrganizationChartController@destroy']);
    Route::post('/edit-organizationchart', ['as' => 'edit-organizationchart', 'uses' => 'App\Http\Controllers\Aboutus\OrganizationChartController@edit']);
    Route::post('/update-organizationchart', ['as' => 'update-organizationchart', 'uses' => 'App\Http\Controllers\Aboutus\OrganizationChartController@update']);
    
    Route::get('/list-tenders', ['as' => 'list-tenders', 'uses' => 'App\Http\Controllers\TendersController@index']);
    Route::get('/add-tenders', ['as' => 'add-tenders', 'uses' => 'App\Http\Controllers\TendersController@add']);
    Route::post('/add-tenders', ['as' => 'add-tenders', 'uses' => 'App\Http\Controllers\TendersController@store']);
    Route::post('/show-tenders', ['as' => 'show-tenders', 'uses' => 'App\Http\Controllers\TendersController@show']);
    Route::post('/delete-tenders', ['as' => 'delete-tenders', 'uses' => 'App\Http\Controllers\TendersController@destroy']);
    Route::post('/edit-tenders', ['as' => 'edit-tenders', 'uses' => 'App\Http\Controllers\TendersController@edit']);
    Route::post('/update-tenders', ['as' => 'update-tenders', 'uses' => 'App\Http\Controllers\TendersController@update']);
    
    Route::get('/list-policiesacts', ['as' => 'list-policiesacts', 'uses' => 'App\Http\Controllers\PoliciesActsController@index']);
    Route::get('/add-policiesacts', ['as' => 'add-policiesacts', 'uses' => 'App\Http\Controllers\PoliciesActsController@add']);
    Route::post('/add-policiesacts', ['as' => 'add-policiesacts', 'uses' => 'App\Http\Controllers\PoliciesActsController@store']);
    Route::post('/show-policiesacts', ['as' => 'show-policiesacts', 'uses' => 'App\Http\Controllers\PoliciesActsController@show']);
    Route::post('/delete-policiesacts', ['as' => 'delete-policiesacts', 'uses' => 'App\Http\Controllers\PoliciesActsController@destroy']);
    Route::post('/edit-policiesacts', ['as' => 'edit-policiesacts', 'uses' => 'App\Http\Controllers\PoliciesActsController@edit']);
    Route::post('/update-policiesacts', ['as' => 'update-policiesacts', 'uses' => 'App\Http\Controllers\PoliciesActsController@update']);
    
    Route::get('/list-projects', ['as' => 'list-projects', 'uses' => 'App\Http\Controllers\ProjectsController@index']);
    Route::get('/add-projects', ['as' => 'add-projects', 'uses' => 'App\Http\Controllers\ProjectsController@add']);
    Route::post('/add-projects', ['as' => 'add-projects', 'uses' => 'App\Http\Controllers\ProjectsController@store']);
    Route::post('/show-projects', ['as' => 'show-projects', 'uses' => 'App\Http\Controllers\ProjectsController@show']);
    Route::post('/delete-projects', ['as' => 'delete-projects', 'uses' => 'App\Http\Controllers\ProjectsController@destroy']);
    Route::post('/edit-projects', ['as' => 'edit-projects', 'uses' => 'App\Http\Controllers\ProjectsController@edit']);
    Route::post('/update-projects', ['as' => 'update-projects', 'uses' => 'App\Http\Controllers\ProjectsController@update']);
    
    Route::get('/log-out', ['as' => 'log-out', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@logout']);

});
