@extends('layouts.master')

@section('content')

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Agenda de /</span> Eventos
    </h4>

    <div class="card">
        <div class="table-responsive">
            <div class="card-body">
                <div id='fullcalendar-contratos'></div>
            </div>
        </div>
    </div>
    @include('contrato.modal-calendar')
@endsection
@section('post-script')
    @include('contrato.contrato-js')
@endsection
