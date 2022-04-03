<?php

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/list', [PageController::class, 'list'])->middleware('auth', 'verified')->name('list');

Route::get('/feedback', [PageController::class, 'feedback'])->name('feedback');

Route::post('/feedback', [PageController::class, 'create'])->name('create');



Route::get('/authorization', function () {
    if (Auth::check()) {
        return redirect(route('feedback'));
    }
    return view('pages.authorization');
})->name('authorization');

Route::post('/authorization', [PageController::class, 'login'])->name('login');

Route::get('/logout', [PageController::class, 'logout'])->name('logout');


Route::get('/registration', function () {
    if (Auth::check()) {
        return redirect(route('feedback'));
    }
    return view('pages.registration');
})->name('registration');

Route::post('/registration', [PageController::class, 'save'])->name('save');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Auth::routes(['verify' => true]);
