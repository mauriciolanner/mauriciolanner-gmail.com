<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\Airport;
use App\Flight;
use App\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = Travel::select(
            'travels.date',
            'travels.id',
            'travels.price_economics',
            'travels.price_first_class',
            'flights.code',
            'flights.time_from',
            'flights.time_to',
            'flights.from',
            'flights.to',
            'airplanes.name',
            'airplanes.prefix',
            'airplanes.capacity_firstclass',
            'airplanes.capacity_economic'
        )
            ->join('flights', 'flights.id', '=', 'travels.flights_id')
            ->join('airplanes', 'airplanes.id', '=', 'travels.airplane_id')
            ->get();
        $airports = Airport::get();
        $flights = Flight::get();
        $airplanes = Airplane::get();

        return view('admin.components.travel', compact('travels', 'flights', 'airports', 'airplanes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $travel = new Travel;
        $travel->flights_id = $request->flights_id;
        $travel->airplane_id = $request->airplane_id;
        $travel->date = $request->date;
        $travel->price_economics = str_replace(',', '.', str_replace('.', '', $request->price_economics));
        $travel->price_first_class = str_replace(',', '.', str_replace('.', '', $request->price_first_class));
        $travel->save();

        return redirect('painel/viagens')->with('success', 'Viagem cadastrada com secesso');
    }

    //funções de busca
    public function search(Request $request)
    {
        $dataida = implode('-', array_reverse(explode('/', $request->date_ida)));

        $search_ida = Travel::where('date', '=', $dataida)
            ->select(
                'travels.date',
                'travels.id',
                'travels.price_economics',
                'travels.price_first_class',
                'flights.code',
                'flights.time_from',
                'flights.time_to',
                'flights.from',
                'flights.to',
                'airplanes.name',
                'airplanes.capacity_firstclass',
                'airplanes.capacity_economic'
            )
            ->join('flights', 'flights.id', '=', 'travels.flights_id')
            ->join('airplanes', 'airplanes.id', '=', 'travels.airplane_id')
            ->where('flights.from', '=', $request->from)
            ->where('flights.to', '=', $request->to)
            ->get();

        if (!$request->date_volta == '') {
            $datavolta = implode('-', array_reverse(explode('/', $request->date_volta)));
            $search_volta = Travel::where('date', '=', $datavolta)
                ->select(
                    'travels.date',
                    'travels.id',
                    'travels.price_economics',
                    'travels.price_first_class',
                    'flights.code',
                    'flights.time_from',
                    'flights.time_to',
                    'flights.from',
                    'flights.to',
                    'airplanes.name',
                    'airplanes.capacity_firstclass',
                    'airplanes.capacity_economic'
                )
                ->join('flights', 'flights.id', '=', 'travels.flights_id')
                ->join('airplanes', 'airplanes.id', '=', 'travels.airplane_id')
                ->where('flights.from', '=', $request->to)
                ->where('flights.to', '=', $request->from)
                ->get();
            //dd($search_volta);
        } else {
            $search_volta = false;
        }

        $airports = Airport::get();

        return view('frontend.pages.search', compact('search_ida', 'airports', 'search_volta'));
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
        $travel = Travel::find($request->id);
        $travel->flights_id = $request->flights_id;
        $travel->airplane_id = $request->airplane_id;
        $travel->date = $request->date;
        $travel->price_economics = str_replace(',', '.', str_replace('.', '', $request->price_economics));
        $travel->price_first_class = str_replace(',', '.', str_replace('.', '', $request->price_first_class));
        $travel->save();

        return redirect('painel/viagens')->with('success', 'Viagem alterada com secesso');
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
