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

            <form action="<?= url("/parceiros/atualizar/".$registro->id); ?>" method="post">

                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required value="{{ $registro->nome }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control"  placeholder="___.___.___-__" data-mask="000.000.000-00" required value="{{ $registro->cpf }}">
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Endereço</label>
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" required value="{{ $registro->endereco }}">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Cidade</label>
                        <input type="text" id="cidade" name="cidade"  class="form-control" placeholder="Cidade" required value="{{ $registro->cidade }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Bairro</label>
                        <input type="text" id="bairro" name="bairro"  class="form-control" placeholder="Bairro" required value="{{ $registro->bairro }}">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">CEP</label>
                        <input type="text" id="cep" name="cep" class="form-control" placeholder="__.___-___" data-mask="00.000-000" required value="{{ $registro->cep }}">
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="(__) __-____" data-mask="(00) 0000-0000" required value="{{ $registro->telefone }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Celular</label>
                        <input type="text" id="celular" name="celular" class="form-control" placeholder="(__) _-__-____" data-mask="(00) 0-0000-0000"  required value="{{ $registro->celular }}">
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ $registro->email }}">
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>

        </div>

    </div>

@endsection
