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

Auth::routes();
Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('index');

Route::get('/dashboard', function () {
    return redirect()->route('index');
})->name('home');
Route::get('/home', function () {
    return redirect()->route('index');
})->name('home2');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('activity')->group(function () {
        Route::view('/', 'activity.index')->name('activity');
        Route::get('/get_all', [App\Http\Controllers\HomeController::class, 'activity_get_all'])->name('activity.get_all');
        Route::any('/new', [App\Http\Controllers\HomeController::class, 'activity_new'])->name('activity.new');
        Route::any('/edit/{id}', [App\Http\Controllers\HomeController::class, 'activity_edit'])->name('activity.edit');
    });
    Route::get('profile', [App\Http\Controllers\HomeController::class, 'my_profile'])->name('my_profile');
    Route::post('update-profile', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('update_profile');
    Route::view('change-password', 'user.change_password')->name('change_password');
    Route::post('update-password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update_password');
});
