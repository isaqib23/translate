<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
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

Auth::routes();

//Route::get('/', 'HomeController@redirectAdmin')->name('index');
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/', 'FrontendController@index')->name('success-url');
Route::get('/', 'FrontendController@index')->name('cancel-url');
Route::get('/', 'FrontendController@index')->name('failure-url');
Route::get('/bio', 'FrontendController@bio')->name('bio');
Route::get('/services', 'FrontendController@services')->name('services');
Route::get('/profile', 'FrontendController@profile')->name('profile');
Route::get('/pricing', 'FrontendController@pricing')->name('pricing');
Route::get('/success/{id}', 'FrontendController@success')->name('success');
Route::get('/verify_status/{id}', 'FrontendController@verify_status')->name('verify_status');
Route::get('/payment_status/{id}', 'FrontendController@payment_status')->name('payment_status');
Route::post('/foloosi_payment_status/{id}', 'FrontendController@foloosi_payment_status')->name('foloosi_payment_status');
Route::get('/verify_payment/{id}/{type}', 'FrontendController@verify_payment')->name('verify_payment');
Route::post('/upload', 'FileUploadController@upload')->name('upload');
Route::post('/upload_files', 'FileUploadController@upload_files')->name('upload_files');
Route::post('/send_notification', 'FileUploadController@sendNotification')->name('sendNotification');

Route::get('create-transaction', 'FrontendController@createTransaction')->name('createTransaction');
Route::get('process-transaction', 'FrontendController@processTransaction')->name('processTransaction');
Route::get('success-transaction', 'FrontendController@successTransaction')->name('successTransaction');
Route::get('cancel-transaction', 'FrontendController@cancelTransaction')->name('cancelTransaction');
//Route::get('/', [FrontendController::class, 'index']);
//Route::get('/success/{id}', [FrontendController::class, 'success']);
//Route::get('/verify_status/{id}', [FrontendController::class, 'verify_status']);
//Route::post('/upload', [FileUploadController::class, 'upload']);
/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('permissions', 'Backend\PermissionController', ['names' => 'admin.permissions']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);

    Route::get('/requests', 'Backend\OrderController@index')->name('admin.requests');
    Route::post('/set_amount', 'Backend\OrderController@setAmount')->name('admin.setAmount');
    Route::get('/view_files/{id}', 'Backend\OrderController@view_files')->name('admin.requests.view_files');
    Route::get('/view_voucher/{id}', 'Backend\OrderController@view_voucher')->name('admin.requests.view_voucher');
    Route::match(['get', 'post', 'delete'], '/delete_order/{id}', 'Backend\OrderController@destroy')->name('admin.requests.destroy');

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
