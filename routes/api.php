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

Route::get('/players/{year}', function($year) {
	return App\Player::where('year', $year)->get();
});

Route::post('/select-player', function (Request $request) {
    return App\MockDraftSelection::create($request->all());
});