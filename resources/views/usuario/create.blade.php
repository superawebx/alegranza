@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Novo </span> Usuário
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Dados do Usuário
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/usuario/salvar"); ?>" method="post" enctype="multipart/form-data">

                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Empresa</label>

                        <select class="form-control" id="empresas" name="empresas" required>
                            <option value="">Selecione..</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nomefantasia }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Nome</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nome" required>
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="email" required>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label class="form-label">Senha</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Confirma Senha</label>
                        <input type="password" id="confirmapassword" name="confirmapassword" class="form-control" placeholder="Confirma Senha" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photograph" name="photograph">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
        </div>
    </div>
@endsection
