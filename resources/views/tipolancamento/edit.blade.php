@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Editar /</span> Parceiro
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Editar Parceiro
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/tipolancamento/atualizar/".$registro->id); ?>" method="post">

                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label class="form-label">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição" value="{{ $registro->descricao }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="0">Selecione...</option>
                            <option value="R" {{ isset($registro->tipo) && $registro->tipo =='R' ? 'selected' : '' }} >Receita</option>
                            <option value="D" {{ isset($registro->tipo) && $registro->tipo =='D' ? 'selected' : '' }} >Despesas</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Situação</label>
                        <select name="situacao" id="situacao" class="form-control">
                            <option value="0">Selecione...</option>
                            <option value="A" {{ isset($registro->situacao) && $registro->situacao =='A' ? 'selected' : '' }} >Ativo</option>
                            <option value="I" {{ isset($registro->situacao) && $registro->situacao =='I' ? 'selected' : '' }} >Inativo</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>

        </div>

    </div>

@endsection
