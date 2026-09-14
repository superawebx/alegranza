<?php

namespace App\Http\Controllers;

use App\Models\ContratoParcela;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ContratoParcelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data       = $request->all();
        $dataDia    = date('Y-m-d');

        if(empty($data)){
            $ano = date('Y');
            $mes = date('m');
            $situacao = "A";

        } else {
            $ano        = $data['ano'];
            $mes        = $data['mes'];
            $situacao   = $data['situacao'];
        }

        $sql = " SELECT cp.id, cp.contratos_id, cp.numParcela, cp.qtdeParcela, cp.datavencimento, ";
        $sql .= " cp.valorparcela , cp.situacao, cl.nome";
        $sql .= " FROM contrato_parcelas cp";
        $sql .= " inner join contratos ct on cp.contratos_id = ct.id";
        $sql .= " inner JOIN clientes cl on ct.clientes_id = cl.id";
        $sql .= " LEFT JOIN parceiros pr on ct.parceiros_id = pr.id";
        $sql .= " where Month(cp.datavencimento) = " . $mes;
        $sql .= " AND Year(cp.datavencimento) = " . $ano;

        if ($situacao == 'A'){
            $sql .= " AND cp.situacao = '" . $situacao  ."'";
        }

        if ($situacao == 'P'){
            $sql .= " AND cp.situacao = '" . $situacao  ."'";
        }

        if ($situacao == 'V'){
            $sql .= " AND cp.situacao = 'A'";
        }

        $sql .= " order By  cp.datavencimento, cl.nome";

       // dd($sql);
        
        $registros = DB::select("$sql");
        
        return view('financeiro.index', compact('registros','ano','mes','situacao','dataDia'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \AdmEventos\ContratoParcela  $contratoParcela
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \AdmEventos\ContratoParcela  $contratoParcela
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro =ContratoParcela::find($id);
        return view('financeiro.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \AdmEventos\ContratoParcela  $contratoParcela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $dados = $request->all();
        $registro = ContratoParcela::find($id);

        if(!empty($request->datavencimento)){
            $registro->datavencimento =  Carbon::createFromFormat('d/m/Y', $request->datavencimento);
        }
        if(!empty($request->datapagamento)){
            $registro->datapagamento =  Carbon::createFromFormat('d/m/Y', $request->datapagamento);
        }
      
        $registro->valorparcela	= str_replace(',','',$dados['valorParcela']);
        $registro->situacao	    = $dados['situacao'];
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com Sucesso','class'=>'primary']);

        return redirect()->route("financeiro.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AdmEventos\ContratoParcela  $contratoParcela
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
