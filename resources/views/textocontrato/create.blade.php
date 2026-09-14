@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Cadastro de </span> Texto Contrato
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Dados do Contrato
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/textocontrato/salvar"); ?>" method="post" enctype="multipart/form-data">

                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição">
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Texto</label>
                    <textarea id="texto" name="texto" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-row">
                   
                    <div class="form-group col-md-8">
                        <label class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option>Selecione o Tipo..</option>
                            <option>Contrato</option>
                        </select>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
        </div>
    </div>



@endsection
