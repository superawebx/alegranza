<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\TipoLancamento;
use Illuminate\Http\Request;
use DB;
use function Sodium\add;
use Carbon\Carbon;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $tipo = $request->tipo;
        $tipolancamentos = TipoLancamento::all();
        $idTipolancamento = $request->tipolancamentos;
        
        if(empty($data)){
            $ano = date('Y');
            $mes = date('m');
            
        } else {
            $ano        = $data['ano'];
            $mes        = $data['mes'];
         
        }

        if(!empty($idTipolancamento)){
            $testeTipoLancamento = [
                ['c.tipo_lancamentos_id','=',$idTipolancamento]
            ];
        }else{
            $testeTipoLancamento = [
                ['c.tipo_lancamentos_id','<>',null]
            ];
        }

        if(!empty($tipo)){
            if($request['tipo'] == 'todos'){
                $testeTipo = [
                ['tl.tipo','<>',null]
                ];
            }else{
                $testeTipo = [
                ['tl.tipo','=',$request['tipo']]
                ];
            }
        }else{
            $testeTipo = [
                ['tl.tipo','<>',null]
                ];
        }

        $registros = DB::table('contas AS c')
        ->join('tipo_lancamentos AS tl', 'c.tipo_lancamentos_id', '=', 'tl.id')
        ->select('c.*', 'tl.tipo')
            ->where([
              // ['tl.tipo', '=', $request->tipo]
            ])
            ->where($testeTipo)
            ->where($testeTipoLancamento)
            ->whereMonth('c.datapagamento', $mes)
            ->whereYear('c.datapagamento', $ano)
            ->get();

           // dd($registros);
       

        //'------------------------------------------------------------------------------------------------------------------
        //' Consulta os Contratos Pagos no mês informado
        //'-----------------------------------------------------------------------------------------------
        $contrato = DB::table('contrato_parcelas AS cp')
            ->join('contratos AS c', 'cp.contratos_id', '=', 'c.id')
            ->where([
                ['c.empresa_id', '=', session('CodEmpresa')],
                ['cp.situacao', '=', 'P']
            ])->whereMonth('cp.datapagamento', $mes)
            ->sum('cp.valorparcela','AS','totalcontrato' );

        return view('contas.index', compact('registros','ano','mes','contrato','tipo','tipolancamentos','idTipolancamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ano = date('Y');
        $mes = date('m');
        $tipolancamentos = TipoLancamento::all();
        return view('contas.create', compact('tipolancamentos','ano','mes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados                  = $request->all();
        $nParcelas              = $request->meses;
        $dataPrimeiraParcela    = $request->datapagamento;

        if($dataPrimeiraParcela != null){
            $dataPrimeiraParcela = explode( "/",$dataPrimeiraParcela);
            $dia = $dataPrimeiraParcela[0];
            $mes = $dataPrimeiraParcela[1];
            $ano = $dataPrimeiraParcela[2];
        } else {
            $dia = date("d");
            $mes = date("m");
            $ano = date("Y");
        }

        $numParcela = 1;

        for($x = 0; $x < $nParcelas; $x++){

            $conta = new Conta();

            $valorparcela = str_replace(',','',$request->valor);
            $dataParcela = date("d/m/Y",strtotime("+".$x." month",mktime(0, 0, 0,$mes, $dia, $ano)));
            $conta->empresa_id =  session('CodEmpresa');
            $conta->tipo_lancamentos_id = $dados['tipolancamentos'];
            $conta->datapagamento = Carbon::createFromFormat('d/m/Y',$dataParcela);
            $conta->valor = $valorparcela;
            $conta->Situacao = $dados['situacao'];
            $conta->descricao = $dados['descricao'];
            $conta->save();

            $numParcela++;
        }

        \Session::flash('mensagem',['msg'=>'Registro realizado com Sucesso','class'=>'success']);

        return redirect()->route("contas.listar");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipolancamentos = TipoLancamento::all();
        $registro = Conta::find($id);

        return view('contas.edit',compact('registro','tipolancamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $registro = Conta::find($id);

        $valorparcela                   = str_replace(',','',$request->valor);
        $registro->empresa_id           = session('CodEmpresa');
        $registro->tipo_lancamentos_id  = $dados['tipolancamentos'];
        $registro->datapagamento        = date('Y/d/m', strtotime($dados['datapagamento']));
        $registro->valor                = $valorparcela;
        $registro->Situacao             = $dados['situacao'];
        $registro->descricao            = $dados['descricao'];
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com Sucesso','class'=>'primary']);

        return redirect()->route("contas.listar");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Conta::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso','class'=>'danger']);

        return redirect()->route("contas.listar");
    }
}
