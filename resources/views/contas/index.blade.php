@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Contas à /</span> Pagar / Receitas
    </h4>

    <div align="right">
       <a href="<?= url('contas/adicionar'); ?>"> <button type="button" class="btn btn-primary">Novo</button></a>
    </div>
    <br>

    <form action="<?= url("/contas/listar"); ?>" method="post" class="form-inline">
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

            <div class="input-group mr-sm-4 mb-4 mb-sm-0">
                <label class="form-label mr-sm-2">Tipo: </label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="todos">todos</option>
                    <option value="R" {{ isset($tipo) && $tipo =='R' ? 'selected' : '' }}>Receita</option>
                    <option value="D" {{ isset($tipo) && $tipo =='D' ? 'selected' : '' }}>Despesas</option>
                </select>
            </div>

            <div class="input-group mr-sm-4 mb-4 mb-sm-0">
                <label class="form-label mr-sm-2">Tipo Lançamento: </label>
                <select name="tipolancamentos" id="tipolancamentos" class="form-control""">
                    <option value="">Selecione..</option>
                    @foreach($tipolancamentos as $tipolancamento)
                        <option value="{{ $tipolancamento->id }}" {{ isset($idTipolancamento) && $idTipolancamento == $tipolancamento->id ? 'selected' : '' }} >{{ $tipolancamento->descricao }}</option>
                    @endforeach
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
                <th>Data</th>
                <th>Tipo Lançamento	</th>
                <th>Descrição</th>
                <th>Valor R$</th>
                <th> Situação</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>

            @php
                $totalAberto = 0;
                $TotalReceita = 0;
                $TotalDespensas = 0;
            @endphp

            @foreach($registros as $registro)

                @if($registro->situacao == 'A')
                    @php
                      $totalAberto += $registro->valor;
                    @endphp
                @endif

                @if($registro->situacao == 'P')

                    @if($registro->tipo == "R")
                        @php
                            $TotalReceita += $registro->valor;
                        @endphp
                    @endif

                    @if($registro->tipo == "D")
                        @php
                            $TotalDespensas += $registro->valor;
                        @endphp
                    @endif

                @endif
                         <tr >
                <th scope="row">{{ $registro->id }}</th>
                <td>{{ date('d/m/Y', strtotime($registro->datapagamento)) }}</td>
                <td>
                    @if ($registro->tipo == 'D') 
                        Dispesas
                    @else 
                        Receita
                    @endif
               </td>
                <td>{{ $registro->descricao }}</td>
                <td>{{ number_format($registro->valor, 2, ',', '.') }}</td>
                <td>{{ $registro->situacao }}</td>
                <td align="center">
                    <a href="<?= url('contas/editar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-primary" ><span class="fas fa-user-edit"></span> </a>
                    <a href="<?= url('contas/deletar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-danger"> <span class="fas fa-trash -alt"></span></a>
                </td>
            </tr>
            @endforeach
            <tr bgcolor="#dcdcdc">
                <th colspan="7"></th>
            </tr>
            <tr bgcolor="#FFFFCC">
                <th colspan="4">Total à pagar em Aberto:</th>
                <th> {{ number_format($totalAberto, 2, ',', '.')  }} </th>
                <th></th>
                <th></th>
            </tr>
            <tr bgcolor="#FCA0AE">
                <th colspan="4">Total Despesas:</th>
                <th>{{ number_format($TotalDespensas, 2, ',', '.')   }}</th>
                <th></th>
                <th></th>
            </tr>
            <tr bgcolor="#CCFBC4">
                <th colspan="4">Total Receitas:</th>
                <th>{{ number_format($TotalReceita, 2, ',', '.')  }}</th>
                <th></th>
                <th></th>
            </tr>

            <tr bgcolor="#D5D5FF">
                <th colspan="4">Total de Contratos Pago:</th>
                <th>{{ number_format($contrato, 2, ',', '.')  }}</th>
                <th></th>
                <th></th>
            </tr>

            <tr bgcolor="#CCCCCC">
                <th colspan="4">Total Caixa:</th>
                <th>{{ number_format($TotalReceita + $contrato - $TotalDespensas , 2, ',', '.')  }}</th>
                <th></th>
                <th></th>
            </tr>

           </tbody>
        </table>
    </div>
    </div>
@endsection
