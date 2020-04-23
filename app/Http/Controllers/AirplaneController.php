<?php

namespace App\Http\Controllers;

use App\Airplane;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airplanes = Airplane::get();

        return view('admin.components.airplane', compact('airplanes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $airplane = new Airplane;
        $airplane->name = $request->name;
        $airplane->prefix = $request->prefix;
        $airplane->capacity_firstclass = $request->capacity_firstclass;
        $airplane->capacity_economic = $request->capacity_economic;
        $airplane->save();

        return redirect('painel/frota')->with('success', 'Aeronave cadastrado com secesso');

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
        $airplane = Airplane::find($request->id);
        $airplane->name = $request->name;
        $airplane->prefix = $request->prefix;
        $airplane->capacity_firstclass = $request->capacity_firstclass;
        $airplane->capacity_economic = $request->capacity_economic;
        $airplane->save();

        return redirect('painel/frota')->with('success', 'Aeronave editada com secesso');
    }

    public function delet($id)
    {
        $now = Carbon::now();
        $airplane = Airplane::find($id);
        $airplane->deleted_at = $now;
        $airplane->save();

        return redirect('painel/frota')->with('success', 'Aeronave deletada com secesso');
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
