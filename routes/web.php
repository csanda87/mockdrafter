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
	$mocks = App\MockDraft::with('player','user','draftSlot.team')->get()->orderBy('user_id');
	return view('draft_day')->with([
		'mocks' => $mocks
	]);
});

Route::get('official-mock', function() {
	$draft_slots = App\DraftSlot::with('team')->get();

	return view('official_mock')->with([
		'draft_slots' => $draft_slots
	]);
});