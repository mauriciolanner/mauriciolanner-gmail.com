@extends('admin.app')

@section('content')
<div class="col-md-12 text-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#criar">
        <i class="nc-icon nc-simple-add"></i> Criar novo
    </button>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Viagens por voo</h4>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                Codigo do voo
                            </th>
                            <th>
                                Data
                            </th>
                            <th>
                                Itinerário
                            </th>
                            <th>
                                Aeronave do voo
                            </th>
                            <th>
                                Valor P.Classe
                            </th>
                            <th>
                                Valor Econômica
                            </th>
                            <th>
                                opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($travels as $travel)
                        <tr>
                            <td>
                                {{$travel->code}}
                            </td>
                            <td>
                                {{$travel->date->format('d/m/Y')}}
                            </td>
                            <td>
                                @foreach ($airports as $airport)
                                @if($travel->from == $airport->id)
                                {{$airport->code}}
                                @endif
                                @endforeach
                                -
                                @foreach ($airports as $airport)
                                @if($travel->to == $airport->id)
                                {{$airport->code}}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                {{$travel->name}} - {{$travel->prefix}}
                            </td>
                            <td>
                                {{$travel->price_first_class}}
                            </td>
                            <td>
                                {{$travel->price_economics}}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-info btn-round btn-icon" data-toggle="modal"
                                    data-target="#editFlight" data-id="{{$travel->id}}" data-code="{{$travel->code}}"
                                    data-flightsid="{{$travel->flights_id}}" data-airplane="{{$travel->airplane_id}}"
                                    data-date="{{$travel->date}}" data-economics="{{$travel->price_economics}}"
                                    data-firstclass="{{$travel->price_first_class}}"><i class="fa fa-pencil-square-o"
                                        style="font-size: 18px;"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-round btn-icon"><i class="fa fa-trash"
                                        style="font-size: 18px;" data-toggle="modal" data-target="#confirme"
                                        data-title="Deseja mesmo deletar?"
                                        data-link="/painel/viagens/deleta/{{$travel->id}}"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal novo -->
<div class="modal fade" id="criar" tabindex="-1" role="dialog" aria-labelledby="criarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="cadastra" action="{{ route('novaviagem') }}" method="post">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="criarLabel">Cadastrar novo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Codigo voo</label>
                        <select class="form-control" name="flights_id">
                            @foreach ($flights as $flight)
                            <option value="{{$flight->id}}">{{$flight->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Aeronave</label>
                        <select class="form-control" name="airplane_id">
                            @foreach ($airplanes as $airplane)
                            <option value="{{$airplane->id}}">{{$airplane->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data do Voo</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Valor Economica</label>
                        <input type="text" name="price_economics" class="reais form-control" placeholder="0,00"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Valor Primeira classe</label>
                        <input type="text" name="price_first_class" class="reais form-control" placeholder="0,00"
                            required>
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

<!-- Modal editar -->
<div class="modal fade" id="editFlight" tabindex="-1" role="dialog" aria-labelledby="editFlightLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="edita" action="{{ route('editaviagem') }}" method="post">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="editFlightLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Codigo voo</label>
                        <select class="form-control" name="flights_id" id="code">
                            @foreach ($flights as $flight)
                            <option value="{{$flight->id}}">{{$flight->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Aeronave</label>
                        <select class="form-control" name="airplane_id" id="airplane">
                            @foreach ($airplanes as $airplane)
                            <option value="{{$airplane->id}}">{{$airplane->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data do Voo</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Valor Economica</label>
                        <input type="text" name="price_economics" id="economics" class="reais form-control"
                            placeholder="0,00" required>
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class="form-group">
                        <label>Valor Primeira classe</label>
                        <input type="text" name="price_first_class" id="firstclass" class="reais form-control"
                            placeholder="0,00" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" form="edita" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#editFlight').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var code = button.data('code')
  var flightsid = button.data('flightsid')
  var airplane = button.data('airplane')
  var date = button.data('date')
  var economics = button.data('economics')
  var firstclass = button.data('firstclass')
  var modal = $(this)
  modal.find('.modal-title').text('Editar viagem')
  modal.find('#id').val(id)
  modal.find('#code').val(code)
  modal.find('#flightsid').val(flightsid)
  modal.find('#airplane').val(airplane)
  modal.find('#date').val(date)
  modal.find('#economics').val(economics)
  modal.find('#firstclass').val(firstclass)
    })
</script>
@endsection