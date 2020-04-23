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
            <h4 class="card-title">Voos cadastrados</h4>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                Codigo
                            </th>
                            <th>
                                Partida - Horario
                            </th>
                            <th>
                                Destino - Horario
                            </th>
                            <th>
                                opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flights as $flight)
                        <tr>
                            <td>
                                {{$flight->code}}
                            </td>
                            <td>
                                @foreach ($airports as $airport)
                                @if($flight->from == $airport->id)
                                {{$airport->code}} - {{$airport->city}} / {{$airport->state}}
                                @endif
                                @endforeach - {{$flight->time_from}}
                            </td>
                            <td>
                                @foreach ($airports as $airport)
                                @if($flight->to == $airport->id)
                                {{$airport->code}} - {{$airport->city}} / {{$airport->state}}
                                @endif
                                @endforeach - {{$flight->time_to}}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-info btn-round btn-icon" data-toggle="modal"
                                    data-target="#editFlight" data-id="{{$flight->id}}" data-code="{{$flight->code}}"
                                    data-timefrom="{{$flight->time_from}}" data-timeto="{{$flight->time_to}}"
                                    data-from="{{$flight->from}}" data-to="{{$flight->to}}"><i
                                        class="fa fa-pencil-square-o" style="font-size: 18px;"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-round btn-icon"><i class="fa fa-trash"
                                        style="font-size: 18px;" data-toggle="modal" data-target="#confirme"
                                        data-title="Deseja mesmo deletar?"
                                        data-link="/painel/voos/deleta/{{$flight->id}}"></i></button>
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
            <form id="cadastra" action="{{ route('novovoo') }}" method="post">
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
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hora partida</label>
                        <input type="time" name="time_from" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hora chegada</label>
                        <input type="time" name="time_to" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Partida</label>
                        <select class="form-control" name="from" id="from">
                            @foreach ($airports as $airport)
                            <option value="{{$airport->id}}">
                                {{$airport->code}} - {{$airport->name}} - {{$airport->city}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Destino</label>
                        <select class="form-control" name="to" id="to">
                            @foreach ($airports as $airport)
                            <option value="{{$airport->id}}">
                                {{$airport->code}} - {{$airport->name}} - {{$airport->city}}
                            </option>
                            @endforeach
                        </select>
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
            <form id="edita" action="{{ route('editavoo') }}" method="post">
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
                        <input type="text" name="code" id="code" class="form-control" required>
                        <input type="hidden" name="id" id="id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hora partida</label>
                        <input type="time" name="time_from" id="timefrom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hora chegada</label>
                        <input type="time" name="time_to" id="timeto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Partida</label>
                        <select class="form-control" name="from" id="from">
                            @foreach ($airports as $airport)
                            <option value="{{$airport->id}}">
                                {{$airport->code}} - {{$airport->name}} - {{$airport->city}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Destino</label>
                        <select class="form-control" name="to" id="to">
                            @foreach ($airports as $airport)
                            <option value="{{$airport->id}}">
                                {{$airport->code}} - {{$airport->name}} - {{$airport->city}}
                            </option>
                            @endforeach
                        </select>
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
  var code = button.data('code') 
  var id = button.data('id')
  var from = button.data('from')
  var to = button.data('to')
  var timefrom = button.data('timefrom')
  var timeto = button.data('timeto')
  var modal = $(this)
  modal.find('.modal-title').text('Editar ' + code)
  modal.find('#code').val(code)
  modal.find('#id').val(id)
  modal.find('#to').val(to)
  modal.find('#from').val(from)
  modal.find('#timefrom').val(timefrom)
  modal.find('#timeto').val(timeto)
    })
</script>
@endsection