<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MockDraft;

class MockDraftController extends Controller
{
    public function index()
    {
    	$mock_drafts = MockDraft::where('user_id', auth()->user()->id)->get();

    	return view('mock_draft.index')->with([
    		'mock_drafts' => $mock_drafts
    	]);
    }

    public function create()
    {
    	return view('mock_draft.create');
    }

    public function store(Request $request)
    {
    	$request->merge(['user_id' => auth()->user()->id]);
    	MockDraft::create($request->all());

    	return redirect('/mock-drafts');
    }

    public function show(MockDraft $mock_draft)
    {
    	$mock_draft = $mock_draft->load('user', 'selections', 'selections.draftSlot.team', 'selections.player');

    	return view('mock_draft.show')->with([
    		'mock_draft' => $mock_draft
    	]);
    }
}
