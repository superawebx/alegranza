<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Textocontrato extends Model
{
    protected $fillable = [
        'empresa_id',
        'titulo',
        'descricao',
        'texto',
        'imagem',
        'tipo'
    ];
}
