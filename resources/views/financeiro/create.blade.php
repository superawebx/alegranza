@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Cadastro  de /</span> Clientes
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Cadastro de Clientes
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/clientes/salvar"); ?>" method="post">
                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF">
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Endereço</label>
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço">
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Cidade</label>
                        <input type="text" id="cidade" name="cidade"  class="form-control" placeholder="Cidade">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Bairro</label>
                        <input type="text" id="bairro" name="bairro"  class="form-control" placeholder="Bairro">
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">CEP</label>
                        <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP">
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Celular</label>
                        <input type="text" id="celular" name="celular" class="form-control" placeholder="Celular">
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                </div>

                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
        </div>
    </div>

@endsection
