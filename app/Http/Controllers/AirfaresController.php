<?php

namespace App\Http\Controllers;

use App\Airfare;
use App\Airport;
use App\Complaint;
use App\Passenger;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AirfaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //função funciona via Ajax

        //status da compra da passagem
        //1 - no corrinho
        //2 - pago
        //3 - cancelado
        //4 - Reembolsado

        $airfare = new Airfare;

        $airfare->travels_id = $request->travels_id;
        $airfare->users_id = auth()->user()->id;
        $airfare->status = 1;
        $airfare->class = $request->clas;

        $airfare->save();

        return 'adicionado';
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

    public function delet($id)
    {
        $delet = Airfare::find($id);
        $delet->deleted_at = Carbon::now();
        $delet->save();

        return redirect('/finalizacompra');
    }

    public function checkOutCart(Request $request)
    {
        //função funciona via Ajax

        //faz a verificação do cartão com o sistema de cartão de credito
        //o sistema não guarda informações de cartão de creito
        if ($request->cardnumber != '') {
            $verifca = true;

            //status da compra da passagem
            //1 - no corrinho
            //2 - pago
            //3 - cancelado
            //4 - Reembolsado

            $airfare = find($request->id);
            $airfare->status = 2;
            $airfare->save();

            return true;
        } else {
            return false;
        }

    }

    public function all()
    {
        if (isset(auth()->user()->id) == false) {
            $return = 'false';
            return $return;
        } else {
            $return = array();
            $returnTemp = array();

            $carts = Airfare::where('airfares.users_id', auth()->user()->id)
                ->where('airfares.status', 1)
                ->join('travels', 'airfares.travels_id', '=', 'travels.id')
                ->join('flights', 'travels.flights_id', '=', 'flights.id')
                ->select('airfares.class', 'flights.from', 'flights.to', 'flights.code as flightsCode')
                ->get();

            foreach ($carts as $cart) {
                $airportfrom = Airport::where('id', $cart->from)->select('code')->get();
                $airportto = Airport::where('id', $cart->to)->select('code')->get();
                if ($cart->class == 1) {
                    $class = "Enomica";
                } else {
                    $class = "P.Classe";
                }
                $returnTemp = array(
                    'flightsCode' => $cart->flightsCode,
                    'airportFrom' => $airportfrom[0]->code,
                    'airportTo' => $airportto[0]->code,
                    'Class' => $class);
                array_push($return, $returnTemp);
            }

            //dd($return);

            return $return;
        }

    }

    public function fechaCompra()
    {
        if (isset(auth()->user()->id) == false) {
            return view('frontend.pages.home');
        } else {
            $total = 0;

            $carts = Airfare::where('airfares.users_id', auth()->user()->id)
                ->where('airfares.status', 1)
                ->join('travels', 'airfares.travels_id', '=', 'travels.id')
                ->join('flights', 'travels.flights_id', '=', 'flights.id')
                ->select(
                    'airfares.class',
                    'airfares.id',
                    'travels.price_economics',
                    'travels.date', 'price_first_class',
                    'flights.time_from', 'flights.time_to',
                    'flights.from',
                    'flights.to',
                    'flights.code as flightsCode'
                )
                ->get();

            $airports = Airport::get();

            foreach ($carts as $cart) {
                if ($cart->class == 1) {
                    $price = $cart->price_economics;
                    $total = $total + $price;
                } else {
                    $price = $cart->price_first_class;
                    $total = $total + $price;
                }
            }

            return view('frontend.pages.cart', compact('carts', 'total', 'airports'));
        }
    }

    public function pagar(Request $request)
    {
        $checinNumber = 'AR1234';
        Airfare::where('users_id', auth()->user()->id)
            ->where('status', 1)
            ->update(
                ['checkin_number' => $checinNumber]
            );
        Airfare::where('users_id', auth()->user()->id)
            ->where('status', 1)
            ->update(
                ['status' => 2]
            );

        return redirect('/perfil');

    }

    public function checkin($id)
    {
        $checkin = Airfare::where('airfares.id', $id)
            ->where('airfares.status', 2)
            ->where('airfares.checkin', 0)
            ->join('travels', 'airfares.travels_id', '=', 'travels.id')
            ->join('flights', 'travels.flights_id', '=', 'flights.id')
            ->select(
                'airfares.class',
                'airfares.id',
                'travels.price_economics',
                'travels.date', 'price_first_class',
                'flights.time_from', 'flights.time_to',
                'flights.from',
                'flights.to',
                'flights.code as flightsCode'
            )
            ->get();

        $passengers = Passenger::where('user_id', auth()->user()->id)->get();
        $airports = Airport::get();

        return view('frontend.pages.allcheckin', compact('checkin', 'passengers', 'airports', 'id'));
    }

    public function checkinout(Request $request)
    {

        $airfares = Airfare::find(17);
        $airfares->checkin = '1';
        $airfares->passenger_id = $request->passageiro;
        $airfares->seat = $request->acento;
        $airfares->save();

        return redirect('/perfil');

    }

    public function perfil()
    {
        if (isset(auth()->user()->id) == false) {
            return view('frontend.pages.home');
        } else {

            //proximos voos
            $nextairfares = Airfare::where('airfares.users_id', auth()->user()->id)
                ->where('airfares.status', 1)
                ->join('travels', 'airfares.travels_id', '=', 'travels.id')
                ->join('flights', 'travels.flights_id', '=', 'flights.id')
                ->select(
                    'airfares.class',
                    'airfares.id',
                    'travels.price_economics',
                    'travels.date', 'price_first_class',
                    'flights.time_from', 'flights.time_to',
                    'flights.from',
                    'flights.to',
                    'flights.code as flightsCode'
                )
                ->get();
            //dd($nextairfares);

            //Ja com chekin
            $chekinairfares = Airfare::where('airfares.users_id', auth()->user()->id)
                ->where('airfares.status', 2)
                ->where('airfares.checkin', 1)
                ->join('travels', 'airfares.travels_id', '=', 'travels.id')
                ->join('flights', 'travels.flights_id', '=', 'flights.id')
                ->select(
                    'airfares.class',
                    'airfares.id',
                    'travels.price_economics',
                    'travels.date', 'price_first_class',
                    'flights.time_from', 'flights.time_to',
                    'flights.from',
                    'flights.to',
                    'flights.code as flightsCode'
                )
                ->get();

            //Ja utilizadas
            $utilairfares = Airfare::where('airfares.users_id', auth()->user()->id)
                ->where('airfares.status', 3)
                ->where('airfares.checkin', 1)
                ->join('travels', 'airfares.travels_id', '=', 'travels.id')
                ->join('flights', 'travels.flights_id', '=', 'flights.id')
                ->select(
                    'airfares.class',
                    'airfares.id',
                    'travels.price_economics',
                    'travels.date', 'price_first_class',
                    'flights.time_from', 'flights.time_to',
                    'flights.from',
                    'flights.to',
                    'flights.code as flightsCode'
                )
                ->get();

            $airports = Airport::get();

            return view('frontend.pages.perfil', compact('nextairfares', 'airports', 'chekinairfares', 'utilairfares'));
        }
    }

    public function reclamar(Request $request)
    {
        $reclamacao = new Complaint;
        $reclamacao->message = $request->reclamar;
        $reclamacao->airfares_id = $request->id;
        $reclamacao->status = 0;
        $reclamacao->save();
        return redirect('/perfil');
    }
}
