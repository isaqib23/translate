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

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRequestController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/success/{id}', [FrontendController::class, 'success']);
Route::get('/verify_status/{id}', [FrontendController::class, 'verify_status']);
Route::post('/upload', [FileUploadController::class, 'upload']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/requests', [UserRequestController::class, 'index'])->name('requests');
    Route::post('/set_amount', [UserRequestController::class, 'setAmount'])->name('setAmount');
    Route::get('/view_files/{id}', [UserRequestController::class, 'view_files'])->name('view_files');
});

require __DIR__.'/auth.php';

