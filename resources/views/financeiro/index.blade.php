@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4"> 
        <span class="text-muted font-weight-light">Contas à /</span> Receber
    </h4>

    <form action="<?= url("/financeiro/listar"); ?>" method="post" class="form-inline">
     {{ csrf_field()  }}

        <div class="form-row">

            <div class="input-group mr-sm-1 mb-1 mb-sm-0">
                <label class="form-label mr-sm-2">Ano: </label>
                <input type="text" id="ano" name="ano" value="{{ $ano }}" class="form-control" placeholder="Ano">
            </div>

            <div class="input-group mr-sm-4 mb-4 mb-sm-0">
            <label class="form-label mr-sm-2">Mês: </label>
            <select name="mes" id="mes" class="form-control">
                <option value="0">Selecione...</option>
                <option value="1" {{ isset($mes) && $mes =='1' ? 'selected' : '' }} >Janeiro</option>
                <option value="2" {{ isset($mes) && $mes =='2' ? 'selected' : '' }} >Fevereiro</option>
                <option value="3" {{ isset($mes) && $mes =='3' ? 'selected' : '' }} >Março</option>
                <option value="4" {{ isset($mes) && $mes =='4' ? 'selected' : '' }} >Abril</option>
                <option value="5" {{ isset($mes) && $mes =='5' ? 'selected' : '' }} >Maio</option>
                <option value="6" {{ isset($mes) && $mes =='6' ? 'selected' : '' }} >junho</option>
                <option value="7" {{ isset($mes) && $mes =='7' ? 'selected' : '' }} >Julho</option>
                <option value="8" {{ isset($mes) && $mes =='8' ? 'selected' : '' }} >Agosto</option>
                <option value="9" {{ isset($mes) && $mes =='9' ? 'selected' : '' }} >Setembro</option>
                <option value="10" {{ isset($mes) && $mes =='10' ? 'selected' : '' }} >Outubro</option>
                <option value="11" {{ isset($mes) && $mes =='11' ? 'selected' : '' }} >Novembro</option>
                <option value="12" {{ isset($mes) && $mes =='12' ? 'selected' : '' }} >Dezembro</option>
            </select>
            </div>

            <div class="input-group mr-sm-2 mb-2 mb-sm-0">
                <label class="form-label mr-sm-2">Situação: </label>
                <select name="situacao" id="situacao" class="form-control">
                <option value="0">Selecione...</option>
                <option value="A" {{ isset($situacao) && $situacao =='A' ? 'selected' : '' }} >Aberto</option>
                <option value="P" {{ isset($situacao) && $situacao =='P' ? 'selected' : '' }} >Pago</option>
                <option value="V" {{ isset($situacao) && $situacao =='V' ? 'selected' : '' }} >Vencidos</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Consultar</button>

        </div>

    </form>
    <BR>
    <div class="card">

      <div class="table-responsive">
       <table class="table table-bordered">
           
            <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Contrato</th>
                <th>Cliente / Razão Social</th>
                <th>Parcela</th>
                <th>data Vencimento</th>
                <th>Valor</th>
                <th>Situação</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @php($total = 0)
            @foreach($registros as $registro)

                @php($cor ="")
                
                <!-- Verifica se a data de hoje e maior do que a data de vencimento-->
                @if ($dataDia > $registro->datavencimento )
                    @php($Vencido ="SIM")
                    @php($cor ="#FF9797")
                @else
                    @php($Vencido ="NAO")    
                @endif

                @if ($situacao =="A" )
                     @php($cor ="")
                @endif

                @if ($situacao =="P" )
                     @php($cor ="#CCFBC4")
                @endif

                @if ($situacao =="V" )
                     @php($cor ="#FF9797")
                @endif

                
                @if ($situacao =="V" and $Vencido == "SIM")
                    <tr bgcolor="{{ $cor }}">
                        <th scope="row">{{ $registro->id }}</th>
                        <td>{{ $registro->contratos_id }}</td>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->numParcela ."/". $registro->qtdeParcela   }}</td>
                        <td>{{ date('d/m/Y', strtotime($registro->datavencimento)) }}</td>
                        <td align="right" ><strong>{{ number_format($registro->valorparcela,2) }}</strong></td>
                        <td align="center">{{ $situacao }}</td>
                        <td align="center"><a href="<?= url('financeiro/editar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-success"  ><span class="fas fa-money-bill"></span> </a>
                        </td>
                    </tr>
                @endif

                @if ($situacao =="A" and  $Vencido == "NAO")
                <tr bgcolor="{{ $cor }}">
                    <th scope="row">{{ $registro->id }}</th>
                    <td>{{ $registro->contratos_id }}</td>
                    <td>{{ $registro->nome }}</td>
                    <td>{{ $registro->numParcela ."/". $registro->qtdeParcela   }}</td>
                    <td>{{ date('d/m/Y', strtotime($registro->datavencimento)) }}</td>
                    <td align="right" ><strong>{{ number_format($registro->valorparcela,2) }}</strong></td>
                    <td align="center">{{ $situacao }}</td>
                    <td align="center">
                        <a href="<?= url('financeiro/editar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-success"  ><span class="fas fa-money-bill"></span> </a>
                    </td>
                </tr>
                @endif

                @if ($situacao =="P")
                <tr bgcolor="{{ $cor }}">
                    <th scope="row">{{ $registro->id }}</th>
                    <td>{{ $registro->contratos_id }}</td>
                    <td>{{ $registro->nome }}</td>
                    <td>{{ $registro->numParcela ."/". $registro->qtdeParcela   }}</td>
                    <td>{{ date('d/m/Y', strtotime($registro->datavencimento)) }}</td>
                    <td align="right" ><strong>{{ number_format($registro->valorparcela,2) }}</strong></td>
                    <td align="center">{{ $situacao }}</td>
                    <td align="center"><a href="<?= url('financeiro/editar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-success"  ><span class="fas fa-money-bill"></span> </a>
                    </td>
                </tr>
                @endif
                
                @php($total += $registro->valorparcela)
                
            @endforeach
            <tr bgcolor="#cccccc">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><strong>Total: </strong></td>
                    <td align="right"><strong>{{ number_format($total,2) }}</strong></td>
                    <td></td>
                    <td></td>
                </tr>
           </tbody>
        </table>
       </div>
    </div>
@endsection