<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();


Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [ViewController::class, 'admin'])->name('admin.index');
});

Route::prefix('user')->middleware(['user'])->group(function () {
    Route::get('/', [ViewController::class, 'user'])->name('user.index');
});


// Route::get('/home', [HomeController::class, 'index'])->name('home');
