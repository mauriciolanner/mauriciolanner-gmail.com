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
            <h4 class="card-title">Frota de aeronaves</h4>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                Prefixo
                            </th>
                            <th>
                                Primeira Classe
                            </th>
                            <th>
                                Economica
                            </th>
                            <th>
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($airplanes as $airplane)
                        <tr>
                            <td>
                                {{$airplane->name}}
                            </td>
                            <td>
                                {{$airplane->prefix}}
                            </td>
                            <td>
                                {{$airplane->capacity_firstclass}}
                            </td>
                            <td>
                                {{$airplane->capacity_economic}}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-info btn-round btn-icon" data-toggle="modal"
                                    data-target="#editAirplane" data-id="{{
                                    $airplane->id}}" data-name="{{$airplane->name}}"
                                    data-prefix="{{$airplane->prefix}}"
                                    data-capacity_firstclass="{{$airplane->capacity_firstclass}}"
                                    data-capacity_economic="{{$airplane->capacity_economic}}">
                                    <i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-round btn-icon"><i class="fa fa-trash"
                                        style="font-size: 18px;" data-toggle="modal" data-target="#confirme"
                                        data-title="Deseja mesmo deletar?"
                                        data-link="frota/deleta/{{$airplane->id}}"></i></button>
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
            <form id="cadastra" action="{{ route('novafrota') }}" method="post">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="criarLabel">Cadastrar novo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Modelo da aeronave</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Prefixo</label>
                        <input type="text" name="prefix" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Capacidade Primeira classe</label>
                        <input type="text" name="capacity_firstclass" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Capacidade econômica</label>
                        <input type="text" name="capacity_economic" class="form-control" required>
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
<div class="modal fade" id="editAirplane" tabindex="-1" role="dialog" aria-labelledby="editAirplaneLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="edita" action="{{ route('editafrota') }}" method="post">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="editAirplaneLabel">Cadastrar novo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Modelo da aeronave</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <input type="hidden" name="id" id="id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Prefixo</label>
                        <input type="text" name="prefix" id="prefix" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Capacidade Primeira classe</label>
                        <input type="text" name="capacity_firstclass" id="capacity_firstclass" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Capacidade econômica</label>
                        <input type="text" name="capacity_economic" id="capacity_economic" class="form-control"
                            required>
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
    $('#editAirplane').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var name = button.data('name') 
  var prefix = button.data('prefix')
  var capacity_firstclass = button.data('capacity_firstclass')
  var capacity_economic = button.data('capacity_economic')
  var modal = $(this)
  modal.find('.modal-title').text('Editar ' + name)
  modal.find('#id').val(id)
  modal.find('#name').val(name)
  modal.find('#prefix').val(prefix)
  modal.find('#capacity_firstclass').val(capacity_firstclass)
  modal.find('#capacity_economic').val(capacity_economic)
    })
</script>
@endsection