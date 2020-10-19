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

Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfileController::class, 'show'])
->name('profile');


Route::middleware('auth')->group(function(){
	// Show the timeline, home page
	Route::get('/tweets', [
		App\Http\Controllers\TweetsController::class, 'index'
	])->name('home');

	// Create a new tweet
	Route::post('/tweets', [App\Http\Controllers\TweetsController::class, 'store']);

	// Delete a tweet
	Route::delete('/tweets/{tweet}', [
		App\Http\Controllers\TweetsController::class, 'destroy'
	])->name('delete_tweet');

	Route::post('/tweets/{tweet}/like', [
		App\Http\Controllers\TweetsLikeController::class, 'store'
	])->name('tweet_like');

	Route::delete('/tweets/{tweet}/like', [
		App\Http\Controllers\TweetsLikeController::class, 'destroy'
	])->name('tweet_dislike');

	Route::post('/profiles/{user:username}/follow', [
		App\Http\Controllers\FollowsController::class, 'store'
	])->name('follow');

	Route::get('/profiles/{user:username}/edit', [
		App\Http\Controllers\ProfileController::class, 'edit'
	])->middleware('can:edit,user');

	Route::patch('/profiles/{user:username}', [
		App\Http\Controllers\ProfileController::class, 'update'
	]);

	Route::get('explore', [
		App\Http\Controllers\ExploreController::class, 'index'
	])->name('explore');

	Route::post('logout', function(){
		Auth::logout();
		return redirect(route('home'));
	})->name('logout');
});

