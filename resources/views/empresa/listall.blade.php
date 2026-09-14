@extends('layouts.master')

@section('content')
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Lista de /</span> Empresas
    </h4>
    <div class="row">
        @foreach ($empresas as $empresa)
            
            <div class="col-sm-12 col-md-12	col-lg-4 col-xl-4">
                <a href="{{ route('home', $empresa->id) }}">
                    <div class="card" style="box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);">
                        <div class="card-body">
                            <h5 class="card-title" style="color: black">{{ $empresa->razaosocial }}</h5>
                            <p class="card-text" style="color: gray;">{{ $empresa->cnpj }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
