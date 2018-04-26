<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/draft-order/{year}/{round}', function($year, $round) {
	return App\DraftSlot::with('team')->where('year', $year)->where('round', $round)->get();
});

Route::get('/mock-drafts/{id}/selections', function ($id) {
    return App\MockDraftSelection::where('mock_draft_id', $id)->get();
});

Route::post('/mock-drafts/{id}/selection', function (Request $request, $id) {
	$request->merge(['mock_draft_id' => $id]);

    return App\MockDraftSelection::create($request->all());
});

Route::get('/players/{year}', function($year) {
	return App\Player::where('year', $year)->get();
});

Route::get('/teams', function() {
	return App\Team::pluck('name', 'short_name');
});