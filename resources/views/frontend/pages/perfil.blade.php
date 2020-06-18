@extends('frontend.index')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2">
                        <a href="/">Home <i class="fa fa-chevron-right"></i></a>
                    </span> <span>Perfil <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">Olá {{auth()->user()->name}}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <h1>Detalhes de suas compras</h1>
    </div>
    @if(count($nextairfares) == 0)
    <div class="container">

    </div>
    @elseif(count($nextairfares) > 0)
    <div class="container">
        <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-10 ticketTopoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>Proximos Voos</strong>
            </div>
            <div class="col-md-2 ticketTopoDireita">
                Detalhes
            </div>
            @foreach ($nextairfares as $passagens)
            <div class="col-md-10 corpo">
                <div class="row cartao-busca">
                    <div class="col-md-12 voo-bl"> <strong>Voo {{$passagens->flightsCode}} - 12/06/2020</strong></div>
                    <div class="col-md-12 destino">
                        @foreach ($airports as $airport)
                        @if( $airport->id == $passagens->from ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach
                        - <strong>{{$passagens->time_from}}</strong>
                        <strong class="seta"><span class="flaticon-acupuncture mr-2"></span></strong>
                        @foreach ($airports as $airport)
                        @if( $airport->id == $passagens->to ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach - <strong>{{$passagens->time_to}}</strong> -
                        @if($passagens->class == 1)
                        ECONOMICA
                        @elseif($passagens->class == 2)
                        PRIMEIRA CLASSE
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2 corpo">
                <div class="row cartao-busca">
                    <div class="col-md-12 confirmado text-center">
                        <strong>
                            CONFIRMADO
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <a href="/checkin/{{$passagens->id}}" class="btn btn-lg btn-block btn-primary">
                            Fazer Chekin
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-10 ticketBaixoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>NORDESTE LINHAS AEREAS</strong>
            </div>
            <div class="col-md-2 total ticketBaixoDireita">

            </div>
        </div>
    </div>
    @endif

    @if(count($chekinairfares) > 0)
    <div class="container">
        <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-10 ticketTopoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>Passagens já com Chekin</strong>
            </div>
            <div class="col-md-2 ticketTopoDireita">
                Detalhes
            </div>
            @foreach ($chekinairfares as $passagenschekin)
            <div class="col-md-10 corpo">
                <div class="row cartao-busca">
                    <div class="col-md-12 voo-bl"> <strong>Voo {{$passagenschekin->flightsCode}} - 12/06/2020</strong>
                    </div>
                    <div class="col-md-12 destino">
                        @foreach ($airports as $airport)
                        @if( $airport->id == $passagenschekin->from ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach
                        - <strong>{{$passagenschekin->time_from}}</strong>
                        <strong class="seta"><span class="flaticon-acupuncture mr-2"></span></strong>
                        @foreach ($airports as $airport)
                        @if( $airport->id == $passagenschekin->to ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach - <strong>{{$passagenschekin->time_to}}</strong> -
                        @if($passagenschekin->class == 1)
                        ECONOMICA
                        @elseif($passagenschekin->class == 2)
                        PRIMEIRA CLASSE
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2 corpo">
                <div class="row cartao-busca">
                    <div class="col-md-12 confirmado text-center">
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="btn btn-lg btn-block btn-primary">
                            Imprimir Bilhete
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-10 ticketBaixoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>NORDESTE LINHAS AEREAS</strong>
            </div>
            <div class="col-md-2 total ticketBaixoDireita">

            </div>
        </div>
    </div>
    @endif
    @if(count($utilairfares) > 0)
    <div class="container">
        <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-10 ticketTopoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>Já utilizados</strong>
            </div>
            <div class="col-md-2 ticketTopoDireita">
                Detalhes
            </div>
            @foreach ($utilairfares as $passagensutil)
            <div class="col-md-10 corpo">
                <div class="row cartao-busca">
                    <div class="col-md-12 voo-bl"> <strong>Voo {{$passagensutil->flightsCode}} - 12/06/2020</strong>
                    </div>
                    <div class="col-md-12 destino">
                        @foreach ($airports as $airport)
                        @if( $airport->id == $passagensutil->from ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach
                        - <strong>{{$passagensutil->time_from}}</strong>
                        <strong class="seta"><span class="flaticon-acupuncture mr-2"></span></strong>
                        @foreach ($airports as $airport)
                        @if( $airport->id == $passagensutil->to ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach - <strong>{{$passagensutil->time_to}}</strong> -
                        @if($passagensutil->class == 1)
                        ECONOMICA
                        @elseif($passagensutil->class == 2)
                        PRIMEIRA CLASSE
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2 corpo">
                <div class="row cartao-busca">
                    <div class="col-md-12">
                        <a href="#" data-toggle="modal" data-target="#reclamar"
                            class="btn btn-lg btn-block btn-primary">
                            Fazer reclamação
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-10 ticketBaixoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>NORDESTE LINHAS AEREAS</strong>
            </div>
            <div class="col-md-2 total ticketBaixoDireita">

            </div>
        </div>
    </div>
    @endif
</section>
<!-- Modal -->
<div class="modal fade" id="reclamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('reclamar') }}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="1" />
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fazer uma reclamação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Reclamação:</label>
                        <textarea class="form-control" name='reclamar' id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection