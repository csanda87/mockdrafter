<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/teams', 'TeamController');
Route::resource('/draft-slots', 'DraftSlotController');
Route::resource('/players', 'PlayerController');

Route::get('/mock', 'MockController@getMyMock');
Route::get('/draft-day', function () {
	$mocks = App\MockDraft::groupBy('user_id')->get();
	dd($mocks);
	return view('draft_day');
});