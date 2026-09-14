<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoLancamento extends Model
{
    protected $fillable = [
        'empresa_id',
        'descricao',
        'tipo',
        'situacao'
    ];

}
