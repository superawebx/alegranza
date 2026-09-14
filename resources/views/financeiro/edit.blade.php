@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Baixar  /</span> Parcela
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Dados da Parcela
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/financeiro/atualizar/".$registro->id); ?>" method="post">

                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label class="form-label">Contrato ID</label>
                        <input type="text" id="contrato_id" name="contrato_id" class="form-control" placeholder="Contrato ID" readonly value="{{ $registro->contratos_id }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label class="form-label">Nº Parcela </label>
                        <input type="text" id="numparcela" name="numparcela" class="form-control" placeholder="Nº Parcela" readonly value="{{ $registro->numParcela }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label class="form-label">Data Vencimento</label>
                        <input type="text" id="datavencimento" name="datavencimento"  class="form-control" placeholder="Data Vencimento" value="{{ date('d/m/Y', strtotime($registro->datavencimento))  }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label class="form-label">Valor Parcela</label>
                        <input type="text" id="valorParcela" name="valorParcela"  class="form-control" required placeholder="Valor" value="{{ number_format($registro->valorparcela,2) }}">
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-label">Data Pagamento</label>
                        <input type="text" id="datapagamento" name="datapagamento"  class="form-control"class="form-control" value="{{ date('d/m/Y', strtotime($registro->datapagamento))  }}"   placeholder="__/__/____" data-mask="00/00/0000" >
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Situação</label>
                        <select name="situacao" id="situacao" class="form-control">
                            <option value="0">Selecione...</option>
                            <option value="A" {{ isset($registro->situacao) && $registro->situacao =='A' ? 'selected' : '' }} >Ativo</option>
                            <option value="P" {{ isset($registro->situacao) && $registro->situacao =='P' ? 'selected' : '' }} >Pago</option>
                        </select>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Alterar / Baixar Parcela</button>

                <script>
                        $(function(){
                            $('#valorParcela').maskMoney();
                        });
                    </script>
                    

        </div>
    </div>
@endsection
