@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Editar /</span> Empresa
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Editar Empresa
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/empresa/atualizar/".$registro->id); ?>" method="post">
                {{ csrf_field()  }}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj"  class="form-control" placeholder="CNPJ" value="{{ $registro->cnpj }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Razão Social</label>
                        <input type="text" id="razaosocial" name="razaosocial" class="form-control" placeholder="Razão Social" value="{{ $registro->razaosocial }}">
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Nome Fantásia</label>
                    <input type="text" id="nomefantasia" name="nomefantasia" class="form-control" placeholder="Nome Fantásia" value="{{ $registro->nomefantasia }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Endereço </label>
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" value="{{ $registro->endereco }}">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Cidade</label>
                        <input type="text" id="cidade" name="cidade"  class="form-control" placeholder="Cidade" value="{{ $registro->cidade }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Bairro</label>
                        <input type="text" id="bairro" name="bairro"  class="form-control" placeholder="Bairro" value="{{ $registro->bairro }}">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">CEP</label>
                        <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP" value="{{ $registro->cep }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>

        </div>
    </div>

@endsection
