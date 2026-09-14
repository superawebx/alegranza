@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Lista de /</span> Parceiros
    </h4>

    <div align="right">
       <a href="<?= url('parceiros/adicionar'); ?>"> <button type="button" class="btn btn-primary">Novo</button></a>
    </div>
    <br>
    <div class="card">
      <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                <tr>
                    <th scope="row">{{ $registro->id }}</th>
                    <td>{{ $registro->nome }}</td>
                    <td>{{ $registro->cpf }}</td>
                    <td>{{ $registro->endereco }}</td>
                    <td align="center">
                        <a href="<?= url('parceiros/editar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-primary" ><span class="fas fa-user-edit"></span> </a>
                        <a href="<?= url('parceiros/deletar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-danger"> <span class="fas fa-trash -alt"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
      </div>
    </div>
@endsection
