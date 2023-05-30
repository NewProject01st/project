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
Route::get('/index', ['as' => 'index', 'uses' => 'App\Http\Controllers\Website\IndexController@index']);
Route::post('/new-paricular-data-web', ['as' => 'new-paricular-data-web', 'uses' => 'App\Http\Controllers\Website\IndexController@show']);


Route::get('/list-disastermanagementportal-web', ['as' => 'list-disastermanagementportal-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllDisasterManagmentPortal']);
Route::get('/list-objectivegoals-web', ['as' => 'list-objectivegoals-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllObjectiveGoals']);
Route::get('/state-disaster-management-authority-web', ['as' => 'state-disaster-management-authority-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllStateDisasterManagementAuthority']);
// Route::get('/index', ['as' => 'index', 'uses' => 'App\Http\Controllers\Website\IndexController@index']);
Route::get('/contact-information', ['as' => 'contact-information', 'uses' => 'App\Http\Controllers\Website\ContactUs\ContactController@getAllContactInformation']);
// Route::get('/feedback-suggestions', ['as' => 'feedback-suggestions', 'uses' => 'App\Http\Controllers\Website\ContactUs\ContactController@getFeedbackSuggestions']);
Route::get('/feedback-suggestions', ['as' => 'feedback-suggestions', 'uses' => 'App\Http\Controllers\Website\ContactUs\ContactController@add']);
Route::post('/feedback-suggestions', ['as' => 'feedback-suggestions', 'uses' => 'App\Http\Controllers\Website\ContactUs\ContactController@store']);

Route::get('/list-hazard-vulnerability-web', ['as' => 'list-hazard-vulnerability-web', 'uses' => 'App\Http\Controllers\Website\Preparedness\PreparednessController@getAllHazardVulnerability']);
Route::get('/list-warning-system-web', ['as' => 'list-warning-system-web', 'uses' => 'App\Http\Controllers\Website\Preparedness\PreparednessController@getAllEarlyWarningSystem']);
Route::get('/list-capacity-training', ['as' => 'list-capacity-training', 'uses' => 'App\Http\Controllers\Website\Preparedness\PreparednessController@getAllCapacityTraining']);
Route::get('/list-awareness-education-web', ['as' => 'list-awareness-education-web', 'uses' => 'App\Http\Controllers\Website\Preparedness\PreparednessController@getAllPublicAwarenessEducation']);

Route::get('/list-state-emergency-operations-center-web', ['as' => 'list-state-emergency-operations-center-web', 'uses' => 'App\Http\Controllers\Website\EmergencyResponse\EmergencyResponseController@getAllStateEmergencyOperationsCenter']);
Route::get('/list-district-emergency-operations-center-web', ['as' => 'list-district-emergency-operations-center-web', 'uses' => 'App\Http\Controllers\Website\EmergencyResponse\EmergencyResponseController@getAllDistrictEmergencyOperationsCenter']);
Route::get('/list-emergency-contact-numbers-web', ['as' => 'list-emergency-contact-numbers-web', 'uses' => 'App\Http\Controllers\Website\EmergencyResponse\EmergencyResponseController@getAllEmergencyContactNumbers']);
Route::get('/list-search-rescue-teams-web', ['as' => 'list-search-rescue-teams-web', 'uses' => 'App\Http\Controllers\Website\EmergencyResponse\EmergencyResponseController@getAllSearchRescueTeams']);
Route::get('/list-relief-measures-resources-web', ['as' => 'list-relief-measures-resources-web', 'uses' => 'App\Http\Controllers\Website\EmergencyResponse\EmergencyResponseController@getAllReliefMeasuresResources']);
Route::get('/list-evacuation-plans-web', ['as' => 'list-evacuation-plans-web', 'uses' => 'App\Http\Controllers\Website\EmergencyResponse\EmergencyResponseController@getAllEvacuationPlans']);

Route::get('/list-report-incident-crowdsourcing-web', ['as' => 'list-report-incident-crowdsourcing-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllReportIncidentCrowdsourcing']);
Route::get('/volunteer-citizen-support-web', ['as' => 'volunteer-citizen-support-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllVolunteerCitizenSupport']);
Route::get('/citizen-feedback-suggestions-web', ['as' => 'citizen-feedback-suggestions-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllCitizenFeedbackSuggestions']);

Route::get('/list-event-web', ['as' => 'list-event-web', 'uses' => 'App\Http\Controllers\Website\TrainingEvent\EventController@getAllEvent']);

// ================================================
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
    Route::post('/update-one_marquee', ['as' => 'update-one_marquee', 'uses' => 'App\Http\Controllers\Home\MarqueeController@updateOne']);

    Route::get('/list-slide', ['as' => 'list-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@index']);
    Route::get('/add-slide', ['as' => 'add-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@add']);
    Route::post('/add-slide', ['as' => 'add-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@store']);
    Route::post('/edit-slide', ['as' => 'edit-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@edit']);
    Route::post('/update-slide', ['as' => 'update-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@update']);
    Route::post('/show-slide', ['as' => 'show-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@show']);
    Route::post('/delete-slide', ['as' => 'delete-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@destroy']);
    Route::post('/update-active-slide', ['as' => 'update-active-slide', 'uses' => 'App\Http\Controllers\Home\SliderController@updateOne']);
    
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
    Route::post('/update-one-emergency-contact', ['as' => 'update-one-emergency-contact', 'uses' => 'App\Http\Controllers\Home\EmergencyContactController@updateOne']);


    Route::get('/list-disaster-management-news', ['as' => 'list-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@index']);
    Route::get('/add-disaster-management-news', ['as' => 'add-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@add']);
    Route::post('/add-disaster-management-news', ['as' => 'add-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@store']);
    Route::post('/edit-disaster-management-news', ['as' => 'edit-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@edit']);
    Route::post('/update-disaster-management-news', ['as' => 'update-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@update']);
    Route::post('/show-disaster-management-news', ['as' => 'show-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@show']);
    Route::post('/delete-disaster-management-news', ['as' => 'delete-disaster-management-news', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@destroy']);
    Route::post('/update-one', ['as' => 'update-one', 'uses' => 'App\Http\Controllers\Home\DisasterManagementNewsController@updateOne']);

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
    Route::post('/update-one-general-contact', ['as' => 'update-one-general-contact', 'uses' => 'App\Http\Controllers\Home\GeneralContactController@updateOne']);

    
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

    Route::get('/list-capacity-building-and-training', ['as' => 'list-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@index']);
    Route::get('/add-capacity-building-and-training', ['as' => 'add-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@add']);
    Route::post('/add-capacity-building-and-training', ['as' => 'add-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@store']);
    Route::post('/edit-capacity-building-and-training', ['as' => 'edit-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@edit']);
    Route::post('/update-capacity-building-and-training', ['as' => 'update-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@update']);
    Route::post('/show-capacity-building-and-training', ['as' => 'show-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@show']);
    Route::post('/delete-capacity-building-and-training', ['as' => 'delete-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@destroy']);

    
    Route::get('/list-public-awareness-and-education', ['as' => 'list-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@index']);
    Route::get('/add-public-awareness-and-education', ['as' => 'add-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@add']);
    Route::post('/add-public-awareness-and-education', ['as' => 'add-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@store']);
    Route::post('/edit-public-awareness-and-education', ['as' => 'edit-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@edit']);
    Route::post('/update-public-awareness-and-education', ['as' => 'update-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@update']);
    Route::post('/show-public-awareness-and-education', ['as' => 'show-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@show']);
    Route::post('/delete-public-awareness-and-education', ['as' => 'delete-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@destroy']);


    // ==========EmergencyResponse=======
    Route::get('/list-state-emergency-operations-center', ['as' => 'list-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@index']);
    Route::get('/add-state-emergency-operations-center', ['as' => 'add-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@add']);
    Route::post('/add-state-emergency-operations-center', ['as' => 'add-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@store']);
    Route::post('/edit-state-emergency-operations-center', ['as' => 'edit-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@edit']);
    Route::post('/update-state-emergency-operations-center', ['as' => 'update-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@update']);
    Route::post('/show-state-emergency-operations-center', ['as' => 'show-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@show']);
    Route::post('/delete-state-emergency-operations-center', ['as' => 'delete-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@destroy']);

    Route::get('/list-district-emergency-operations-center', ['as' => 'list-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@index']);
    Route::get('/add-district-emergency-operations-center', ['as' => 'add-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@add']);
    Route::post('/add-district-emergency-operations-center', ['as' => 'add-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@store']);
    Route::post('/edit-district-emergency-operations-center', ['as' => 'edit-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@edit']);
    Route::post('/update-district-emergency-operations-center', ['as' => 'update-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@update']);
    Route::post('/show-district-emergency-operations-center', ['as' => 'show-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@show']);
    Route::post('/delete-district-emergency-operations-center', ['as' => 'delete-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@destroy']);

    Route::get('/list-emergency-contact-numbers', ['as' => 'list-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@index']);
    Route::get('/add-emergency-contact-numbers', ['as' => 'add-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@add']);
    Route::post('/add-emergency-contact-numbers', ['as' => 'add-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@store']);
    Route::post('/edit-emergency-contact-numbers', ['as' => 'edit-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@edit']);
    Route::post('/update-emergency-contact-numbers', ['as' => 'update-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@update']);
    Route::post('/show-emergency-contact-numbers', ['as' => 'show-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@show']);
    Route::post('/delete-emergency-contact-numbers', ['as' => 'delete-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@destroy']);

    Route::get('/list-evacuation-plans', ['as' => 'list-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@index']);
    Route::get('/add-evacuation-plans', ['as' => 'add-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@add']);
    Route::post('/add-evacuation-plans', ['as' => 'add-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@store']);
    Route::post('/edit-evacuation-plans', ['as' => 'edit-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@edit']);
    Route::post('/update-evacuation-plans', ['as' => 'update-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@update']);
    Route::post('/show-evacuation-plans', ['as' => 'show-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@show']);
    Route::post('/delete-evacuation-plans', ['as' => 'delete-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@destroy']);
    
    
    Route::get('/list-relief-measures-resources', ['as' => 'list-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@index']);
    Route::get('/add-relief-measures-resources', ['as' => 'add-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@add']);
    Route::post('/add-relief-measures-resources', ['as' => 'add-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@store']);
    Route::post('/edit-relief-measures-resources', ['as' => 'edit-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@edit']);
    Route::post('/update-relief-measures-resources', ['as' => 'update-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@update']);
    Route::post('/show-relief-measures-resources', ['as' => 'show-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@show']);
    Route::post('/delete-relief-measures-resources', ['as' => 'delete-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@destroy']);


    Route::get('/list-search-rescue-teams', ['as' => 'list-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@index']);
    Route::get('/add-search-rescue-teams', ['as' => 'add-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@add']);
    Route::post('/add-search-rescue-teams', ['as' => 'add-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@store']);
    Route::post('/edit-search-rescue-teams', ['as' => 'edit-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@edit']);
    Route::post('/update-search-rescue-teams', ['as' => 'update-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@update']);
    Route::post('/show-search-rescue-teams', ['as' => 'show-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@show']);
    Route::post('/delete-search-rescue-teams', ['as' => 'delete-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@destroy']);

// ===== Citizen Action=======

Route::get('/list-report-crowdsourcing', ['as' => 'list-report-crowdsourcing', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentCrowdsourcingController@index']);
Route::get('/add-report-crowdsourcing', ['as' => 'add-report-crowdsourcing', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentCrowdsourcingController@add']);
Route::post('/add-report-crowdsourcing', ['as' => 'add-report-crowdsourcing', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentCrowdsourcingController@store']);
Route::post('/edit-report-crowdsourcing', ['as' => 'edit-report-crowdsourcing', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentCrowdsourcingController@edit']);
Route::post('/update-report-crowdsourcing', ['as' => 'update-report-crowdsourcing', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentCrowdsourcingController@update']);
Route::post('/show-report-crowdsourcing', ['as' => 'show-report-crowdsourcing', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentCrowdsourcingController@show']);
Route::post('/delete-report-crowdsourcing', ['as' => 'delete-report-crowdsourcing', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentCrowdsourcingController@destroy']);


Route::get('/list-volunteer-citizen-support', ['as' => 'list-volunteer-citizen-support', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenSupportController@index']);
Route::get('/add-volunteer-citizen-support', ['as' => 'add-volunteer-citizen-support', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenSupportController@add']);
Route::post('/add-volunteer-citizen-support', ['as' => 'add-volunteer-citizen-support', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenSupportController@store']);
Route::post('/edit-volunteer-citizen-support', ['as' => 'edit-volunteer-citizen-support', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenSupportController@edit']);
Route::post('/update-volunteer-citizen-support', ['as' => 'update-volunteer-citizen-support', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenSupportController@update']);
Route::post('/show-volunteer-citizen-support', ['as' => 'show-volunteer-citizen-support', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenSupportController@show']);
Route::post('/delete-volunteer-citizen-support', ['as' => 'delete-volunteer-citizen-support', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenSupportController@destroy']);

Route::get('/list-citizen-feedback-and-suggestion', ['as' => 'list-citizen-feedback-and-suggestion', 'uses' => 'App\Http\Controllers\CitizenAction\CitizenFeedbackSuggestionsController@index']);
Route::get('/add-citizen-feedback-and-suggestion', ['as' => 'add-citizen-feedback-and-suggestion', 'uses' => 'App\Http\Controllers\CitizenAction\CitizenFeedbackSuggestionsController@add']);
Route::post('/add-citizen-feedback-and-suggestion', ['as' => 'add-citizen-feedback-and-suggestion', 'uses' => 'App\Http\Controllers\CitizenAction\CitizenFeedbackSuggestionsController@store']);
Route::post('/edit-citizen-feedback-and-suggestion', ['as' => 'edit-citizen-feedback-and-suggestion', 'uses' => 'App\Http\Controllers\CitizenAction\CitizenFeedbackSuggestionsController@edit']);
Route::post('/update-citizen-feedback-and-suggestion', ['as' => 'update-citizen-feedback-and-suggestion', 'uses' => 'App\Http\Controllers\CitizenAction\CitizenFeedbackSuggestionsController@update']);
Route::post('/show-citizen-feedback-and-suggestion', ['as' => 'show-citizen-feedback-and-suggestion', 'uses' => 'App\Http\Controllers\CitizenAction\CitizenFeedbackSuggestionsController@show']);
Route::post('/delete-citizen-feedback-and-suggestion', ['as' => 'delete-citizen-feedback-and-suggestion', 'uses' => 'App\Http\Controllers\CitizenAction\CitizenFeedbackSuggestionsController@destroy']);

//=======Header=======
Route::get('/list-social-icon', ['as' => 'list-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@index']);
Route::get('/add-social-icon', ['as' => 'add-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@add']);
Route::post('/add-social-icon', ['as' => 'add-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@store']);
Route::post('/edit-social-icon', ['as' => 'edit-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@edit']);
Route::post('/update-social-icon', ['as' => 'update-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@update']);
Route::post('/show-social-icon', ['as' => 'show-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@show']);
Route::post('/delete-social-icon', ['as' => 'delete-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@destroy']);

Route::get('/list-sub-header-info', ['as' => 'list-sub-header-info', 'uses' => 'App\Http\Controllers\Header\SubHeaderInfoController@index']);
Route::get('/add-sub-header-info', ['as' => 'add-sub-header-info', 'uses' => 'App\Http\Controllers\Header\SubHeaderInfoController@add']);
Route::post('/add-sub-header-info', ['as' => 'add-sub-header-info', 'uses' => 'App\Http\Controllers\Header\SubHeaderInfoController@store']);
Route::post('/edit-sub-header-info', ['as' => 'edit-sub-header-info', 'uses' => 'App\Http\Controllers\Header\SubHeaderInfoController@edit']);
Route::post('/update-sub-header-info', ['as' => 'update-sub-header-info', 'uses' => 'App\Http\Controllers\Header\SubHeaderInfoController@update']);
Route::post('/show-sub-header-info', ['as' => 'show-sub-header-info', 'uses' => 'App\Http\Controllers\Header\SubHeaderInfoController@show']);
Route::post('/delete-sub-header-info', ['as' => 'delete-sub-header-info', 'uses' => 'App\Http\Controllers\Header\SubHeaderInfoController@destroy']);


Route::get('/list-event', ['as' => 'list-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@index']);
Route::get('/add-event', ['as' => 'add-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@add']);
Route::post('/add-event', ['as' => 'add-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@store']);
Route::post('/edit-event', ['as' => 'edit-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@edit']);
Route::post('/update-event', ['as' => 'update-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@update']);
Route::post('/show-event', ['as' => 'show-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@show']);
Route::post('/delete-event', ['as' => 'delete-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@destroy']);


Route::get('/log-out', ['as' => 'log-out', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@logout']);

});