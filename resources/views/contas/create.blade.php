@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Cadastro de </span> Contas
    </h4>

    <div class="card mb-4">
        <h6 class="card-header">
            Dados da Conta
        </h6>
        <div class="card-body" onautocomplete="off">

            <form action="<?= url("/contas/salvar"); ?>" method="post">
                {{ csrf_field()  }}

                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label class="form-label">Ano</label>
                        <input type="text" id="ano" name="ano" class="form-control" data-mask="0000"  required value="{{ $ano }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label class="form-label">Mês</label>
                        <select name="mes" id="mes" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="1" {{ isset($mes) && $mes =='1' ? 'selected' : '' }} >Janeiro</option>
                            <option value="2" {{ isset($mes) && $mes =='2' ? 'selected' : '' }} >Fevereiro</option>
                            <option value="3" {{ isset($mes) && $mes =='3' ? 'selected' : '' }}>Março</option>
                            <option value="5" {{ isset($mes) && $mes =='4' ? 'selected' : '' }}>Abril</option>
                            <option value="5" {{ isset($mes) && $mes =='5' ? 'selected' : '' }}>Maio</option>
                            <option value="6" {{ isset($mes) && $mes =='6' ? 'selected' : '' }}>junho</option>
                            <option value="7" {{ isset($mes) && $mes =='7' ? 'selected' : '' }}>Julho</option>
                            <option value="8" {{ isset($mes) && $mes =='8' ? 'selected' : '' }}>Agosto</option>
                            <option value="9" {{ isset($mes) && $mes =='9' ? 'selected' : '' }}>Setembro</option>
                            <option value="10" {{ isset($mes) && $mes =='10' ? 'selected' : '' }}>Outubro</option>
                            <option value="11" {{ isset($mes) && $mes =='11' ? 'selected' : '' }}>Novembro</option>
                            <option value="12" {{ isset($mes) && $mes =='12' ? 'selected' : '' }}>Dezembro</option>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="form-label">Tipo Lançamento</label>
                        <select name="tipolancamentos" id="tipolancamentos" class="form-control" required>
                            <option value="">Selecione..</option>
                            @foreach($tipolancamentos as $tipolancamento)
                                <option value="{{ $tipolancamento->id }}">{{ $tipolancamento->descricao }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">Meses</label>
                        <input type="text" id="meses" name="meses" class="form-control" placeholder="__" data-mask="00"  required value="{{ old('meses') }}">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="form-label">Data Pagamento</label>
                        <input type="text" id="datapagamento" name="datapagamento" class="form-control" placeholder="__/__/____" data-mask="00/00/0000"  required value="{{ old('datapagamento') }}" >
                      </div>

                    <div class="form-group col-md-5">
                        <label class="form-label">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">Valor</label>
                        <input type="text" id="valor" name="valor"  class="form-control " placeholder="Valor" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="form-label">Situação</label>
                        <select name="situacao" id="situacao" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="A">Aberto</option>
                            <option value="P">Pago</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
            <script>
                $(function(){
                    $('#valor').maskMoney();
                });
            </script>
        </div>
    </div>

@endsection
