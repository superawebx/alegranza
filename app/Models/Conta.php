<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
        'empresa_id',
        'tipolancamentos_id',
        'datapagamento',
        'valor',
        'Situacao',
        'descricao'
    ];

    public function tipo_lancamentos()
    {
         return $this->belongsto('AdmEventos\TipoLancamento', 'tipo_lancamentos_id');
    }

}
