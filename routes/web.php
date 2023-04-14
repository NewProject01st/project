<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aboutus\ConstitutionHistoryController;
use App\Http\Controllers\Aboutus\BudgetController;
use App\Http\Controllers\Aboutus\OrganizationChartController;
use App\Http\Controllers\TendersController;
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

Route::get('/add-usres', function () {
    return view('admin.pages.dashboard');
});

Route::get('/list-users', function () {
    return view('admin.pages.users-list');
});

Route::resource('/constitutionHistory', ConstitutionHistoryController::class);
Route::resource('/budget', BudgetController::class);
Route::resource('/organizationchart', OrganizationChartController::class);
Route::resource('/tender', TendersController::class);