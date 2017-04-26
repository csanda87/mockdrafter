<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DraftOrder;
use App\Player;

class MockController extends Controller
{
    public function getMyMock()
    {
    	$draft_order = DraftOrder::with('team')->get();
    	$players = Player::all();

    	return view('mock')->with([
    		'draft_order' => $draft_order,
    		'players' => $players
    	]);
    }
}
