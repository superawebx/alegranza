@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Lista de /</span> Contratos
    </h4>

    <form id="frm" name="frm" action="<?= url("/contratos/listar"); ?>" method="post">
    @csrf

    <div align="left">
        <input type="checkbox" name="ContratosVencidos" value="SIM"> Mostrar Contratos Vencidos  
        <button type="submit" class="btn btn-primary">Consultar</button>
     </div>
    <div align="right">
       <a href="{{ route("contratos.listaLixeira") }}"> <button type="button" class="btn btn-danger">Mostra Lixeira</button></a>
       <a href="{{ route("contratos.adicionar") }} "> <button type="button" class="btn btn-primary">Novo</button></a>
    </div>

    <br>
    <div class="card">
       <div class="table-responsive">
           <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Cliente / Razão Social</th>
                <th>Data Assinatura</th>
                <th>Data Evento</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($registros as $registro)
            <tr>
                <th scope="row">{{ $registro->id }}</th>
                <td>{{ $registro->nome }}</td>
                <td>{{ Carbon\Carbon::parse($registro->dataAssinatura)->format('d/m/Y')   }}</td>
                <td>{{ Carbon\Carbon::parse($registro->dataevento)->format('d/m/Y')   }}</td>
                <td>{{ number_format($registro->valortotal,2) }}</td>

                <td align="center">
                    <a href="{{ route('contratos.pdf', $registro->id ) }}" target="_blank" class="btn icon-btn btn-outline-primary"> <span class="fas fa-user-edit"></span></a>
                    <a href="javascript: if(confirm('Deseja realmente mover esse contrato para Lixeira?')){ window.location.href = '{{ route('contratos.lixeira', $registro->id ) }}'}" class="btn icon-btn btn-outline-danger"> <span class="fas fa-trash"></span></a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
       </div>
    </div>

    </form>
@endsection
