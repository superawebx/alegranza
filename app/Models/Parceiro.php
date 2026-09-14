<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    protected $fillable = [
        'empresa_id',
        'nome',
        'cpf',
        'endereco',
        'cidade',
        'bairro',
        'cep',
        'telefone',
        'celular',
        'email'
    ];

    public $rules = [
        'nome'          => 'required|min:3|max:100',
        'cpf'           => 'required|min:11',
        'endereco'      => 'required|min:3|max:100',
        'cidade'        => 'required|min:3|max:50',
        'bairro'        => 'required|min:3|max:50',
        'cep'           => 'required|min:8',
        'telefone'      => 'required',
        'celular'       => 'required',
        'email'         => 'required|email|min:3|max:100|regex:/^.+@.+$/i',
    ];
}