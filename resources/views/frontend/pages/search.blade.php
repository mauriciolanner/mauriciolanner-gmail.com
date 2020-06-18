@extends('frontend.index')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span>Busca <i
                            class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Voos encontrados</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-4">
                <ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
                    <li class="nav-item text-left">
                        <a class="nav-link active py-4" data-toggle="tab" href="#services-1"><span
                                class="flaticon-examination mr-2"></span> Voos de ida</a>
                    </li>
                    <li class="nav-item text-left">
                        <a class="nav-link py-4" data-toggle="tab" href="#services-2"><span
                                class="flaticon-examination mr-2"></span> Voos de volta</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane container p-0 active" id="services-1">
                        <h3>Voos de ida</h3>
                        @if(!count($search_ida) == 0)
                        @foreach ($search_ida as $voos)
                        <div class="col-md-12 card sombra" style="border: 0px solid rgba(0, 0, 0, 0.125) !important;">
                            <a data-toggle="collapse" href="#sanfona{{$voos->id}}" role="button" aria-expanded="false"
                                aria-controls="sanfona{{$voos->id}}">
                                <div class="row cartao-busca">
                                    <div class="col-md-12 voo-bl">Voo {{$voos->code}}</div>
                                    <div class="col-md-12 destino">
                                        @foreach ($airports as $airport)
                                        @if( $airport->id == $voos->from ) {{$airport->city}}/{{$airport->code}} @endif
                                        @endforeach
                                        - <strong>{{$voos->time_from}}</strong>
                                        <strong class="seta"><span class="flaticon-acupuncture mr-2"></span></strong>
                                        @foreach ($airports as $airport)
                                        @if( $airport->id == $voos->to ) {{$airport->city}}/{{$airport->code}} @endif
                                        @endforeach
                                        - <strong>{{$voos->time_to}}</strong>
                                    </div>
                                </div>
                            </a>
                            <div class="collapse desce" id="sanfona{{$voos->id}}">
                                <div class="card-deck mb-3 text-center">
                                    <div class="card mb-4 box-shadow">
                                        <div class="card-header">
                                            <h3>Primeira Classe:</h3>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title">
                                                {{'R$ '.number_format($voos->price_first_class, 2, ',', '.')}}
                                            </h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>Poltorna Comum</li>
                                                <li>1 Bagagem despachada</li>
                                                <li>Wi-Fi Gratuito</li>
                                                <li>Almoço / Janta incuido</li>
                                            </ul>
                                            @if(Auth::check())
                                            <button type="button" onclick="compra({{$voos->id}},1)"
                                                class="btn btn-lg btn-block btn-primary">
                                                Comprar
                                            </button>
                                            @else
                                            <a href="/login" class="btn btn-lg btn-block btn-primary">
                                                Faça login para começar
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card mb-4 box-shadow">
                                        <div class="card-header">
                                            <h3>Economica</h3>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title">
                                                {{'R$ '.number_format($voos->price_economics, 2, ',', '.')}}
                                            </h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>Poltrona comum</li>
                                                <li> - </li>
                                                <li> - </li>
                                                <li> - </li>
                                            </ul>
                                            @if(Auth::check())
                                            <button type="button" onclick="compra({{$voos->id}},2)"
                                                class="btn btn-lg btn-block btn-primary">
                                                Comprar
                                            </button>
                                            @else
                                            <a href="/login" class="btn btn-lg btn-block btn-primary">
                                                Faça login para começar
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h4>Não há dados de voos de volta</h4>
                        @endif
                    </div>
                    <div class="tab-pane container p-0 fade" id="services-2">
                        <h3>Voos de volta</h3>
                        @if($search_volta == false || count($search_volta) == 0)
                        <h4>Não há dados de voos de volta</h4>
                        @else
                        @foreach ($search_volta as $voosvolta)
                        <div class="col-md-12 card sombra" style="border: 0px solid rgba(0, 0, 0, 0.125) !important;">
                            <a data-toggle="collapse" href="#sanfona{{$voosvolta->id}}" role="button"
                                aria-expanded="false" aria-controls="sanfona{{$voosvolta->id}}">
                                <div class="row cartao-busca">
                                    <div class="col-md-12 voo-bl">Voo {{$voosvolta->code}}</div>
                                    <div class="col-md-12 destino">
                                        @foreach ($airports as $airport)
                                        @if( $airport->id == $voosvolta->from ) {{$airport->city}}/{{$airport->code}}
                                        @endif
                                        @endforeach
                                        - <strong>{{$voosvolta->time_from}}</strong>
                                        <strong class="seta"><span class="flaticon-acupuncture mr-2"></span></strong>
                                        @foreach ($airports as $airport)
                                        @if( $airport->id == $voosvolta->to ) {{$airport->city}}/{{$airport->code}}
                                        @endif
                                        @endforeach
                                        - <strong>{{$voosvolta->time_to}}</strong>
                                    </div>
                                </div>
                            </a>
                            <div class="collapse desce" id="sanfona{{$voosvolta->id}}">
                                <div class="card-deck mb-3 text-center">
                                    <div class="card mb-4 box-shadow">
                                        <div class="card-header">
                                            <h3>Primeira Classe:</h3>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title">
                                                {{'R$ '.number_format($voosvolta->price_first_class, 2, ',', '.')}}
                                            </h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>Poltorna Comum</li>
                                                <li>1 Bagagem despachada</li>
                                                <li>Wi-Fi Gratuito</li>
                                                <li>Almoço / Janta incuido</li>
                                            </ul>
                                            @if(Auth::check())
                                            <button type="button" onclick="compra({{$voosvolta->id}},1)"
                                                class="btn btn-lg btn-block btn-primary">
                                                Comprar
                                            </button>
                                            @else
                                            <a href="/login" class="btn btn-lg btn-block btn-primary">
                                                Faça login para começar
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card mb-4 box-shadow">
                                        <div class="card-header">
                                            <h3>Economica</h3>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title">
                                                {{'R$ '.number_format($voosvolta->price_economics, 2, ',', '.')}}
                                            </h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>Poltrona comum</li>
                                                <li> - </li>
                                                <li> - </li>
                                                <li> - </li>
                                            </ul>
                                            @if(Auth::check())
                                            <button type="button" onclick="compra({{$voosvolta->id}},1)"
                                                class="btn btn-lg btn-block btn-primary">
                                                Comprar
                                            </button>
                                            @else
                                            <a href="/login" class="btn btn-lg btn-block btn-primary">
                                                Faça login para começar
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@if(Auth::check())
<div class="carrinho-canto" id="carrinho" style="display: none">
    <div class="carrinho-item">
        <strong>Sua compra</strong>
    </div>
    <div id="itens">
        <!--div class="carrinho-item fundo-laranja">
            <span class="flaticon-acupuncture mr-2"></span>
            SSA -> REC | Economica <span class="fa fa-check mr-3"></span>
        </div-->
    </div>
    <a href="/carrinho">
        <div class="carrinho-item fundo-verde text-center">
            Finalizar
        </div>
    </a>
</div>
@endif
@endsection