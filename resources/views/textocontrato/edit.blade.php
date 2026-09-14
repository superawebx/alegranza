@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Editar /</span> Contrato
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Dados do Contrato
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/textocontrato/atualizar/".$registro->id); ?>" method="post" enctype="multipart/form-data">

                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título" value="{{ $registro->titulo }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição" value="{{ $registro->descricao }}">
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label">Texto</label>
                    <textarea id="texto" name="texto" class="form-control" rows="5">{{ $registro->texto }}</textarea>
                </div>

                <div class="form-row">
                    
                    <div class="form-group col-md-8">
                        <label class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem">
                    </div>

                    <div class="form-group col-md-4" align="center">
                        @if(isset($registro->imagem))
                         <img width="120" src="{{ asset($registro->imagem) }}">
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option>Selecione..</option>
                            <option value="Contrato" {{ isset($registro->tipo) && $registro->tipo =='Contrato' ? 'selected' : '' }} >Contrato</option>
                        </select>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>

        </div>

    </div>

@endsection
