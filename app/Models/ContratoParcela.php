<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratoParcela extends Model
{
    protected $fillable = [
        'contratos_id',
        'numParcela',
        'qtdeParcela',
        'datavencimento',
        'valorparcela',
        'datapagamento',
        'valorpagamento',
        'situacao'
    ];
}
