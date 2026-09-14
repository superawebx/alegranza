<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'cnpj',
        'razaosocial',
        'nomefantasia',
        'endereco',
        'cidade',
        'bairro',
        'cep'
    ];

    public $timestamps = false;

}
