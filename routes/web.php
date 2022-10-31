<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dd', function () {
    return $user = Auth::user();
})->name('dd');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
Route::get('/dd', [App\Http\Controllers\HomeController::class, 'dd'])->name('dd');
Route::get(
    'admin/home',
    [App\Http\Controllers\HomeController::class, 'index']
)->name('admin.home')->middleware('is_admin');