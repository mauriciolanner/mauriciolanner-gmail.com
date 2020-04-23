<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Flight;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Flight::get();
        $airports = Airport::orderBy('city', 'asc')->get();
        return view('admin.components.flights', compact('flights', 'airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->to == $request->from) {
            return redirect('painel/voos')->with('error', 'O aeroporto de partida não pode ser o mesmo que o destino');
        }

        $flight = new Flight;

        $flight->code = $request->code;
        $flight->from = $request->from;
        $flight->to = $request->to;
        $flight->time_from = $request->time_from;
        $flight->time_to = $request->time_to;

        $flight->save();

        return redirect('painel/voos')->with('success', 'Voo cadastrado com secesso');
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
    public function edit(Request $request)
    {

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
        if ($request->to == $request->from) {
            return redirect('painel/voos')->with('error', 'O aeroporto de partida não pode ser o mesmo que o destino');
        }

        $flight = Flight::find($request->id);

        $flight->code = $request->code;
        $flight->from = $request->from;
        $flight->to = $request->to;
        $flight->time_from = $request->time_from;
        $flight->time_to = $request->time_to;

        $flight->save();

        return redirect('painel/voos')->with('success', 'Voo editada com secesso');
    }

    public function delet($id)
    {
        $now = Carbon::now();
        $flight = Flight::find($id);
        $flight->deleted_at = $now;
        $flight->save();
        return redirect('painel/voos')->with('success', 'Voo deletado com secesso');
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
