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

Route::get('/error-handling', ['as' => 'error-handling', 'uses' => 'App\Http\Controllers\ErrorHandlingController@errorHandling']);



// Route::get('/add-users', function () {
//     return view('admin.pages.users.add-users');
// });

Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@index']);
Route::post('/submitLogin', ['as' => 'submitLogin', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@submitLogin']);

Route::get('/pages/{page}', ['as' => 'pages', 'uses' => 'App\Http\Controllers\Website\DynamicPages\DynamicPagesController@index']);
// Website
Route::get('/index', ['as' => 'index', 'uses' => 'App\Http\Controllers\Website\IndexController@index']);
Route::post('/new-paricular-data-web', ['as' => 'new-paricular-data-web', 'uses' => 'App\Http\Controllers\Website\IndexController@show']);
Route::post('/particular-department-information', ['as' => 'particular-department-information', 'uses' => 'App\Http\Controllers\Website\IndexController@showDepartmentInformation']);
Route::get('/list-vacancies', ['as' => 'list-vacancies', 'uses' => 'App\Http\Controllers\Website\IndexController@showVacancies']);
Route::get('/list-rti', ['as' => 'list-rti', 'uses' => 'App\Http\Controllers\Website\IndexController@showRTI']);

Route::get('/information-map', ['as' => 'information-map', 'uses' => 'App\Http\Controllers\Website\Map\MapController@index']);
Route::post('/information-map-ajax', ['as' => 'information-map-ajax', 'uses' => 'App\Http\Controllers\Website\Map\MapController@mapDataAjax']);

Route::get('/privacy-policy', ['as' => 'privacy-policy', 'uses' => 'App\Http\Controllers\Website\IndexController@getPrivacyPolicy']);
Route::get('/terms_condition', ['as' => 'terms_condition', 'uses' => 'App\Http\Controllers\Website\IndexController@getTermConditions']);



Route::get('/list-disastermanagementportal-web', ['as' => 'list-disastermanagementportal-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllDisasterManagmentPortal']);
Route::get('/list-objectivegoals-web', ['as' => 'list-objectivegoals-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllObjectiveGoals']);
Route::get('/state-disaster-management-authority-web', ['as' => 'state-disaster-management-authority-web', 'uses' => 'App\Http\Controllers\Website\Aboutus\AboutusController@getAllStateDisasterManagementAuthority']);
Route::get('/contact-information', ['as' => 'contact-information', 'uses' => 'App\Http\Controllers\Website\ContactUs\ContactController@getAllContactInformation']);
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

// Route::get('/volunteer-citizen-support-web', ['as' => 'volunteer-citizen-support-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllVolunteerCitizenSupport']);
// Route::get('/list-report-incident-crowdsourcing-web', ['as' => 'list-report-incident-crowdsourcing-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllReportIncidentCrowdsourcing']);
Route::get('/volunteer-citizen-support-web', ['as' => 'volunteer-citizen-support-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllVolunteerCitizenSupport']);
// Route::get('/citizen-feedback-suggestions-web', ['as' => 'citizen-feedback-suggestions-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllCitizenFeedbackSuggestions']);
// Route::get('/citizen-action-modal', ['as' => 'citizen-action-modal', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getModalPage']);


Route::post('/report-modal', ['as' => 'report-modal', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@storeIncidentModalInfo']);
Route::post('/volunteer-modal', ['as' => 'volunteer-modal', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@storeVolunteerModalInfo']);
Route::get('/report-incident-crowdsourcing-web', ['as' => 'report-incident-crowdsourcing-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAllIncidentType']);
Route::get('/add-volunteer-citizen-support-web', ['as' => 'add-volunteer-citizen-support-web', 'uses' => 'App\Http\Controllers\Website\CitizenAction\CitizenActionController@getAddVolunteerCitizenSupport']);


Route::get('/list-upcoming-training-event-web', ['as' => 'list-upcoming-training-event-web', 'uses' => 'App\Http\Controllers\Website\TrainingEvent\EventController@getAllUpcomingEvent']);
Route::get('/list-past-training-event-web', ['as' => 'list-past-training-event-web', 'uses' => 'App\Http\Controllers\Website\TrainingEvent\EventController@getAllPastEvent']);
Route::post('/list-particular-event', ['as' => 'list-particular-event', 'uses' => 'App\Http\Controllers\Website\TrainingEvent\EventController@show']);

Route::get('/list-state-disaster-managementplan-web', ['as' => 'list-state-disaster-managementplan-web', 'uses' => 'App\Http\Controllers\Website\PoliciesLegislation\PoliciesLegislationController@getAllStateDisasterManagementPlan']);
Route::get('/list-district-disaster-managementplan-web', ['as' => 'list-district-disaster-managementplan-web', 'uses' => 'App\Http\Controllers\Website\PoliciesLegislation\PoliciesLegislationController@getAllDistrictDisasterManagementPlan']);
Route::get('/list-state-management-policy-web', ['as' => 'list-state-management-policy-web', 'uses' => 'App\Http\Controllers\Website\PoliciesLegislation\PoliciesLegislationController@getAllStateDisasterManagementPolicy']);
Route::get('/list-relevant-laws-web', ['as' => 'list-relevant-laws-web', 'uses' => 'App\Http\Controllers\Website\PoliciesLegislation\PoliciesLegislationController@getAllRelevantLawsRegulation']);

Route::get('/list-documents-publications-web', ['as' => 'list-documents-publications-web', 'uses' => 'App\Http\Controllers\Website\ResourceCenter\ResourceCenterController@getAllDocumentspublications']);
Route::get('/list-maps-gis-data-web', ['as' => 'list-maps-gis-data-web', 'uses' => 'App\Http\Controllers\Website\ResourceCenter\ResourceCenterController@getAllMapsGISData']);
Route::get('/list-multimedia-web', ['as' => 'list-multimedia-web', 'uses' => 'App\Http\Controllers\Website\ResourceCenter\ResourceCenterController@getAllMultimedia']);
Route::post('/list-ajax-multimedia-web', ['as' => 'list-ajax-multimedia-web', 'uses' => 'App\Http\Controllers\Website\ResourceCenter\ResourceCenterController@getAllAjaxMultimedia']);
Route::get('/list-training-materials-workshops-web', ['as' => 'list-training-materials-workshops-web', 'uses' => 'App\Http\Controllers\Website\ResourceCenter\ResourceCenterController@getAllTraningMaterial']);

Route::get('/list-disaster-management-news-web', ['as' => 'list-disaster-management-news-web', 'uses' => 'App\Http\Controllers\Website\NewsAndEvents\NewsEventsController@getAllDisasterManagementNews']);
Route::get('/list-success-stories-web', ['as' => 'list-success-stories-web', 'uses' => 'App\Http\Controllers\Website\NewsAndEvents\NewsEventsController@getAllSuccessStories']);
Route::post('/list-particular-success-stories-web', ['as' => 'list-particular-success-stories-web', 'uses' => 'App\Http\Controllers\Website\NewsAndEvents\NewsEventsController@show']);

Route::get('/site-map', ['as' => 'site-map', 'uses' => 'App\Http\Controllers\Website\SiteMap\SiteMapController@index']);


// ================================================
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', ['as' => '/dashboard', 'uses' => 'App\Http\Controllers\Admin\Dashboard\DashboardController@index']);
    Route::get('/list-users', ['as' => 'list-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@index']);
    Route::get('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@addUsers']);
    Route::post('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@register']);
    Route::get('/edit-users', ['as' => 'edit-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@editUsers']);
    Route::post('/update-users', ['as' => 'update-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@update']);
    Route::post('/delete-users', ['as' => 'delete-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@delete']);
    Route::post('/show-users', ['as' => 'show-users', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@show']);
    Route::get('/cities', ['as' => 'cities', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@getCities']);

    Route::get('/edit-user-profile', ['as' => 'edit-user-profile', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@editUsersProfile']);
    Route::post('/update-user-profile', ['as' => 'update-user-profile', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@updateProfile']);

    Route::post('/otp-verification', ['as' => 'otp-verification', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@updateEmailOtp']);

    // Route::post('/update--one-user-profile', ['as' => 'update--one-user-profile', 'uses' => 'App\Http\Controllers\LoginRegister\RegisterController@updateOne']);
    
    Route::get('/list-main-menu', ['as' => 'list-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@index']);
    Route::get('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@add']);
    Route::post('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@store']);
    Route::post('/show-main-menu', ['as' => 'show-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@show']);
    Route::post('/delete-main-menu', ['as' => 'delete-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@destroy']);
    Route::get('/edit-main-menu', ['as' => 'edit-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@edit']);
    Route::post('/update-main-menu', ['as' => 'update-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@update']);

    Route::get('/list-sub-menu', ['as' => 'list-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@index']);
    Route::get('/add-sub-menu', ['as' => 'add-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@add']);
    Route::post('/add-sub-menu', ['as' => 'add-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@store']);
    Route::post('/show-sub-menu', ['as' => 'show-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@show']);
    Route::post('/delete-sub-menu', ['as' => 'delete-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@destroy']);
    Route::get('/edit-sub-menu', ['as' => 'edit-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@edit']);
    Route::post('/update-sub-menu', ['as' => 'update-sub-menu', 'uses' => 'App\Http\Controllers\Menu\SubMenuController@update']);


    Route::get('/list-dynamic-page', ['as' => 'list-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@index']);
    Route::get('/add-dynamic-page', ['as' => 'add-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@add']);
    Route::post('/add-dynamic-page', ['as' => 'add-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@store']);
    Route::post('/show-dynamic-page', ['as' => 'show-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@show']);
    Route::post('/delete-dynamic-page', ['as' => 'delete-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@destroy']);
    Route::get('/edit-dynamic-page', ['as' => 'edit-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@edit']);
    Route::post('/update-dynamic-page', ['as' => 'update-dynamic-page', 'uses' => 'App\Http\Controllers\DynamicPages\DynamicPagesController@update']);

    Route::get('/list-marquee', ['as' => 'list-marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@index']);
    Route::get('/add-marquee', ['as' => 'add-marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@add']);
    Route::post('/add-marquee', ['as' => 'add-marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@store']);
    Route::get('/edit-marquee', ['as' => 'edit-marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@edit']);
    Route::post('/update-marquee', ['as' => 'update-marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@update']);
    Route::post('/show-marquee', ['as' => 'show-marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@show']);
    Route::post('/delete-marquee', ['as' => 'delete-marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@destroy']);
    Route::post('/update-one_marquee', ['as' => 'update-one_marquee', 'uses' => 'App\Http\Controllers\Admin\Home\MarqueeController@updateOne']);

    Route::get('/list-slide', ['as' => 'list-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@index']);
    Route::get('/add-slide', ['as' => 'add-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@add']);
    Route::post('/add-slide', ['as' => 'add-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@store']);
    Route::get('/edit-slide', ['as' => 'edit-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@edit']);
    Route::post('/update-slide', ['as' => 'update-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@update']);
    Route::post('/show-slide', ['as' => 'show-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@show']);
    Route::post('/delete-slide', ['as' => 'delete-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@destroy']);
    Route::post('/update-active-slide', ['as' => 'update-active-slide', 'uses' => 'App\Http\Controllers\Admin\Home\SliderController@updateOne']);
    
    Route::get('/list-weather', ['as' => 'list-weather', 'uses' => 'App\Http\Controllers\Admin\Home\WeatherController@index']);
    Route::get('/add-weather', ['as' => 'add-weather', 'uses' => 'App\Http\Controllers\Admin\Home\WeatherController@add']);
    Route::post('/add-weather', ['as' => 'add-weather', 'uses' => 'App\Http\Controllers\Admin\Home\WeatherController@store']);
    Route::get('/edit-weather', ['as' => 'edit-weather', 'uses' => 'App\Http\Controllers\Admin\Home\WeatherController@edit']);
    Route::post('/update-weather', ['as' => 'update-weather', 'uses' => 'App\Http\Controllers\Admin\Home\WeatherController@update']);
    Route::post('/show-weather', ['as' => 'show-weather', 'uses' => 'App\Http\Controllers\Admin\Home\WeatherController@show']);
    Route::post('/delete-weather', ['as' => 'delete-weather', 'uses' => 'App\Http\Controllers\Admin\Home\WeatherController@destroy']);

    Route::get('/list-disasterforcast', ['as' => 'list-disasterforcast', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterForcastController@index']);
    Route::get('/add-disasterforcast', ['as' => 'add-disasterforcast', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterForcastController@add']);
    Route::post('/add-disasterforcast', ['as' => 'add-disasterforcast', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterForcastController@store']);
    Route::get('/edit-disasterforcast', ['as' => 'edit-disasterforcast', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterForcastController@edit']);
    Route::post('/update-disasterforcast', ['as' => 'update-disasterforcast', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterForcastController@update']);
    Route::post('/show-disasterforcast', ['as' => 'show-disasterforcast', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterForcastController@show']);
    Route::post('/delete-disasterforcast', ['as' => 'delete-disasterforcast', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterForcastController@destroy']);

    Route::get('/list-department-information', ['as' => 'list-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@index']);
    Route::get('/add-department-information', ['as' => 'add-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@add']);
    Route::post('/add-department-information', ['as' => 'add-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@store']);
    Route::get('/edit-department-information', ['as' => 'edit-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@edit']);
    Route::post('/update-department-information', ['as' => 'update-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@update']);
    Route::post('/show-department-information', ['as' => 'show-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@show']);
    Route::post('/delete-department-information', ['as' => 'delete-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@destroy']);
    Route::post('/update-one-department-information', ['as' => 'update-one-department-information', 'uses' => 'App\Http\Controllers\Admin\Home\DepartmentInformationController@updateOne']);

    Route::get('/list-objectivegoals', ['as' => 'list-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@index']);
    Route::get('/add-objectivegoals', ['as' => 'add-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@add']);
    Route::post('/add-objectivegoals', ['as' => 'add-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@store']);
    Route::post('/show-objectivegoals', ['as' => 'show-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@show']);
    Route::post('/delete-objectivegoals', ['as' => 'delete-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@destroy']);
    Route::get('/edit-objectivegoals', ['as' => 'edit-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@edit']);
    Route::post('/update-objectivegoals', ['as' => 'update-objectivegoals', 'uses' => 'App\Http\Controllers\Aboutus\ObjectiveGoalsController@update']);
    
    Route::get('/list-disastermanagementportal', ['as' => 'list-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@index']);
    Route::get('/add-disastermanagementportal', ['as' => 'add-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@add']);
    Route::post('/add-disastermanagementportal', ['as' => 'add-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@store']);
    Route::post('/show-disastermanagementportal', ['as' => 'show-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@show']);
    Route::post('/delete-disastermanagementportal', ['as' => 'delete-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@destroy']);
    Route::get('/edit-disastermanagementportal', ['as' => 'edit-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@edit']);
    Route::post('/update-disastermanagementportal', ['as' => 'update-disastermanagementportal', 'uses' => 'App\Http\Controllers\Aboutus\DisasterManagementPortalController@update']);
    
    Route::get('/list-statedisastermanagementauthority', ['as' => 'list-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@index']);
    Route::get('/add-statedisastermanagementauthority', ['as' => 'add-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@add']);
    Route::post('/add-statedisastermanagementauthority', ['as' => 'add-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@store']);
    Route::post('/show-statedisastermanagementauthority', ['as' => 'show-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@show']);
    Route::post('/delete-statedisastermanagementauthority', ['as' => 'delete-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@destroy']);
    Route::get('/edit-statedisastermanagementauthority', ['as' => 'edit-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@edit']);
    Route::post('/update-statedisastermanagementauthority', ['as' => 'update-statedisastermanagementauthority', 'uses' => 'App\Http\Controllers\Aboutus\StateDisasterManagementAuthorityController@update']);
    
    // Route::get('/list-main-menu', ['as' => 'list-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@index']);
    // Route::get('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@add']);
    // Route::post('/add-main-menu', ['as' => 'add-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@store']);
    // Route::post('/show-main-menu', ['as' => 'show-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@show']);
    // Route::post('/delete-main-menu', ['as' => 'delete-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@destroy']);
    // Route::post('/edit-main-menu', ['as' => 'edit-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@edit']);
    // Route::post('/update-main-menu', ['as' => 'update-main-menu', 'uses' => 'App\Http\Controllers\Menu\MainMenuController@update']);

    Route::get('/list-metadata', ['as' => 'list-metadata', 'uses' => 'App\Http\Controllers\MetadataController@index']);
    Route::get('/add-metadata', ['as' => 'add-metadata', 'uses' => 'App\Http\Controllers\MetadataController@add']);
    Route::post('/add-metadata', ['as' => 'add-metadata', 'uses' => 'App\Http\Controllers\MetadataController@store']);
    Route::post('/show-metadata', ['as' => 'show-metadata', 'uses' => 'App\Http\Controllers\MetadataController@show']);
    Route::post('/delete-metadata', ['as' => 'delete-metadata', 'uses' => 'App\Http\Controllers\MetadataController@destroy']);
    Route::post('/edit-metadata', ['as' => 'edit-metadata', 'uses' => 'App\Http\Controllers\MetadataController@edit']);
    Route::post('/update-metadata', ['as' => 'update-metadata', 'uses' => 'App\Http\Controllers\MetadataController@update']);    
    
    
    Route::get('/list-emergency-contact', ['as' => 'list-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@index']);
    Route::get('/add-emergency-contact', ['as' => 'add-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@add']);
    Route::post('/add-emergency-contact', ['as' => 'add-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@store']);
    Route::get('/edit-emergency-contact', ['as' => 'edit-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@edit']);
    Route::post('/update-emergency-contact', ['as' => 'update-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@update']);
    Route::post('/show-emergency-contact', ['as' => 'show-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@show']);
    Route::post('/delete-emergency-contact', ['as' => 'delete-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@destroy']);
    Route::post('/update-one-emergency-contact', ['as' => 'update-one-emergency-contact', 'uses' => 'App\Http\Controllers\Admin\Home\EmergencyContactController@updateOne']);


    Route::get('/list-disaster-management-news', ['as' => 'list-disaster-management-news', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@index']);
    Route::get('/add-disaster-management-news', ['as' => 'add-disaster-management-news', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@add']);
    Route::post('/add-disaster-management-news', ['as' => 'add-disaster-management-news', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@store']);
    Route::get('/edit-disaster-management-news', ['as' => 'edit-disaster-management-news', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@edit']);
    Route::post('/update-disaster-management-news', ['as' => 'update-disaster-management-news', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@update']);
    Route::post('/show-disaster-management-news', ['as' => 'show-disaster-management-news', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@show']);
    Route::post('/delete-disaster-management-news', ['as' => 'delete-disaster-management-news', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@destroy']);
    Route::post('/update-one', ['as' => 'update-one', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementNewsController@updateOne']);

    Route::get('/list-website-contact', ['as' => 'list-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@index']);
    Route::get('/add-website-contact', ['as' => 'add-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@add']);
    Route::post('/add-website-contact', ['as' => 'add-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@store']);
    Route::get('/edit-website-contact', ['as' => 'edit-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@edit']);
    Route::post('/update-website-contact', ['as' => 'update-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@update']);
    Route::post('/show-website-contact', ['as' => 'show-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@show']);
    Route::post('/delete-website-contact', ['as' => 'delete-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@destroy']);
    Route::post('/update-one-website-contact', ['as' => 'update-one-website-contact', 'uses' => 'App\Http\Controllers\Admin\Home\WebsiteContactController@updateOne']);
    
    Route::get('/list-disaster-management-web-portal', ['as' => 'list-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementWebPortalController@index']);
    Route::get('/add-disaster-management-web-portal', ['as' => 'add-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementWebPortalController@add']);
    Route::post('/add-disaster-management-web-portal', ['as' => 'add-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementWebPortalController@store']);
    Route::get('/edit-disaster-management-web-portal', ['as' => 'edit-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementWebPortalController@edit']);
    Route::post('/update-disaster-management-web-portal', ['as' => 'update-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementWebPortalController@update']);
    Route::post('/show-disaster-management-web-portal', ['as' => 'show-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementWebPortalController@show']);
    Route::post('/delete-disaster-management-web-portal', ['as' => 'delete-disaster-management-web-portal', 'uses' => 'App\Http\Controllers\Admin\Home\DisasterManagementWebPortalController@destroy']);
    
    Route::get('/list-hazard-vulnerability-assessment', ['as' => 'list-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@index']);
    Route::get('/add-hazard-vulnerability-assessment', ['as' => 'add-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@add']);
    Route::post('/add-hazard-vulnerability-assessment', ['as' => 'add-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@store']);
    Route::get('/edit-hazard-vulnerability-assessment', ['as' => 'edit-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@edit']);
    Route::post('/update-hazard-vulnerability-assessment', ['as' => 'update-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@update']);
    Route::post('/show-hazard-vulnerability-assessment', ['as' => 'show-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@show']);
    Route::post('/delete-hazard-vulnerability-assessment', ['as' => 'delete-hazard-vulnerability-assessment', 'uses' => 'App\Http\Controllers\Preparedness\HazardVulnerabilityController@destroy']);

    Route::get('/list-early-warning-system', ['as' => 'list-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@index']);
    Route::get('/add-early-warning-system', ['as' => 'add-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@add']);
    Route::post('/add-early-warning-system', ['as' => 'add-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@store']);
    Route::get('/edit-early-warning-system', ['as' => 'edit-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@edit']);
    Route::post('/update-early-warning-system', ['as' => 'update-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@update']);
    Route::post('/show-early-warning-system', ['as' => 'show-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@show']);
    Route::post('/delete-early-warning-system', ['as' => 'delete-early-warning-system', 'uses' => 'App\Http\Controllers\Preparedness\EarlyWarningSystemController@destroy']);

    Route::get('/list-capacity-building-and-training', ['as' => 'list-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@index']);
    Route::get('/add-capacity-building-and-training', ['as' => 'add-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@add']);
    Route::post('/add-capacity-building-and-training', ['as' => 'add-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@store']);
    Route::get('/edit-capacity-building-and-training', ['as' => 'edit-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@edit']);
    Route::post('/update-capacity-building-and-training', ['as' => 'update-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@update']);
    Route::post('/show-capacity-building-and-training', ['as' => 'show-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@show']);
    Route::post('/delete-capacity-building-and-training', ['as' => 'delete-capacity-building-and-training', 'uses' => 'App\Http\Controllers\Preparedness\CapacityTrainingController@destroy']);

    
    Route::get('/list-public-awareness-and-education', ['as' => 'list-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@index']);
    Route::get('/add-public-awareness-and-education', ['as' => 'add-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@add']);
    Route::post('/add-public-awareness-and-education', ['as' => 'add-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@store']);
    Route::get('/edit-public-awareness-and-education', ['as' => 'edit-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@edit']);
    Route::post('/update-public-awareness-and-education', ['as' => 'update-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@update']);
    Route::post('/show-public-awareness-and-education', ['as' => 'show-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@show']);
    Route::post('/delete-public-awareness-and-education', ['as' => 'delete-public-awareness-and-education', 'uses' => 'App\Http\Controllers\Preparedness\PublicAwarenessEducationController@destroy']);

    // ==========EmergencyResponse=======
    Route::get('/list-state-emergency-operations-center', ['as' => 'list-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@index']);
    Route::get('/add-state-emergency-operations-center', ['as' => 'add-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@add']);
    Route::post('/add-state-emergency-operations-center', ['as' => 'add-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@store']);
    Route::get('/edit-state-emergency-operations-center', ['as' => 'edit-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@edit']);
    Route::post('/update-state-emergency-operations-center', ['as' => 'update-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@update']);
    Route::post('/show-state-emergency-operations-center', ['as' => 'show-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@show']);
    Route::post('/delete-state-emergency-operations-center', ['as' => 'delete-state-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\StateEmergencyOperationsCenterController@destroy']);

    Route::get('/list-district-emergency-operations-center', ['as' => 'list-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@index']);
    Route::get('/add-district-emergency-operations-center', ['as' => 'add-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@add']);
    Route::post('/add-district-emergency-operations-center', ['as' => 'add-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@store']);
    Route::get('/edit-district-emergency-operations-center', ['as' => 'edit-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@edit']);
    Route::post('/update-district-emergency-operations-center', ['as' => 'update-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@update']);
    Route::post('/show-district-emergency-operations-center', ['as' => 'show-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@show']);
    Route::post('/delete-district-emergency-operations-center', ['as' => 'delete-district-emergency-operations-center', 'uses' => 'App\Http\Controllers\EmergencyResponse\DistrictEmergencyOperationsCenterController@destroy']);

    Route::get('/list-emergency-contact-numbers', ['as' => 'list-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@index']);
    Route::get('/add-emergency-contact-numbers', ['as' => 'add-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@add']);
    Route::post('/add-emergency-contact-numbers', ['as' => 'add-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@store']);
    Route::get('/edit-emergency-contact-numbers', ['as' => 'edit-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@edit']);
    Route::post('/update-emergency-contact-numbers', ['as' => 'update-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@update']);
    Route::post('/show-emergency-contact-numbers', ['as' => 'show-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@show']);
    Route::post('/delete-emergency-contact-numbers', ['as' => 'delete-emergency-contact-numbers', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@destroy']);
   
    Route::get('/add-more-emergency-contact-data', ['as' => 'add-more-emergency-contact-data', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@addmore']);
    Route::post('/add-more-emergency-contact-data', ['as' => 'add-more-emergency-contact-data', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@storeaddmore']);
    Route::post('/add-more-emergency-contact-data-delete', ['as' => 'add-more-emergency-contact-data-delete', 'uses' => 'App\Http\Controllers\EmergencyResponse\EmergencyContactNumbersController@deleteaddmore']);
    
    Route::get('/list-evacuation-plans', ['as' => 'list-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@index']);
    Route::get('/add-evacuation-plans', ['as' => 'add-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@add']);
    Route::post('/add-evacuation-plans', ['as' => 'add-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@store']);
    Route::get('/edit-evacuation-plans', ['as' => 'edit-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@edit']);
    Route::post('/update-evacuation-plans', ['as' => 'update-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@update']);
    Route::post('/show-evacuation-plans', ['as' => 'show-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@show']);
    Route::post('/delete-evacuation-plans', ['as' => 'delete-evacuation-plans', 'uses' => 'App\Http\Controllers\EmergencyResponse\EvacuationPlansController@destroy']);
    
    Route::get('/list-relief-measures-resources', ['as' => 'list-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@index']);
    Route::get('/add-relief-measures-resources', ['as' => 'add-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@add']);
    Route::post('/add-relief-measures-resources', ['as' => 'add-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@store']);
    Route::get('/edit-relief-measures-resources', ['as' => 'edit-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@edit']);
    Route::post('/update-relief-measures-resources', ['as' => 'update-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@update']);
    Route::post('/show-relief-measures-resources', ['as' => 'show-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@show']);
    Route::post('/delete-relief-measures-resources', ['as' => 'delete-relief-measures-resources', 'uses' => 'App\Http\Controllers\EmergencyResponse\ReliefMeasuresResourcesController@destroy']);

    Route::get('/list-search-rescue-teams', ['as' => 'list-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@index']);
    Route::get('/add-search-rescue-teams', ['as' => 'add-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@add']);
    Route::post('/add-search-rescue-teams', ['as' => 'add-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@store']);
    Route::get('/edit-search-rescue-teams', ['as' => 'edit-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@edit']);
    Route::post('/update-search-rescue-teams', ['as' => 'update-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@update']);
    Route::post('/show-search-rescue-teams', ['as' => 'show-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@show']);
    Route::post('/delete-search-rescue-teams', ['as' => 'delete-search-rescue-teams', 'uses' => 'App\Http\Controllers\EmergencyResponse\SearchRescueTeamsController@destroy']);

// ===== Citizen Action=======
Route::get('/list-incident-type', ['as' => 'list-incident-type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@index']);
Route::get('/add-incident-type', ['as' => 'add-incident-type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@add']);
Route::post('/add-incident-type', ['as' => 'add-incident-type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@store']);
Route::get('/edit-incident-type', ['as' => 'edit-incident-type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@edit']);
Route::post('/update-incident-type', ['as' => 'update-incident-type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@update']);
Route::post('/show-incident-type', ['as' => 'show-incident-type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@show']);
Route::post('/delete-incident-type', ['as' => 'delete-incident-type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@destroy']);
Route::post('/update-one-incident_type', ['as' => 'update-one-incident_type', 'uses' => 'App\Http\Controllers\Admin\Master\IncidentTypeController@updateOne']);

Route::get('/list-incident-modal-info', ['as' => 'list-incident-modal-info', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentModalController@index']);
Route::get('/list-volunteer-modal-info', ['as' => 'list-volunteer-modal-info', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenModalController@index']);
Route::get('/list-feedback-modal-info', ['as' => 'list-feedback-modal-info', 'uses' => 'App\Http\Controllers\CitizenAction\FeedbackCitizenModalController@index']);
Route::post('/delete-incident-modal-info', ['as' => 'delete-incident-modal-info', 'uses' => 'App\Http\Controllers\CitizenAction\ReportIncidentModalController@destroy']);
Route::post('/delete-volunteer-modal-info', ['as' => 'delete-volunteer-modal-info', 'uses' => 'App\Http\Controllers\CitizenAction\VolunteerCitizenModalController@destroy']);

//=======Header=======
Route::get('/list-social-icon', ['as' => 'list-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@index']);
Route::get('/add-social-icon', ['as' => 'add-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@add']);
Route::post('/add-social-icon', ['as' => 'add-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@store']);
Route::get('/edit-social-icon', ['as' => 'edit-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@edit']);
Route::post('/update-social-icon', ['as' => 'update-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@update']);
Route::post('/show-social-icon', ['as' => 'show-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@show']);
Route::post('/delete-social-icon', ['as' => 'delete-social-icon', 'uses' => 'App\Http\Controllers\Header\SocialIconController@destroy']);

Route::get('/list-tollfree-number', ['as' => 'list-tollfree-number', 'uses' => 'App\Http\Controllers\Header\TollFreeController@index']);
Route::get('/add-tollfree-number', ['as' => 'add-tollfree-number', 'uses' => 'App\Http\Controllers\Header\TollFreeController@add']);
Route::post('/add-tollfree-number', ['as' => 'add-tollfree-number', 'uses' => 'App\Http\Controllers\Header\TollFreeController@store']);
Route::post('/edit-tollfree-number', ['as' => 'edit-tollfree-number', 'uses' => 'App\Http\Controllers\Header\TollFreeController@edit']);
Route::post('/update-tollfree-number', ['as' => 'update-tollfree-number', 'uses' => 'App\Http\Controllers\Header\TollFreeController@update']);
Route::post('/show-tollfree-number', ['as' => 'show-tollfree-number', 'uses' => 'App\Http\Controllers\Header\TollFreeController@show']);
Route::post('/delete-tollfree-number', ['as' => 'delete-tollfree-number', 'uses' => 'App\Http\Controllers\Header\TollFreeController@destroy']);

Route::get('/list-website-logo', ['as' => 'list-website-logo', 'uses' => 'App\Http\Controllers\Header\WebsiteLogoController@index']);
Route::get('/add-website-logo', ['as' => 'add-website-logo', 'uses' => 'App\Http\Controllers\Header\WebsiteLogoController@add']);
Route::post('/add-website-logo', ['as' => 'add-website-logo', 'uses' => 'App\Http\Controllers\Header\WebsiteLogoController@store']);
Route::post('/edit-website-logo', ['as' => 'edit-website-logo', 'uses' => 'App\Http\Controllers\Header\WebsiteLogoController@edit']);
Route::post('/update-website-logo', ['as' => 'update-website-logo', 'uses' => 'App\Http\Controllers\Header\WebsiteLogoController@update']);
Route::post('/show-website-logo', ['as' => 'show-website-logo', 'uses' => 'App\Http\Controllers\Header\WebsiteLogoController@show']);
Route::post('/delete-website-logo', ['as' => 'delete-website-logo', 'uses' => 'App\Http\Controllers\Header\WebsiteLogoController@destroy']);

Route::get('/list-header-vacancies', ['as' => 'list-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@index']);
Route::get('/add-header-vacancies', ['as' => 'add-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@add']);
Route::post('/add-header-vacancies', ['as' => 'add-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@store']);
Route::get('/edit-header-vacancies', ['as' => 'edit-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@edit']);
Route::post('/update-header-vacancies', ['as' => 'update-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@update']);
Route::post('/show-header-vacancies', ['as' => 'show-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@show']);
Route::post('/delete-header-vacancies', ['as' => 'delete-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@destroy']);
Route::post('/update-one-vacancies', ['as' => 'update-one-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@updateOne']);

Route::get('/list-event', ['as' => 'list-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@index']);
Route::get('/add-event', ['as' => 'add-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@add']);
Route::post('/add-event', ['as' => 'add-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@store']);
Route::get('/edit-event', ['as' => 'edit-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@edit']);
Route::post('/update-event', ['as' => 'update-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@update']);
Route::post('/show-event', ['as' => 'show-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@show']);
Route::post('/delete-event', ['as' => 'delete-event', 'uses' => 'App\Http\Controllers\TrainingEvent\EventController@destroy']);

//=========Policies And legislation========
Route::get('/list-state-disaster-management-plan', ['as' => 'list-state-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@index']);
Route::get('/add-state-disaster-management-plan', ['as' => 'add-state-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@add']);
Route::post('/add-state-disaster-management-plan', ['as' => 'add-state-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@store']);
Route::get('/edit-state-disaster-management-plan', ['as' => 'edit-state-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@edit']);
Route::post('/update-state-disaster-management-plan', ['as' => 'update-state-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@update']);
Route::post('/show-state-disaster-management-plan', ['as' => 'show-state-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@show']);
Route::post('/delete-state-disaster-management-plan', ['as' => 'delete-state-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@destroy']);
Route::post('/update-one-state_disaster', ['as' => 'update-one-state_disaster', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPlanController@updateOne']);

Route::get('/list-district-disaster-management-plan', ['as' => 'list-district-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@index']);
Route::get('/add-district-disaster-management-plan', ['as' => 'add-district-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@add']);
Route::post('/add-district-disaster-management-plan', ['as' => 'add-district-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@store']);
Route::get('/edit-district-disaster-management-plan', ['as' => 'edit-district-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@edit']);
Route::post('/update-district-disaster-management-plan', ['as' => 'update-district-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@update']);
Route::post('/show-district-disaster-management-plan', ['as' => 'show-district-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@show']);
Route::post('/delete-district-disaster-management-plan', ['as' => 'delete-district-disaster-management-plan', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@destroy']);
Route::post('/update-one-disaster', ['as' => 'update-one-disaster', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\DistrictDisasterManagementPlanController@updateOne']);

Route::get('/list-state-disaster-management-policy', ['as' => 'list-state-disaster-management-policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@index']);
Route::get('/add-state-disaster-management-policy', ['as' => 'add-state-disaster-management-policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@add']);
Route::post('/add-state-disaster-management-policy', ['as' => 'add-state-disaster-management-policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@store']);
Route::get('/edit-state-disaster-management-policy', ['as' => 'edit-state-disaster-management-policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@edit']);
Route::post('/update-state-disaster-management-policy', ['as' => 'update-state-disaster-management-policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@update']);
Route::post('/show-state-disaster-management-policy', ['as' => 'show-state-disaster-management-policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@show']);
Route::post('/delete-state-disaster-management-policy', ['as' => 'delete-state-disaster-management-policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@destroy']);
Route::post('/update-one-disaster_policy', ['as' => 'update-one-disaster_policy', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\StateDisasterManagementPolicyController@updateOne']);

Route::get('/list-relevant-laws-and-regulations', ['as' => 'list-relevant-laws-and-regulations', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@index']);
Route::get('/add-relevant-laws-and-regulations', ['as' => 'add-relevant-laws-and-regulations', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@add']);
Route::post('/add-relevant-laws-and-regulations', ['as' => 'add-relevant-laws-and-regulations', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@store']);
Route::get('/edit-relevant-laws-and-regulations', ['as' => 'edit-relevant-laws-and-regulations', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@edit']);
Route::post('/update-relevant-laws-and-regulations', ['as' => 'update-relevant-laws-and-regulations', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@update']);
Route::post('/show-relevant-laws-and-regulations', ['as' => 'show-relevant-laws-and-regulations', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@show']);
Route::post('/delete-relevant-laws-and-regulations', ['as' => 'delete-relevant-laws-and-regulations', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@destroy']);
Route::post('/update-one-relevant_law', ['as' => 'update-one-relevant_law', 'uses' => 'App\Http\Controllers\Admin\PoliciesLegislation\RelevantLawsRegulationsController@updateOne']);

//=======Research And Center==========

Route::get('/list-document-publications', ['as' => 'list-document-publications', 'uses' => 'App\Http\Controllers\ResourceCenter\DocumentPublicationsController@index']);
Route::get('/add-document-publications', ['as' => 'add-document-publications', 'uses' => 'App\Http\Controllers\ResourceCenter\DocumentPublicationsController@add']);
Route::post('/add-document-publications', ['as' => 'add-document-publications', 'uses' => 'App\Http\Controllers\ResourceCenter\DocumentPublicationsController@store']);
Route::get('/edit-document-publications', ['as' => 'edit-document-publications', 'uses' => 'App\Http\Controllers\ResourceCenter\DocumentPublicationsController@edit']);
Route::post('/update-document-publications', ['as' => 'update-document-publications', 'uses' => 'App\Http\Controllers\ResourceCenter\DocumentPublicationsController@update']);
Route::post('/show-document-publications', ['as' => 'show-document-publications', 'uses' => 'App\Http\Controllers\ResourceCenter\DocumentPublicationsController@show']);
Route::post('/delete-document-publications', ['as' => 'delete-document-publications', 'uses' => 'App\Http\Controllers\ResourceCenter\DocumentPublicationsController@destroy']);

Route::get('/list-training-workshop', ['as' => 'list-training-workshop', 'uses' => 'App\Http\Controllers\ResourceCenter\TrainingWorkshopController@index']);
Route::get('/add-training-workshop', ['as' => 'add-training-workshop', 'uses' => 'App\Http\Controllers\ResourceCenter\TrainingWorkshopController@add']);
Route::post('/add-training-workshop', ['as' => 'add-training-workshop', 'uses' => 'App\Http\Controllers\ResourceCenter\TrainingWorkshopController@store']);
Route::post('/edit-training-workshop', ['as' => 'edit-training-workshop', 'uses' => 'App\Http\Controllers\ResourceCenter\TrainingWorkshopController@edit']);
Route::post('/update-training-workshop', ['as' => 'update-training-workshop', 'uses' => 'App\Http\Controllers\ResourceCenter\TrainingWorkshopController@update']);
Route::post('/show-training-workshop', ['as' => 'show-training-workshop', 'uses' => 'App\Http\Controllers\ResourceCenter\TrainingWorkshopController@show']);
Route::post('/delete-training-workshop', ['as' => 'delete-training-workshop', 'uses' => 'App\Http\Controllers\ResourceCenter\TrainingWorkshopController@destroy']);

//======News And Events=======
Route::get('/list-success-stories', ['as' => 'list-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@index']);
Route::get('/add-success-stories', ['as' => 'add-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@add']);
Route::post('/add-success-stories', ['as' => 'add-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@store']);
Route::get('/edit-success-stories', ['as' => 'edit-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@edit']);
Route::post('/update-success-stories', ['as' => 'update-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@update']);
Route::post('/show-success-stories', ['as' => 'show-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@show']);
Route::post('/delete-success-stories', ['as' => 'delete-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@destroy']);
Route::post('/update-one-success-stories', ['as' => 'update-one-success-stories', 'uses' => 'App\Http\Controllers\NewsAndEvents\SuccessStoriesController@updateOne']);

Route::get('/list-gallery-category', ['as' => 'list-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@index']);
Route::get('/add-gallery-category', ['as' => 'add-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@add']);
Route::post('/add-gallery-category', ['as' => 'add-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@store']);
Route::get('/edit-gallery-category', ['as' => 'edit-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@edit']);
Route::post('/update-gallery-category', ['as' => 'update-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@update']);
Route::post('/show-gallery-category', ['as' => 'show-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@show']);
Route::post('/delete-gallery-category', ['as' => 'delete-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@destroy']);
Route::post('/update-one-gallery-category', ['as' => 'update-one-gallery-category', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryCategoryController@updateOne']);

Route::get('/list-gallery', ['as' => 'list-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@index']);
Route::get('/add-gallery', ['as' => 'add-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@add']);
Route::post('/add-gallery', ['as' => 'add-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@store']);
Route::get('/edit-gallery', ['as' => 'edit-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@edit']);
Route::post('/update-gallery', ['as' => 'update-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@update']);
Route::post('/show-gallery', ['as' => 'show-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@show']);
Route::post('/delete-gallery', ['as' => 'delete-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@destroy']);
Route::post('/update-one-gallery', ['as' => 'update-one-gallery', 'uses' => 'App\Http\Controllers\ResourceCenter\GalleryController@updateOne']);

Route::get('/list-video', ['as' => 'list-video', 'uses' => 'App\Http\Controllers\ResourceCenter\VideoController@index']);
Route::get('/add-video', ['as' => 'add-video', 'uses' => 'App\Http\Controllers\ResourceCenter\VideoController@add']);
Route::post('/add-video', ['as' => 'add-video', 'uses' => 'App\Http\Controllers\ResourceCenter\VideoController@store']);
Route::get('/edit-video', ['as' => 'edit-video', 'uses' => 'App\Http\Controllers\ResourceCenter\VideoController@edit']);
Route::post('/update-video', ['as' => 'update-video', 'uses' => 'App\Http\Controllers\ResourceCenter\VideoController@update']);
Route::post('/show-video', ['as' => 'show-video', 'uses' => 'App\Http\Controllers\ResourceCenter\VideoController@show']);
Route::post('/delete-video', ['as' => 'delete-video', 'uses' => 'App\Http\Controllers\ResourceCenter\VideoController@destroy']);

Route::get('/list-map-lat-lons', ['as' => 'list-map-lat-lons', 'uses' => 'App\Http\Controllers\ResourceCenter\MapLatLonController@index']);
Route::get('/add-map-lot-lons', ['as' => 'add-map-lot-lons', 'uses' => 'App\Http\Controllers\ResourceCenter\MapLatLonController@add']);
Route::post('/add-map-lot-lons', ['as' => 'add-map-lot-lons', 'uses' => 'App\Http\Controllers\ResourceCenter\MapLatLonController@store']);
Route::get('/edit-map-lot-lons', ['as' => 'edit-map-lot-lons', 'uses' => 'App\Http\Controllers\ResourceCenter\MapLatLonController@edit']);
Route::post('/update-map-lot-lons', ['as' => 'update-map-lot-lons', 'uses' => 'App\Http\Controllers\ResourceCenter\MapLatLonController@update']);
Route::post('/show-map-lot-lons', ['as' => 'show-map-lot-lons', 'uses' => 'App\Http\Controllers\ResourceCenter\MapLatLonController@show']);
Route::post('/delete-map-lot-lons', ['as' => 'delete-map-lot-lons', 'uses' => 'App\Http\Controllers\ResourceCenter\MapLatLonController@destroy']);

// =======Contact Us==========

Route::get('/list-contact-suggestion', ['as' => 'list-contact-suggestion', 'uses' => 'App\Http\Controllers\ContactUs\ContactUsController@index']);
Route::get('/add-contact-suggestion', ['as' => 'add-contact-suggestion', 'uses' => 'App\Http\Controllers\ContactUs\ContactUsController@add']);
Route::post('/add-contact-suggestion', ['as' => 'add-contact-suggestion', 'uses' => 'App\Http\Controllers\ContactUs\ContactUsController@store']);
Route::post('/edit-contact-suggestion', ['as' => 'edit-contact-suggestion', 'uses' => 'App\Http\Controllers\ContactUs\ContactUsController@edit']);
Route::post('/update-contact-suggestion', ['as' => 'update-contact-suggestion', 'uses' => 'App\Http\Controllers\ContactUs\ContactUsController@update']);
Route::post('/show-contact-suggestion', ['as' => 'show-contact-suggestion', 'uses' => 'App\Http\Controllers\ContactUs\ContactUsController@show']);
Route::post('/delete-contact-suggestion', ['as' => 'delete-contact-suggestion', 'uses' => 'App\Http\Controllers\ContactUs\ContactUsController@destroy']);
// Route::post('/update-one-contact-suggestion', ['as' => 'update-one-gallery', 'uses' => 'App\Http\Controllers\NewsAndEvents\GalleryController@updateOne']);

//=====Roles Route======
Route::get('/list-role', ['as' => 'list-role', 'uses' => 'App\Http\Controllers\Menu\RoleController@index']);
Route::get('/add-role', ['as' => 'add-role', 'uses' => 'App\Http\Controllers\Menu\RoleController@add']);
Route::post('/add-role', ['as' => 'add-role', 'uses' => 'App\Http\Controllers\Menu\RoleController@store']);
Route::get('/edit-role', ['as' => 'edit-role', 'uses' => 'App\Http\Controllers\Menu\RoleController@edit']);
Route::post('/update-role', ['as' => 'update-role','uses' => 'App\Http\Controllers\Menu\RoleController@update']);
Route::post('/show-role', ['as' => 'show-role', 'uses' => 'App\Http\Controllers\Menu\RoleController@show']);
Route::post('/delete-role', ['as' => 'delete-role', 'uses' => 'App\Http\Controllers\Menu\RoleController@destroy']);
Route::post('/update-one-role', ['as' => 'update-one-role', 'uses' => 'App\Http\Controllers\Menu\RoleController@updateOneRole']);
Route::post('/list-role-wise-permission', ['as' => 'list-role-wise-permission', 'uses' => 'App\Http\Controllers\Menu\RoleController@listRoleWisePermission']);



//=====Footer Route======
Route::get('/list-important-link', ['as' => 'list-important-link', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@index']);
Route::get('/add-important-link', ['as' => 'add-important-link', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@add']);
Route::post('/add-important-link', ['as' => 'add-important-link', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@store']);
Route::get('/edit-important-link', ['as' => 'edit-important-link', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@edit']);
Route::post('/update-important-link', ['as' => 'update-important-link','uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@update']);
Route::post('/show-important-link', ['as' => 'show-important-link', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@show']);
Route::post('/delete-important-link', ['as' => 'delete-important-link', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@destroy']);
Route::post('/update-one-important-link', ['as' => 'update-one-important-link', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@updateOne']);

Route::get('/list-tweeter-feed', ['as' => 'list-tweeter-feed', 'uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@index']);
Route::get('/add-tweeter-feed', ['as' => 'add-tweeter-feed', 'uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@add']);
Route::post('/add-tweeter-feed', ['as' => 'add-tweeter-feed', 'uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@store']);
Route::get('/edit-tweeter-feed', ['as' => 'edit-tweeter-feed', 'uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@edit']);
Route::post('/update-tweeter-feed', ['as' => 'update-tweeter-feed','uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@update']);
Route::post('/show-tweeter-feed', ['as' => 'show-tweeter-feed', 'uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@show']);
Route::post('/delete-tweeter-feed', ['as' => 'delete-tweeter-feed', 'uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@destroy']);
Route::post('/update-one-tweeter-feed', ['as' => 'update-one-tweeter-feed', 'uses' => 'App\Http\Controllers\Footer\TweeterFeedsController@updateOne']);

Route::get('/list-privacy-policy', ['as' => 'list-privacy-policy', 'uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@index']);
Route::get('/add-privacy-policy', ['as' => 'add-privacy-policy', 'uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@add']);
Route::post('/add-privacy-policy', ['as' => 'add-privacy-policy', 'uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@store']);
Route::get('/edit-privacy-policy', ['as' => 'edit-privacy-policy', 'uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@edit']);
Route::post('/update-privacy-policy', ['as' => 'update-privacy-policy','uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@update']);
Route::post('/show-privacy-policy', ['as' => 'show-privacy-policy', 'uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@show']);
Route::post('/delete-privacy-policy', ['as' => 'delete-privacy-policy', 'uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@destroy']);
// Route::post('/update-one-privacy-policy', ['as' => 'update-one-privacy-policy', 'uses' => 'App\Http\Controllers\Footer\PolicyPrivacyController@updateOne']);

Route::get('/list-terms-conditions', ['as' => 'list-terms-conditions', 'uses' => 'App\Http\Controllers\Footer\TermsConditionController@index']);
Route::get('/add-terms-conditions', ['as' => 'add-terms-conditions', 'uses' => 'App\Http\Controllers\Footer\TermsConditionController@add']);
Route::post('/add-terms-conditions', ['as' => 'add-terms-conditions', 'uses' => 'App\Http\Controllers\Footer\TermsConditionController@store']);
Route::get('/edit-terms-conditions', ['as' => 'edit-terms-conditions', 'uses' => 'App\Http\Controllers\Footer\TermsConditionController@edit']);
Route::post('/update-terms-conditions', ['as' => 'update-terms-conditions','uses' => 'App\Http\Controllers\Footer\TermsConditionController@update']);
Route::post('/show-terms-conditions', ['as' => 'show-terms-conditions', 'uses' => 'App\Http\Controllers\Footer\TermsConditionController@show']);
Route::post('/delete-terms-conditions', ['as' => 'delete-terms-conditions', 'uses' => 'App\Http\Controllers\Footer\TermsConditionController@destroy']);
// Route::post('/update-one-terms-conditions', ['as' => 'update-one-terms-conditions', 'uses' => 'App\Http\Controllers\Footer\TermsConditionController@updateOne']);

//====Header Vacancies=====
Route::get('/list-header-vacancies', ['as' => 'list-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@index']);
Route::get('/add-header-vacancies', ['as' => 'add-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@add']);
Route::post('/add-header-vacancies', ['as' => 'add-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@store']);
Route::get('/edit-header-vacancies', ['as' => 'edit-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@edit']);
Route::post('/update-header-vacancies', ['as' => 'update-header-vacancies','uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@update']);
Route::post('/show-header-vacancies', ['as' => 'show-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@show']);
Route::post('/delete-header-vacancies', ['as' => 'delete-header-vacancies', 'uses' => 'App\Http\Controllers\Header\VacanciesHeaderController@destroy']);
Route::post('/update-one-header-vacancies', ['as' => 'update-one-header-vacancies', 'uses' => 'App\Http\Controllers\Footer\FooterImportantLinksController@updateOne']);

Route::get('/list-header-rti', ['as' => 'list-header-rti', 'uses' => 'App\Http\Controllers\Header\RTIController@index']);
Route::get('/add-header-rti', ['as' => 'add-header-rti', 'uses' => 'App\Http\Controllers\Header\RTIController@add']);
Route::post('/add-header-rti', ['as' => 'add-header-rti', 'uses' => 'App\Http\Controllers\Header\RTIController@store']);
Route::get('/edit-header-rti', ['as' => 'edit-header-rti', 'uses' => 'App\Http\Controllers\Header\RTIController@edit']);
Route::post('/update-header-rti', ['as' => 'update-header-rti','uses' => 'App\Http\Controllers\Header\RTIController@update']);
Route::post('/show-header-rti', ['as' => 'show-header-rti', 'uses' => 'App\Http\Controllers\Header\RTIController@show']);
Route::post('/delete-header-rti', ['as' => 'delete-header-rti', 'uses' => 'App\Http\Controllers\Header\RTIController@destroy']);
Route::post('/update-one-rti', ['as' => 'update-one-rti', 'uses' => 'App\Http\Controllers\Header\RTIController@updateOne']);

Route::get('/db-backup', ['as' => 'db-backup', 'uses' => 'App\Http\Controllers\DBBackup\DBBackupController@downloadBackup']);


Route::get('/log-out', ['as' => 'log-out', 'uses' => 'App\Http\Controllers\LoginRegister\LoginController@logout']);

});