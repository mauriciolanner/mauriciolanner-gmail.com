<?php

namespace App\Http\Controllers;

use App\Airport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::orderBy('city', 'asc')->get();

        return view('admin.components.airport', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $airport = new Airport;

        $airport->name = $request->name;
        $airport->code = $request->code;
        $airport->city = $request->city;
        $airport->state = $request->state;

        $airport->save();

        return redirect('painel/airport')->with('success', 'Aeroporto cadastrado com secesso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $airport = Airport::find($request->id);
        $airport->name = $request->name;
        $airport->code = $request->code;
        $airport->city = $request->city;
        $airport->state = $request->state;

        $airport->save();

        return redirect('painel/airport')->with('success', 'Aeroporto editado com secesso');
    }

    public function delet($id)
    {
        $now = Carbon::now();
        $airport = Airport::find($id);
        $airport->deleted_at = $now;
        $airport->save();

        return redirect('painel/airport')->with('success', 'Aeroporto deletado com secesso');
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
