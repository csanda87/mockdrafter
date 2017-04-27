<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DraftSlot;
use App\Team;

class DraftSlotController extends Controller
{
    public function __construct(DraftSlot $draft_slot)
    {
        $this->draft_slot = $draft_slot;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('draft_slot.index')->with('draft_slots', $this->draft_slot->with('team')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::orderBy('short_name')->get();

        return view('draft_slot.create')->with('teams', $teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        foreach($request->pick as $i => $pick) {
            $draft_slot = new DraftSlot();
            $draft_slot->year = $request->year;
            $draft_slot->round = $request->round;
            $draft_slot->pick = $i;
            $draft_slot->team_id = $pick['team'];
            $draft_slot->notes = $pick['note'];
            $draft_slot->save();
        }

        return redirect()->route('draft-slot.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
