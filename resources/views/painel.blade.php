@extends('layouts.master')
@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
            Adm Eventos - {{  $registro->id }} - {{  $registro->nomefantasia }}
        <div class="text-muted text-tiny mt-1">
            <small class="font-weight-normal">Seja bem vindo!</small>
        </div>
    </h4>

    <!-- Contadores -->
    <div class="row">
        
        <div class="col-sm-6 col-xl-4">

            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="lnr lnr-users display-4 text-warning"></div>
                        <div class="ml-3">
                            <div class="text-muted small">Clientes</div>
                        <div class="text-large">{{ $totalClientes }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-4">

            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="lnr lnr-earth display-4 text-info"></div>
                        <div class="ml-3">
                            <div class="text-muted small">Contratos</div>
                            <div class="text-large">{{ $totalContratos }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-4">

            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="lnr lnr-gift display-4 text-danger"></div>
                        <div class="ml-3">
                            <div class="text-muted small">Parceiros</div>
                            <div class="text-large">{{ $totalParceiros }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
     
    </div>
    <!-- / Contadores -->
    
     <!-- Faturamento mensal -->
     <div class="card mb-12">
            <h6 class="card-header">Total Mensal com Parcelas Vencidas</h6>
            <div class="table-responsive">
              <table class="table card-table">
                <thead>
                  <tr>
                    <th>Mês</th>
                    <th>Valor</th>
                  </tr>
                </thead>
                <tbody>
                @php($total = 0)
                @foreach($totalmesesVencidos as $totalmesesVencido)
                  <tr>
                    <td>{{ $totalmesesVencido['mes'] }}/ {{ $totalmesesVencido['ano'] }}</td>
                    <td>{{ number_format($totalmesesVencido['totalparcela'],2) }}</td>
                  </tr>
                  @php($total += $totalmesesVencido['totalparcela'])
                @endforeach
                </tbody>
                <tbody>
                    <tr bgcolor="#ccccccc">
                        <td><strong>Total: </strong></td>
                        <td><strong>{{ number_format($total,2) }}</td>
                    </tr>
                    </tbody>
              </table>
          </div>
          </div>
          <!-- / Popular products -->

@endsection
