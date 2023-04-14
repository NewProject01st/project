<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConstitutionHistoryController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrganizationChartController;
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

// Route::get('/aboutus',[ConstitutionHistoryController::class, 'index'])->name('admin.aboutus.index');
// Route::post('/aboutus/create',[ConstitutionHistoryController::class, 'store'])->name('store');
// Route::post('/aboutus/save',[ConstitutionHistoryController::class, 'save'])->name('aboutus.save');
// Route::post("/aboutus/create", [ConstitutionHistoryController::class, 'store']);

Route::get("user", [UserController::class, 'index']);
Route::get("user/create", [UserController::class, 'create']);



Route::get("user/store", [UserController::class, 'store']);

Route::resource('/budget', BudgetController::class);
Route::resource('/organizationchart', OrganizationChartController::class);