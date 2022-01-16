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

Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang'):'';
    if ($lang == 'ar') {
        session()->put('lang','ar');
    }else{
        session()->put('lang','en');
    }
    return back();
    
});

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('dashboard.home');
    })->name('home');
    Route::resource('company','Admin\CompanyController');
    Route::resource('contactPerson','Admin\ContactPersonController');
    Route::resource('admin','Admin\adminController')->middleware('Admin');
});

//Auth::routes();
Route::get('login', 'Admin\LoginController@showLoginForm')->name('login');
Route::post('login', 'Admin\LoginController@login');
Route::any('logout', 'Admin\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
