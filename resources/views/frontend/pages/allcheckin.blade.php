@extends('frontend.index')

@section('content')
<form action="{{ route('checkinout') }}" method="post">
    {!! csrf_field() !!}
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2">
                            <a href="/">Home <i class="fa fa-chevron-right"></i></a>
                        </span> <span>Fazer Chekin <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Check In</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <h1>Detalhes da Passagem</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Voo {{$checkin[0]->flightsCode}}</h3>
                </div>
                <div class="col-md-4">
                    <h3>de
                        @foreach ($airports as $airport)
                        @if( $airport->id == $checkin[0]->from ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach
                        - as 22:00</h3>
                </div>
                <div class="col-md-4">
                    <h3>para
                        @foreach ($airports as $airport)
                        @if( $airport->id == $checkin[0]->to ) {{$airport->city}} - {{$airport->code}}
                        @endif
                        @endforeach
                        - as 22:00</h3>
                </div>
                <div class="col-md-12">
                    <h5>Escolha um passageiro já cadastrado, ou cadastre um novo</h5>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="hidden" name="idpassagem" value="{{$id}}" />
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" name="passageiro">
                            @foreach($passengers as $passenger)
                            <option value="{{$passenger->id}}">{{$passenger->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <a style="color: #fff" class="btn btn-primary" data-toggle="modal" data-target="#criar">
                        criar novo passageiro</a>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="row">
                <div class="text-center">
                    frente do avião
                    <table class="tg text-center">
                        <thead>
                            <tr>
                                <th class="tg-c3ow"></th>
                                <th class="tg-c3ow" colspan="6">Primiera Classe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tg-c3ow">Fileira</td>
                                <td class="tg-c3ow" colspan="3">Esquerda</td>
                                <td class="tg-c3ow" colspan="3">Direita</td>
                            </tr>
                            <tr>
                                <td class="tg-c3ow">1</td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="1A" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="1B" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow" colspan="2" rowspan="4" style="color:#fff">***************
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="1C" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="1D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-c3ow">2</td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="2D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="2D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="2D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="2D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-c3ow">3</td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="3D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="3D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="3D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="3D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-c3ow">4</td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-c3ow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 1)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="tg-0lax"></th>
                                <th class="tg-0lax" colspan="8">Classe economica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tg-0lax"></td>
                                <td class="tg-0lax" colspan="8"></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">5</td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax" colspan="2" rowspan="5"></td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            E
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="4D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            F
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">6</td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="6A" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="6B" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="6C" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="6D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="6E" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            E
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="6F" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            F
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">7</td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="7A" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="7B" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="7D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="7E" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="7E" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            E
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="7F" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            F
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">8</td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="8A" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="8B" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            B
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="8D" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            C
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="8E" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="8E" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            E
                                        </label>
                                    </div>
                                </td>
                                <td class="tg-0lax">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="acento" id="exampleRadios1"
                                            value="8F" @if($checkin[0]->class == 2)disabled @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            F
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-c3ow">Fileira</td>
                                <td class="tg-c3ow" colspan="3">Esquerda</td>
                                <td class="tg-c3ow" colspan="3">Direita</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="Submit" class="btn btn-primary">
                        Fazer Checkin
                    </button>
                </div>
            </div>
        </div>
    </section>
</form>
<!-- Modal novo -->
<div class="modal fade" id="criar" tabindex="-1" role="dialog" aria-labelledby="criarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="cadastra" action="{{ route('novopassageiro') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="idpage" value="{{$id}}" required>
                <div class="modal-header">
                    <h5 class="modal-title" id="criarLabel">Cadastrar novo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nascimento</label>
                        <input type="date" name="nascimento" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" form="cadastra" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection