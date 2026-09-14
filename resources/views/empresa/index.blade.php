@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Lista de /</span> Empresas
    </h4>

    <div align="right">
       <a href="<?= url('empresa/adicionar'); ?>"> <button type="button" class="btn btn-primary">Novo</button></a>
    </div>
    <br>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>CNPJ</th>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <th scope="row">{{ $registro->id }}</th>
                        <td>{{ $registro->cnpj }}</td>
                        <td>{{ $registro->razaosocial }}</td>
                        <td>{{ $registro->nomefantasia }}</td>
                        <td align="center">
                            <a href="<?= url('empresa/editar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-primary" ><span class="fas fa-user-edit"></span> </a>
                            <a href="<?= url('empresa/deletar/'.$registro->id ); ?>" class="btn icon-btn btn-sm btn-outline-danger"> <span class="fas fa-trash -alt"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
@endsection
