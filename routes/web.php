<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
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

$controller_path = 'App\Http\Controllers';

Route::get('/total-books', [DocumentController::class, 'dashboardAnalytics']);
// Main Page Route
Route::get('/', $controller_path . '\authentications\LoginBasic@index')->name('out');
//Route::get('/dashboard/dashboards-analytics', $controller_path . '\dashboard\Analytics@dashboardAnalytics');
Route::get('/dashboard/dashboards-analytics/{name}', '\App\Http\Controllers\dashboard\Analytics@dashboardAnalytics')->name('dash');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');
///Periodique
// Create a new periodique (POST request)
Route::post('/pages/Periodique', '\App\Http\Controllers\pages\PeriodiqueController@store')->name('store');
Route::get('/pages/Periodique', '\App\Http\Controllers\pages\PeriodiqueController@create')->name('create');

// View the list of periodiques (GET request)
//Route::get('/pages/Periodique', '\App\Http\Controllers\pages\PeriodiqueController@index')->name('periodique.index');
//Usules 
Route::get('/pages/Usuels',$controller_path . '\pages\UsuelsController@index')->name('index');

//Reservation 
Route::get('/pages/Reserver',$controller_path . '\pages\ReserverController@index')->name('index');

//Preter
Route::get('/pages/Preter',$controller_path . '\pages\PreterController@index')->name('index');
Route::post('/pages/Reserver/{Revervation_id}', '\App\Http\Controllers\pages\PreterController@preter')->name('preter');

//Livre
Route::get('/pages/Livre',$controller_path . '\pages\LivreController@index')->name('livre.index');

Route::post('/pages/Livre', $controller_path . '\pages\LivreController@store')->name('livre.store');
Route::get('/pages/Livre/{id}/edit', $controller_path . '\App\Http\Controllers\pages\LivreController@edit')->name('livre.edit');
Route::put('/pages/Livre/{id}', $controller_path . '\pages\LivreController@update')->name('livre.update');
Route::delete('/pages/Livre/{id}', $controller_path . '\pages\LivreController@destroy')->name('livre.destroy');

//Agent


Route::get('/pages/Agent', $controller_path . '\pages\AgentController@index')->name('agent.index');
Route::post('/pages/agent', $controller_path . '\pages\AgentController@store')->name('agent.store');
Route::get('/pages/Agent/{id}/edit', $controller_path . '\pages\AgentController@edit')->name('agent.edit');
Route::put('/pages/Agent/{id}', $controller_path . '\pages\AgentController@update')->name('agent.update');
Route::delete('/pages/Agent/{id}', $controller_path . '\pages\AgentController@destroy')->name('agent.destroy');
Route::post('/pages/Agent',$controller_path . '\pages\AgentController@sendEmail')->name('agent.sendEmail');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('login-basic');

Route::post('/auth/login-basic', $controller_path . '\authentications\LoginBasic@login')->name('login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');
Route::post('/auth/forgot-password-basic', '\App\Http\Controllers\authentications\LoginBasic@logout')->name('logout');
Route::get('/error', function () {
    return view('content.pages.pages-misc-error'); // Create a view named 'error.blade.php' to display the error message
})->name('error');


    Route::post('/pages/Settings', $controller_path . '\pages\SettingsController@updateSettings')->name('update-settings');
    Route::get('/pages/Settings', $controller_path . '\pages\SettingsController@showSettings')->name('settings');



//Email 





// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');
