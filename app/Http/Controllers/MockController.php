<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MockDraft;

class MockController extends Controller
{
    public function getMyMock($id)
    {
    	$mock_draft = MockDraft::findOrFail($id);

    	return view('mock')->with([
    		'mock_draft' => $mock_draft
    	]);
    }
}
