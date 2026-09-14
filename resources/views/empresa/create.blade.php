@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Cadastro  de /</span> Empresas
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Cadastro de Empresa
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/empresa/salvar"); ?>" method="post">
                {{ csrf_field()  }}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="__.___.___/____-__" data-mask="00.000.000/0000-00"  required value="{{ old('cnpj') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Razão Social</label>
                        <input type="text" id="razaosocial" name="razaosocial" class="form-control" placeholder="Razão Social" required>
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Nome Fantásia</label>
                    <input type="text" id="nomefantasia" name="nomefantasia" class="form-control" placeholder="Nome Fantásia" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Endereço </label>
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Cidade</label>
                        <input type="text" id="cidade" name="cidade"  class="form-control" placeholder="Cidade" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Bairro</label>
                        <input type="text" id="bairro" name="bairro"  class="form-control" placeholder="Bairro" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">CEP</label>
                        <input type="text" id="cep" name="cep" class="form-control" placeholder="__.___-___" data-mask="00.000-000" required value="{{ old('cep') }}" s>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>

@endsection
