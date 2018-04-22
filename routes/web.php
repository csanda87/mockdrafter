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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function() {
    	return redirect('/mock-drafts');
	});
	Route::resource('/draft-slots', 'DraftSlotController');
	Route::resource('/mock-drafts', 'MockDraftController');
	Route::resource('/players', 'PlayerController');

	Route::get('/mock', 'MockController@getMyMock');
	Route::get('/draft-day', function () {
		$mocks = App\MockDraft::with('player','selections.user','draftSlot.team')->get()->groupBy('mock_draft_id');
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
});
