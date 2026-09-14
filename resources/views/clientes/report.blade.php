@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Relatório de /</span> Clientes
    </h4>

    <div class="card">
       <div class="table-responsive">
       <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Cep</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Foto</th>
            </tr>
            </thead>
            <tbody>
            @foreach($registros as $registro)
            <tr>
                <th scope="row">{{ $registro->id }}</th>
                <td>{{ $registro->nome }}</td>
                <td>{{ $registro->cpf }}</td>
                <td>{{ $registro->endereco }}</td>
                <td>{{ $registro->cidade }}</td>
                <td>{{ $registro->bairro }}</td>
                <td>{{ $registro->cep }}</td>
                <td>{{ $registro->telefone }}</td>
                <td>{{ $registro->celuar }}</td>
                <td>{{ $registro->email }}</td>
                <td>
                    @if(!empty($registro->foto))
                    <img width="120" src="{{ asset($registro->foto) }}">
                   @endif
                </td>
            </tr>
            @endforeach
           </tbody>
        </table>
       </div>
    </div>
@endsection