<?php

use App\Http\Controllers\PageController;
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

Route::get('/list', [PageController::class, 'list'])->name('list');

Route::get('/feedback', [PageController::class, 'feedback'])->name('feedback');
Route::post('/feedback', [PageController::class, 'create'])->name('create');

Route::get('/registration', function () {
    return view('pages.registration');
})->name('registration');

Route::get('/authorization', function () {
    return view('pages.authorization');
})->name('authorization');
