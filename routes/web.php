<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {

    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Auth::routes();
Route::redirect('/', 'login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {

        $clients = \App\Models\Client::all();
        $services = \App\Models\Service::all();
        $diaries = \App\Models\Diary::all();
        $users = \App\Models\User::all();

        return view('dashboard', compact('clients', 'services', 'diaries', 'users'));
    })->name('dashboard');

	Route::resource('/users', UserController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/diaries', DiaryController::class);

    Route::get('{date}', 'App\Http\Controllers\DiaryController@byDate')->name('diaries.byDate');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
