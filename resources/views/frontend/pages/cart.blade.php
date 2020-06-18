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
                    </span> <span>Busca <i class="fa fa-chevron-right"></i></span>
                    </span> <span>Finalizar carrinho <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">Finalizar carrinho</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-10 ticketTopoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>Voos escolhidos</strong>
            </div>
            <div class="col-md-2 ticketTopoDireita">
                Detalhes
            </div>
            @foreach ($carts as $passagens)
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
                    <div class="col-md-12 valor text-center"><strong>
                            @if($passagens->class == 1)
                            {{'R$ '.number_format($passagens->price_economics, 2, ',', '.')}}
                            @elseif($passagens->class == 2)
                            {{'R$ '.number_format($passagens->price_first_class, 2, ',', '.')}}
                            @endif
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <a href="/deletacarrinho/{{$passagens->id}}" class="btn btn-lg btn-block btn-primary">
                            Excluir
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-10 ticketBaixoEsquerda">
                <span class="flaticon-examination mr-2"></span> <strong>NORDESTE LINHAS AEREAS</strong>
            </div>
            <div class="col-md-2 total ticketBaixoDireita">
                <strong>Total: {{'R$ '.number_format($total, 2, ',', '.')}}</strong>
            </div>
        </div>
        <br>
        <br>
        <br>
        <form action="{{ route('pagar') }}" method="post">
            {!! csrf_field() !!}
            <input name="total" type="hidden" value="{{$total}}">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tudo certo para finalizar a compra?</h1>
                    <h3>Entre com os dados do seu cartão de crédito.</h3>
                </div>
                <div class="col-md-6">
                    <div class="card paddcard">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nome no cartão de credito
                            </label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Numero do Cartão de Crédito
                            </label>
                            <input type="text" name="numbercard" class="form-control" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">
                                    Validade
                                </label>
                                <input type="text" name="validade" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">
                                    CVV
                                </label>
                                <input type="text" name="cvv" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Parecelamento
                            </label>
                            <select name="parcelas" class="form-control">
                                <option value="1">1x á vista</option>
                                <option value="2">2x sem juros</option>
                                <option value="3">3x sem juros</option>
                                <option value="4">4x sem juros</option>
                                <option value="5">5x sem juros</option>
                                <option value="6">6x sem juros</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="creditCardFrente">
                        <div class="row">
                            <div class="col-md-12 totalpagar">
                                Total a pagar {{'R$ '.number_format($total, 2, ',', '.')}}
                            </div>
                            <div class="col-md-12">
                                Forma de pagamento: Cartão de crédito
                            </div>
                            <div class="col-md-12">
                                Parcelamento em até 6x Sem juros
                            </div>
                            <div class="col-md-12">
                                <button type="submit" href="/pagarcarrinho" class="btn btn-lg btn-block btn-primary">
                                    Pagar Agora
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection