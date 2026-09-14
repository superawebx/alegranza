@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Editar /</span> Conta
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Dados da Conta
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/contas/atualizar/".$registro->id); ?>" method="post">

                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label class="form-label">Ano</label>
                        <input type="text" id="ano" name="ano" class="form-control" placeholder="Ano" value="{{ date('Y', strtotime($registro->datapagamento)) }}" >
                    </div>

                    <div class="form-group col-md-10">
                        <label class="form-label">Tipo Lançamento</label>
                        <select name="tipolancamentos" id="tipolancamentos" class="form-control">
                            <option value="0">Selecione...</option>
                            @foreach($tipolancamentos as $tipolancamento)
                                <option value="{{ $tipolancamento->id }}" {{(isset($registro->tipo_lancamentos_id	) && $registro->tipo_lancamentos_id	 == $tipolancamento->id  ? 'selected' : '')}}>{{ $tipolancamento->descricao }}
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="form-label">Data Pagamento</label>
                        <input type="text" id="datapagamento" name="datapagamento" class="form-control" placeholder="Data Pagamento" value="{{ date('d/m/Y', strtotime($registro->datapagamento)) }}">
                    </div>

                    <div class="form-group col-md-5">
                        <label class="form-label">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição" value="{{ $registro->descricao }}">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">Valor</label>
                        <input type="text" id="valor" name="valor"  class="form-control" placeholder="Valor" value="{{ $registro->valor }}">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">Situação</label>
                        <select name="situacao" id="situacao" class="form-control">
                            <option value="0">Selecione...</option>
                            <option value="A" {{ isset($registro->Situacao) && $registro->Situacao =='A' ? 'selected' : '' }} >Aberto</option>
                            <option value="P" {{ isset($registro->Situacao) && $registro->Situacao =='P' ? 'selected' : '' }} >Pago</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>

            </form>

        </div>

    </div>

@endsection
