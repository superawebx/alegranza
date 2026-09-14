<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contrato extends Model
{
    protected $fillable = [
        'empresa_id',
        'clientes_id',
        'parceiros_id',
        'qtdhoraevento',
        'noivos',
        'dataAssinatura',
        'valortotal',
        'qtdeParcela',
        'dataevento',
        'horainicio',
        'qtdpessoas',
        'situacaoContrato',
        'dataevento2',
        'dataevento3',
        'horatermino',
        'observacao'
    ];

    public function cliente()
    {
        return $this->belongsto('AdmEventos\Cliente', 'clientes_id');
    }

    public function parceiro()
    {
        return $this->belongsto('AdmEventos\Parceiro', 'parceiros_id');
    }

    public $rules = [
        'clientes'          => 'required|numeric',
        'dataassinatura'    => 'required',
        'valortotal'        => 'required',    
        'qtdeParcela'       => 'required|min:1|max:2',
        'dataevento'        => 'required',
        'horainicio'        => 'required',
        'qtdpessoas'        => 'required',
    ];

    /**
     * Busca os contratos e faz uma junção com a tabela clientes para pega o nome do cliente para exibir no calendário
     *
     * @return array com os dados (se houver)
     */
    protected function getContracts()
    {   

        $ano    = date('Y');
        $mes    = date('m');

        $data = "'" . date('Y-m-d') . "'";
      
       $whereAno = "AND YEAR(a.dataevento) = {$ano}";

       return DB::select("
                SELECT
                a.id,
                a.dataevento,
                a.dataevento2,
                a.dataevento3,
                a.dataAssinatura,
                a.qtdpessoas,
                a.valortotal,
                a.horainicio,
                a.horatermino,
                a.observacao,
                b.nome,
                b.foto
            FROM
                contratos AS a
            JOIN clientes AS b ON b.id = a.clientes_id
            WHERE 1=1
            ORDER BY b.nome, a.dataevento ASC;
         ");
    }

}
