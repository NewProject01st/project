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

Route::get('/pages/{page}', ['as' => 'pages', 'uses' => 'App\Http\Controllers\Website\DynamicPages\DynamicPagesController@index']);
// Website
Route::get('/list-disastermanagementportal-web', ['as' => 'list-disastermanagementportal-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllDisasterManagmentPortal']);
Route::get('/list-objectivegoals-web', ['as' => 'list-objectivegoals-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllObjectiveGoals']);
Route::get('/state-disaster-management-authority-web', ['as' => 'state-disaster-management-authority-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllStateDisasterManagementAuthority']);
Route::get('/index', ['as' => 'index', 'uses' => 'App\Http\Controllers\Website\IndexController@index']);


Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', ['as' => '/dashboard', 'uses' => 'App\Http\Controllers\Dashboard\DashboardController@index']);
    Route::get('/list-users', ['as' => 'list-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@index']);
    Route::get('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@addUsers']);
    Route::post('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@register']);


    Route::get('/list-main-menu', ['as' => 'list-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@index']);
    Route::get('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@add']);
    Route::post('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@store']);
    Route::post('/show-main-menu', ['as' => 'show-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@show']);
    Route::post('/delete-main-menu', ['as' => 'delete-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@destroy']);
    Route::post('/edit-main-menu', ['as' => 'edit-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@edit']);
    Route::post('/update-main-menu', ['as' => 'update-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@update']);

    Route::get('/list-sub-menu', ['as' => 'list-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@index']);
    Route::get('/add-sub-menu', ['as' => 'add-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@add']);
    Route::post('/add-sub-menu', ['as' => 'add-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@store']);
    Route::post('/show-sub-menu', ['as' => 'show-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@show']);
    Route::post('/delete-sub-menu', ['as' => 'delete-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@destroy']);
    Route::post('/edit-sub-menu', ['as' => 'edit-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@edit']);
    Route::post('/update-sub-menu', ['as' => 'update-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@update']);


    Route::get('/list-dynamic-page', ['as' => 'list-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@index']);
    Route::get('/add-dynamic-page', ['as' => 'add-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@add']);
    Route::post('/add-dynamic-page', ['as' => 'add-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@store']);
    Route::post('/show-dynamic-page', ['as' => 'show-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@show']);
    Route::post('/delete-dynamic-page', ['as' => 'delete-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@destroy']);
    Route::post('/edit-dynamic-page', ['as' => 'edit-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@edit']);
    Route::post('/update-dynamic-page', ['as' => 'update-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@update']);

    Route::get('/list-marquee', ['as' => 'list-marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@index']);
    Route::get('/add-marquee', ['as' => 'add-marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@add']);
    Route::post('/add-marquee', ['as' => 'add-marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@store']);
    Route::post('/edit-marquee', ['as' => 'edit-marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@edit']);
    Route::post('/update-marquee', ['as' => 'update-marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@update']);
    Route::post('/show-marquee', ['as' => 'show-marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@show']);
    Route::post('/delete-marquee', ['as' => 'delete-marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@destroy']);

    Route::get('/list-slide', ['as' => 'list-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@index']);
    Route::get('/add-slide', ['as' => 'add-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@add']);
    Route::post('/add-slide', ['as' => 'add-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@store']);
    Route::post('/edit-slide', ['as' => 'edit-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@edit']);
    Route::post('/update-slide', ['as' => 'update-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@update']);
    Route::post('/show-slide', ['as' => 'show-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@show']);
    Route::post('/delete-slide', ['as' => 'delete-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@destroy']);

    Route::get('/list-weather', ['as' => 'list-weather', 'uses' => 'App\Http\Controllers\Home\WeatherController@index']);
    Route::get('/add-weather', ['as' => 'add-weather', 'uses' => 'App\Http\Controllers\Home\WeatherController@add']);
    Route::post('/add-weather', ['as' => 'add-weather', 'uses' => 'App\Http\Controllers\Home\WeatherController@store']);
    Route::post('/edit-weather', ['as' => 'edit-weather', 'uses' => 'App\Http\Controllers\Home\WeatherController@edit']);
    Route::post('/update-weather', ['as' => 'update-weather', 'uses' => 'App\Http\Controllers\Home\WeatherController@update']);
    Route::post('/show-weather', ['as' => 'show-weather', 'uses' => 'App\Http\Controllers\Home\WeatherController@show']);
    Route::post('/delete-weather', ['as' => 'delete-weather', 'uses' => 'App\Http\Controllers\Home\WeatherController@destroy']);

    Route::get('/list-disasterforcast', ['as' => 'list-disasterforcast', 'uses' => 'App\Http\Controllers\Home\DisasterForcastController@index']);
    Route::get('/add-disasterforcast', ['as' => 'add-disasterforcast', 'uses' => 'App\Http\Controllers\Home\DisasterForcastController@add']);
    Route::post('/add-disasterforcast', ['as' => 'add-disasterforcast', 'uses' => 'App\Http\Controllers\Home\DisasterForcastController@store']);
    Route::post('/edit-disasterforcast', ['as' => 'edit-disasterforcast', 'uses' => 'App\Http\Controllers\Home\DisasterForcastController@edit']);
    Route::post('/update-disasterforcast', ['as' => 'update-disasterforcast', 'uses' => 'App\Http\Controllers\Home\DisasterForcastController@update']);
    Route::post('/show-disasterforcast', ['as' => 'show-disasterforcast', 'uses' => 'App\Http\Controllers\Home\DisasterForcastController@show']);
    Route::post('/delete-disasterforcast', ['as' => 'delete-disasterforcast', 'uses' => 'App\Http\Controllers\Home\DisasterForcastController@destroy']);

    Route::get('/list-objectivegoals', ['as' => 'list-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@index']);
    Route::get('/add-objectivegoals', ['as' => 'add-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@add']);
    Route::post('/add-objectivegoals', ['as' => 'add-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@store']);
    Route::post('/show-objectivegoals', ['as' => 'show-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@show']);
    Route::post('/delete-objectivegoals', ['as' => 'delete-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@destroy']);
    Route::post('/edit-objectivegoals', ['as' => 'edit-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@edit']);
    Route::post('/update-objectivegoals', ['as' => 'update-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@update']);
    
    Route::get('/list-disastermanagementportal', ['as' => 'list-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@index']);
    Route::get('/add-disastermanagementportal', ['as' => 'add-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@add']);
    Route::post('/add-disastermanagementportal', ['as' => 'add-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@store']);
    Route::post('/show-disastermanagementportal', ['as' => 'show-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@show']);
    Route::post('/delete-disastermanagementportal', ['as' => 'delete-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@destroy']);
    Route::post('/edit-disastermanagementportal', ['as' => 'edit-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@edit']);
    Route::post('/update-disastermanagementportal', ['as' => 'update-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@update']);
    
    Route::get('/list-statedisastermanagementauthority', ['as' => 'list-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@index']);
    Route::get('/add-statedisastermanagementauthority', ['as' => 'add-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@add']);
    Route::post('/add-statedisastermanagementauthority', ['as' => 'add-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@store']);
    Route::post('/show-statedisastermanagementauthority', ['as' => 'show-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@show']);
    Route::post('/delete-statedisastermanagementauthority', ['as' => 'delete-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@destroy']);
    Route::post('/edit-statedisastermanagementauthority', ['as' => 'edit-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@edit']);
    Route::post('/update-statedisastermanagementauthority', ['as' => 'update-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@update']);
    
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
    
    Route::get('/list-main-menu', ['as' => 'list-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@index']);
    Route::get('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@add']);
    Route::post('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@store']);
    Route::post('/show-main-menu', ['as' => 'show-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@show']);
    Route::post('/delete-main-menu', ['as' => 'delete-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@destroy']);
    Route::post('/edit-main-menu', ['as' => 'edit-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@edit']);
    Route::post('/update-main-menu', ['as' => 'update-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@update']);

    Route::get('/list-metadata', ['as' => 'list-metadata', 'uses' => 'App\Http\Controllers\MetadataController@index']);
    Route::get('/add-metadata', ['as' => 'add-metadata', 'uses' => 'App\Http\Controllers\MetadataController@add']);
    Route::post('/add-metadata', ['as' => 'add-metadata', 'uses' => 'App\Http\Controllers\MetadataController@store']);
    Route::post('/show-metadata', ['as' => 'show-metadata', 'uses' => 'App\Http\Controllers\MetadataController@show']);
    Route::post('/delete-metadata', ['as' => 'delete-metadata', 'uses' => 'App\Http\Controllers\MetadataController@destroy']);
    Route::post('/edit-metadata', ['as' => 'edit-metadata', 'uses' => 'App\Http\Controllers\MetadataController@edit']);
    Route::post('/update-metadata', ['as' => 'update-metadata', 'uses' => 'App\Http\Controllers\MetadataController@update']);    
    
    
    Route::get('/list-emergency-contact', ['as' => 'list-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@index']);
    Route::get('/add-emergency-contact', ['as' => 'add-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@add']);
    Route::post('/add-emergency-contact', ['as' => 'add-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@store']);
    Route::post('/edit-emergency-contact', ['as' => 'edit-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@edit']);
    Route::post('/update-emergency-contact', ['as' => 'update-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@update']);
    Route::post('/show-emergency-contact', ['as' => 'show-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@show']);
    Route::post('/delete-emergency-contact', ['as' => 'delete-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@destroy']);

    Route::get('/list-disaster-management-news', ['as' => 'list-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@index']);
    Route::get('/add-disaster-management-news', ['as' => 'add-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@add']);
    Route::post('/add-disaster-management-news', ['as' => 'add-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@store']);
    Route::post('/edit-disaster-management-news', ['as' => 'edit-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@edit']);
    Route::post('/update-disaster-management-news', ['as' => 'update-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@update']);
    Route::post('/show-disaster-management-news', ['as' => 'show-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@show']);
    Route::post('/delete-disaster-management-news', ['as' => 'delete-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@destroy']);

    Route::get('/list-home-tender', ['as' => 'list-home-tender', 'uses' => 'App\Http\Controllers\Home\HomeTenderController@index']);
    Route::get('/add-home-tender', ['as' => 'add-home-tender', 'uses' => 'App\Http\Controllers\Home\HomeTenderController@add']);
    Route::post('/add-home-tender', ['as' => 'add-home-tender', 'uses' => 'App\Http\Controllers\Home\HomeTenderController@store']);
    Route::post('/edit-home-tender', ['as' => 'edit-home-tender', 'uses' => 'App\Http\Controllers\Home\HomeTenderController@edit']);
    Route::post('/update-home-tender', ['as' => 'update-home-tender', 'uses' => 'App\Http\Controllers\Home\HomeTenderController@update']);
    Route::post('/show-home-tender', ['as' => 'show-home-tender', 'uses' => 'App\Http\Controllers\Home\HomeTenderController@show']);
    Route::post('/delete-home-tender', ['as' => 'delete-home-tender', 'uses' => 'App\Http\Controllers\Home\HomeTenderController@destroy']);

    Route::get('/list-general-contact', ['as' => 'list-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@index']);
    Route::get('/add-general-contact', ['as' => 'add-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@add']);
    Route::post('/add-general-contact', ['as' => 'add-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@store']);
    Route::post('/edit-general-contact', ['as' => 'edit-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@edit']);
    Route::post('/update-general-contact', ['as' => 'update-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@update']);
    Route::post('/show-general-contact', ['as' => 'show-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@show']);
    Route::post('/delete-general-contact', ['as' => 'delete-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@destroy']);

    
    Route::get('/list-disaster-management-web-portal', ['as' => 'list-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Home\DisasterManagementWebPortalController@index']);
    Route::get('/add-disaster-management-web-portal', ['as' => 'add-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Home\DisasterManagementWebPortalController@add']);
    Route::post('/add-disaster-management-web-portal', ['as' => 'add-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Home\DisasterManagementWebPortalController@store']);
    Route::post('/edit-disaster-management-web-portal', ['as' => 'edit-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Home\DisasterManagementWebPortalController@edit']);
    Route::post('/update-disaster-management-web-portal', ['as' => 'update-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Home\DisasterManagementWebPortalController@update']);
    Route::post('/show-disaster-management-web-portal', ['as' => 'show-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Home\DisasterManagementWebPortalController@show']);
    Route::post('/delete-disaster-management-web-portal', ['as' => 'delete-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Home\DisasterManagementWebPortalController@destroy']);

    
    Route::get('/list-hazard-vulnerability-assessment', ['as' => 'list-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@index']);
    Route::get('/add-hazard-vulnerability-assessment', ['as' => 'add-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@add']);
    Route::post('/add-hazard-vulnerability-assessment', ['as' => 'add-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@store']);
    Route::post('/edit-hazard-vulnerability-assessment', ['as' => 'edit-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@edit']);
    Route::post('/update-hazard-vulnerability-assessment', ['as' => 'update-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@update']);
    Route::post('/show-hazard-vulnerability-assessment', ['as' => 'show-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@show']);
    Route::post('/delete-hazard-vulnerability-assessment', ['as' => 'delete-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@destroy']);

    Route::get('/list-early-warning-system', ['as' => 'list-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@index']);
    Route::get('/add-early-warning-system', ['as' => 'add-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@add']);
    Route::post('/add-early-warning-system', ['as' => 'add-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@store']);
    Route::post('/edit-early-warning-system', ['as' => 'edit-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@edit']);
    Route::post('/update-early-warning-system', ['as' => 'update-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@update']);
    Route::post('/show-early-warning-system', ['as' => 'show-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@show']);
    Route::post('/delete-early-warning-system', ['as' => 'delete-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@destroy']);


    Route::get('/log-out', ['as' => 'log-out', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@logout']);

});