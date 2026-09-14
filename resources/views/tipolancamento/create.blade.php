@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Tipo </span> Lançamento
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Tipo de Lançamento
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/tipolancamento/salvar"); ?>" method="post">
                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label class="form-label">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="R">Receita</option>
                            <option value="D">Despesas</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Situação</label>
                        <select name="situacao" id="situacao" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="A">Ativo</option>
                            <option value="I">Inativo</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
        </div>
    </div>

@endsection
