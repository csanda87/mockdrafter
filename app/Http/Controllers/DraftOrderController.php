<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DraftOrder;
use App\Team;

class DraftOrderController extends Controller
{
    public function __construct(DraftOrder $draft_order)
    {
        $this->draft_order = $draft_order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('draft_order.index')->with('draft_order', $this->draft_order->with('team')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::orderBy('short_name')->get();

        return view('draft_order.create')->with('teams', $teams);
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
            $draft_order = new DraftOrder();
            $draft_order->year = $request->year;
            $draft_order->round = $request->round;
            $draft_order->pick = $i;
            $draft_order->team_id = $pick['team'];
            $draft_order->notes = $pick['note'];
            $draft_order->save();
        }

        return redirect()->route('draft-order.index');
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
