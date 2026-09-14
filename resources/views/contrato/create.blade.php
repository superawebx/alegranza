@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Gerar </span> Contrato
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Dados do Contrato
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="{{ route('contratos.salvar') }}" method="post">
                {{ csrf_field()  }}

                  <div class="form-row">

                    <div class="form-group col-md-4">
                        <label class="form-label">Cliente / Razão Social</label>

                        <select class="form-control" id="clientes" name="clientes" required>
                            <option value="">Selecione..</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>

                    </div>
        
                   <div class="form-group col-md-4">
                        <label class="form-label">Parceiro</label>

                        <select class="form-control" id="parceiros" name="parceiros">
                            <option  value="">Selecione..</option>
                            @foreach($parceiros as $parceiro)
                                <option value="{{ $parceiro->id }}">{{ $parceiro->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Qtde Hora Evento</label>
                        <div class="input-group">
                            <a class="incr-btn-qtde-hora btn btn-primary" data-action="decrease" href="#">–</a>
                            <input class="qtdhoraevento form-control" name="qtdhoraevento" id="qtdhoraevento" required type="text" onblur="add(this.value)"  required>
                            <a class="incr-btn-qtde-hora btn btn-primary" data-action="increase" href="#">+</a>
                        </div>
                    </div>
                    

                    <div class="form-group col-md-12">
                        <label class="form-label">Noivos</label>
                        <input type="text" id="noivos" name="noivos" class="form-control" placeholder="Nome dos Noivos"  value="{{ old('noivos') }}">
                    </div>

                </div>

                <div class="form-row">
                   
                    <div class="form-group col-md-4">
                        <label class="form-label">Data Assinatura</label>
                        <input type="text" id="dataassinatura" name="dataassinatura" class="form-control" placeholder="__/__/____" data-mask="00/00/0000"  required value="{{ old('dataassinatura') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Valor Total </label>
                        <input type="text" id="valortotal" name="valortotal" class="form-control" placeholder="Valor Total"  required value="{{ old('valortotal') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Qtde Parcela</label>
                        <div class="input-group">
                            <a class="incr-btn btn btn-primary" data-action="decrease" href="#">–</a>
                            <input class="qtdeParcela form-control" name="qtdeParcela" id="qtdeParcela" required type="text" onblur="add(this.value)" >
                            <a class="incr-btn btn btn-primary" data-action="increase" href="#">+</a>
                        </div>
                    </div>

                 </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label class="form-label">Data Evento 1</label>
                        <input type="text" id="dataevento" name="dataevento" class="form-control" placeholder="__/__/____" data-mask="00/00/0000"  required value="{{ old('dataevento') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Data Evento 2</label>
                        <input type="text" id="dataevento2" name="dataevento2" class="form-control" placeholder="__/__/____" data-mask="00/00/0000"  value="{{ old('dataevento2') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Data Evento 3</label>
                        <input type="text" id="dataevento3" name="dataevento3" class="form-control" placeholder="__/__/____" data-mask="00/00/0000"  value="{{ old('dataevento3') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Hora Inicio </label>
                        <input type="text" id="horainicio" name="horainicio" class="form-control"  placeholder="__:__" data-mask="00:00"  required value="{{ old('horainicio') }}" >
                    </div>

                    <div class="form-group col-md-4">
                            <label class="form-label">Hora Término </label>
                            <input type="text" id="horatermino" name="horatermino" class="form-control"  placeholder="__:__" data-mask="00:00"  value="{{ old('horatermino') }}" >
                        </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Qtde Pessoas </label>
                        <input type="text" id="qtdpessoas" name="qtdpessoas" class="form-control" placeholder="____" data-mask="0000"  required value="{{ old('qtdpessoas') }}" >
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-label">Observação</label>
                        <input type="text" id="observacao" name="observacao" class="form-control" placeholder="Observação"  value="{{ old('observacao') }}">
                    </div>
                   

                </div>
                
                <div class="text-light small font-weight-semibold mb-3">Dados da Parcelas</div>

                <div id="HTM-DataVencimentos">
                </div>
                
                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
               
            </div>

            <script>
                $(function(){
                    $('#valortotal').maskMoney();
                });

                // Count Input (qtdeParcela)
                //------------------------------------------------------------------------------
                $(".incr-btn").on("click", function(e) {

                    var $button = $(this);
                    var oldValue = $button.parent().find('.qtdeParcela').val();
                    $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
                            
                    if ($button.data('action') == "increase") {

                        if (oldValue == "") {
                            newVal = 1;
                        }else {
                        var newVal = parseFloat(oldValue) + 1;
                        }
                    } else {

                        // Don't allow decrementing below 1
                        if (oldValue > 1) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 1;
                            $button.addClass('inactive');
                        }
                    }
                    $button.parent().find('.qtdeParcela').val(newVal);
                    e.preventDefault();

                    var html = "";
                    $('#HTM-DataVencimentos').find('div').remove();

                    for (i = 0; i < newVal; i++) {
                                        
                        html += "<div class='form-row'>";
                        html += "<div class='form-group col-md-4'>";
                        html += "<label class='form-label'>Data Vencimento Parcela</label>";
                        html += "<input type='text' "+i+" id='' name='datavencimento[]' class='form-control jq-datavencimento'  placeholder='__/__/____'  required>";
                        html += "</div>";

                        html += "<div class='form-group col-md-4'>";
                        html += "<label class='form-label'>Valor Vencimento Parcela</label>";
                        html += "<input type='text' "+i+" id='' name='valorparcela[]' class='form-control jq-valorparcela' placeholder='Valor Parcela'  required '>";
                        html += "</div>";
                        html += "</div>";
                                
                    }
                    
                    $("#HTM-DataVencimentos").append(html);
                    $('.jq-datavencimento').mask('99/99/9999');
                    $('.jq-valorparcela').maskMoney();
                    
            
                });

                 // Incremente - Qtde Hora Evento
                //------------------------------------------------------------------------------
                $(".incr-btn-qtde-hora").on("click", function(e) {

                    var $button = $(this);
                    var oldValue = $button.parent().find('.qtdhoraevento').val();
                    $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
                            
                    if ($button.data('action') == "increase") {

                        if (oldValue == "") {
                            newVal = 1;
                        }else {
                        var newVal = parseFloat(oldValue) + 1;
                        }
                    } else {

                        // Don't allow decrementing below 1
                        if (oldValue > 1) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 1;
                            $button.addClass('inactive');
                        }
                    }
                    $button.parent().find('.qtdhoraevento').val(newVal);
                    e.preventDefault();
            
                });
            
       
            </script>
                    
    </div>

    <html>
<head>    
@endsection

