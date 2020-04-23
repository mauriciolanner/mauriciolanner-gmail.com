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
            <h4 class="card-title">Aeroportos cadastrados</h4>
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
                                Cidade - Estado
                            </th>
                            <th>
                                Codigo
                            </th>
                            <th>
                                opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($airports as $airport)
                        <tr>
                            <td>
                                {{$airport->name}}
                            </td>
                            <td>
                                {{$airport->city}} - {{$airport->state}}
                            </td>
                            <td>
                                {{$airport->code}}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-info btn-round btn-icon" data-toggle="modal"
                                    data-target="#editAirport" data-id="{{$airport->id}}" data-name="{{$airport->name}}"
                                    data-city="{{$airport->city}}" data-state="{{$airport->state}}"
                                    data-code="{{$airport->code}}"><i class="fa fa-pencil-square-o"
                                        style="font-size: 18px;"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-round btn-icon"><i class="fa fa-trash"
                                        style="font-size: 18px;" data-toggle="modal" data-target="#confirme"
                                        data-title="Deseja mesmo deletar?"
                                        data-link="airport/deleta/{{$airport->id}}"></i></button>
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
            <form id="cadastra" action="{{ route('novoaeroporto') }}" method="post">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="criarLabel">Cadastrar novo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome do aeroporto</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" id="state" name="state">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
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
<div class="modal fade" id="editAirport" tabindex="-1" role="dialog" aria-labelledby="editAirportLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="edita" action="{{ route('editaaeroporto') }}" method="post">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="editAirportLabel">Cadastrar novo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome do aeroporto</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <input type="hidden" name="id" id="id" required>
                    </div>
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" name="code" id="code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" id="state" name="state">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
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
    $('#editAirport').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var name = button.data('name') 
  var id = button.data('id')
  var city = button.data('city')
  var state = button.data('state')
  var code = button.data('code')
  var modal = $(this)
  modal.find('.modal-title').text('Editar ' + name)
  modal.find('#name').val(name)
  modal.find('#id').val(id)
  modal.find('#code').val(code)
  modal.find('#city').val(city)
  modal.find('#state').val(state)
    })
</script>
@endsection