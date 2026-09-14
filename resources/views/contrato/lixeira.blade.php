@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Lista de /</span> Contratos que estão na Lixeira
    </h4>

    <form id="frm" name="frm" action="" method="post">
    @csrf

    <div align="right">
       <a href="{{ route("contratos.listar") }} "> <button type="button" class="btn btn-primary">Contratos</button></a>
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
                    <a href="javascript: if(confirm('Deseja realmente REATIVAR este contrato ?')){ window.location.href = '{{ route('contratos.reativar', $registro->id ) }}'}" title="Reativar Contrato" class="btn icon-btn btn-lg btn-outline-success"> <span class="fas fa-user-edit"></span></a>
                    <a href="javascript: if(confirm('Deseja realmente EXCLUIR este contrato Definitivamente, esse processo e irreversível ?')){ window.location.href = '{{ route('contratos.deletar', $registro->id ) }}'}" title="Excluir Contrato" class="btn icon-btn btn-outline-danger"> <span class="fas fa-trash -alt"></span></a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
       </div>
    </div>

    </form>
@endsection
