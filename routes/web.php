<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Auth as Auth;

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
//Auth::loginUsingId(36);
Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/profiles/{user:name}', [App\Http\Controllers\ProfileController::class, 'show'])
->name('profile');

Route::get('auth/logout', function(){
	Auth::logout();
	return redirect(route('home'));
});

Route::middleware('auth')->group(function(){
	Route::get('/tweets', [App\Http\Controllers\TweetsController::class, 'index'])->name('home');
	Route::post('/tweets', [App\Http\Controllers\TweetsController::class, 'store']);

	Route::post('/profiles/{user:name}/follow', [
		App\Http\Controllers\FollowsController::class, 'store'
	]);
});

