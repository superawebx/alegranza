<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\ContratoParcela;
use App\Models\Cliente;
use App\Models\Parceiro;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $contrato;

    function __construct(Contrato $contrato)
    {
        $this->contrato = $contrato;
    }

    public function index(Request $request)
    {
        $data = "'" . date('Y-m-d') . "'";

        $mostra =  $request->ContratosVencidos;
        
        if($mostra == null) {
          $variavel = "AND c.dataevento >= " . $data;
        }else{
          $variavel = "";
        }
        
        $registros = DB::select("
                SELECT
                c.id,
                c.dataevento,
                c.dataevento2,
                c.dataevento3,
                c.dataAssinatura,
                c.qtdpessoas,
                c.valortotal,
                c.horainicio,
                c.horatermino,
                c.observacao,
                c.situacaoContrato,
                clientes.nome,
                clientes.foto
            FROM
                contratos c
            JOIN clientes ON clientes.id = c.clientes_id
            WHERE c.situacaoContrato = 'A'
            {$variavel} 
            ORDER BY clientes.nome, c.dataevento ASC;
         ");
        
        return view('contrato.index', compact('registros'));
    }

    public function listaLixeira()
    {
        $registros = DB::select("
                SELECT
                c.id,
                c.dataevento,
                c.dataevento2,
                c.dataevento3,
                c.dataAssinatura,
                c.qtdpessoas,
                c.valortotal,
                c.horainicio,
                c.horatermino,
                c.observacao,
                c.situacaoContrato,
                clientes.nome,
                clientes.foto
            FROM
                contratos c
            JOIN clientes ON clientes.id = c.clientes_id
            WHERE c.situacaoContrato = 'L'
            ORDER BY clientes.nome, c.dataevento ASC;
         ");
        return view('contrato.lixeira', compact('registros'));
    }

    public function calendar(){

        $arrayRegistros = array();
        $registros = Contrato::getContracts();
        
        $now = \Carbon\Carbon::now();

        foreach ($registros as $key => $registro) {

            $arrayRegistros[$key]['id'] = $registro->id;
            $arrayRegistros[$key]['dataevento'] = $registro->dataevento;
            $arrayRegistros[$key]['dataevento2'] = $registro->dataevento2;
            $arrayRegistros[$key]['dataevento3'] = $registro->dataevento3;
            $arrayRegistros[$key]['qtdpessoas'] = $registro->qtdpessoas;
            $arrayRegistros[$key]['valortotal'] = $registro->valortotal;
            $arrayRegistros[$key]['horainicio'] = $registro->horainicio;
            $arrayRegistros[$key]['horatermino'] = $registro->horatermino;
            $arrayRegistros[$key]['nome'] = $registro->nome;
            $arrayRegistros[$key]['foto'] = $registro->foto;
            $arrayRegistros[$key]['start'] = $registro->dataevento;
            $arrayRegistros[$key]['photo'] = $registro->foto;
            
            if($registro->dataevento3 != null){
                $arrayRegistros[$key]['end'] = \Carbon\Carbon::createFromFormat('Y-m-d', $registro->dataevento3)->addDay(1)->format('Y-m-d');
                $date3 = \Carbon\Carbon::parse($registro->dataevento3);
                $eventBiggerNow = $date3->gt($now);
                
                if($eventBiggerNow == false){
                    $arrayRegistros[$key]['color'] = '#e53935';
                }else{
                    $arrayRegistros[$key]['color'] = '#03a9f4';
                }

            }else if ($registro->dataevento3 == null && $registro->dataevento2 != null){
                $arrayRegistros[$key]['end'] = \Carbon\Carbon::createFromFormat('Y-m-d', $registro->dataevento2)->addDay(1)->format('Y-m-d');
                $date2 = \Carbon\Carbon::parse($registro->dataevento2);
                $eventBiggerNow = $date2->gt($now);
                
                if($eventBiggerNow == false){
                    $arrayRegistros[$key]['color'] = '#e53935';
                }else{
                    $arrayRegistros[$key]['color'] = '#03a9f4';
                }

            }else if ($registro->dataevento3 == null && $registro->dataevento2 == null){
                $arrayRegistros[$key]['end'] = \Carbon\Carbon::createFromFormat('Y-m-d', $registro->dataevento)->addDay(1)->format('Y-m-d');
                $date = \Carbon\Carbon::parse($registro->dataevento);
                $eventBiggerNow = $date->gt($now);
                
                if($eventBiggerNow == false){
                    $arrayRegistros[$key]['color'] = '#e53935';
                }else{
                    $arrayRegistros[$key]['color'] = '#03a9f4';
                }

            }
        }
        return view('contrato.calendar', compact('arrayRegistros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $parceiros = Parceiro::all();
        return view('contrato.create', compact('clientes','parceiros'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->contrato->rules);
        
        $dataevento  = Carbon::createFromFormat('d/m/Y', $request->dataevento)->format('Y-m-d');
        
        //Verifica se exite contrato de locação para data do evento!
        $contrato = DB::table('contratos AS c')
            ->select('c.*')
            ->where([
                ['c.dataevento', '=',  $dataevento],
                ['c.situacaoContrato', '=', 'A'],
                ['c.empresa_id', '=', session('CodEmpresa')],
            ])
            ->first();
            
        if (!empty($contrato)){
            
            \Session::flash('mensagem',['msg'=>'Ateção: Já Exite Contrato para Data do Evento Informada, Verifique!','class'=>'danger']);
            
            return redirect()->route("contratos.adicionar");
        }

        //Verifica se total de parcelas e igual ao valor total do contrato
        $valorparcela = $_POST['valorparcela'];
        $totalparcela = 0;
        foreach($valorparcela as $i => $valor){
            $valor = str_replace(',','',$valorparcela[$i]);
            if (!empty($valor)){
                $totalparcela+= $valor;
            }
        }

        if ($totalparcela <> str_replace(',','',$request->valortotal)){
            
            var_dump(str_replace(',','',$request->valortotal));
           
            \Session::flash('mensagem',['msg'=>'Ateção: O Valor das Parcelas esta diferente do Valor Total do Contrato, Verifique!','class'=>'danger']);
            return redirect()->action('ContratoController@create');
        }

        if (!empty($request->dataevento2)){
                $dataevento2 = Carbon::createFromFormat('d/m/Y', $request->dataevento2)->format('Y-m-d');
        } else{
            $dataevento2 = NULL;
        }
     
        if (!empty($request->dataevento3)){
            $dataevento3  = Carbon::createFromFormat('d/m/Y', $request->dataevento3)->format('Y-m-d');
        } else{            $dataevento3 = NULL;
        }

        $contratoID = Contrato::create([
            'empresa_id'        =>  session('CodEmpresa'),
            'clientes_id'       =>  $request->clientes,
            'parceiros_id'      =>  $request->parceiros,
            'qtdhoraevento'     =>  $request->qtdhoraevento,
            'noivos'            =>  $request->noivos,
            'dataAssinatura'    =>  Carbon::createFromFormat('d/m/Y', $request->dataassinatura)->format('Y-m-d'),
            'valortotal'        =>  str_replace(',','',$request->valortotal),
            'qtdeParcela'       =>  $request->qtdeParcela,
            'dataevento'        => Carbon::createFromFormat('d/m/Y', $request->dataevento)->format('Y-m-d'),
            'horainicio'        => $request->horainicio,
            'qtdpessoas'        => $request->qtdpessoas,
            'situacaoContrato'  => 'A',
            'dataevento2'  => $dataevento2,
            'dataevento3'  => $dataevento3,
            'horatermino'  => $request->horatermino,
            'observacao'   => $request->observacao,
            ])->id;

        $nParcelas  = $request->qtdeParcela;
        $numParcela = 1;

        //Pega o Array Data Vencimento e Valor Parcela
        $datavencimento = $_POST['datavencimento'];
        $valorparcela   = $_POST['valorparcela'];
        
        foreach($datavencimento as $i => $dataParcela){
           
            $parcela = new ContratoParcela();
       
            $valor = str_replace(',','',$valorparcela[$i]);

            if (!empty($dataParcela)){
                $parcela->contratos_id      = $contratoID;
                $parcela->numParcela        = $numParcela;
                $parcela->qtdeParcela       = $request->qtdeParcela;
                $parcela->datavencimento    = Carbon::createFromFormat('d/m/Y', $dataParcela)->format('Y-m-d');
                $parcela->valorparcela      = $valor;
                $parcela->datapagamento     = null;
                $parcela->valorpagamento    = null;
                $parcela->situacao          = 'A';
                $parcela->save();
                $numParcela++;
            }

        }

        \Session::flash('mensagem',['msg'=>'Registro realizado com Sucesso','class'=>'success']);
        
        return redirect()->action('ContratoController@index');

    }

    /**s
     * Display the specified resource.
     *
     * @param  \AdmEventos\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \AdmEventos\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function pdf($id)
    {

            $dia = date("d");
            $meses = array(
                '01'=>'Janeiro',
                '02'=>'Fevereiro',
                '03'=>'Março',
                '04'=>'Abril',
                '05'=>'Maio',
                '06'=>'Junho',
                '07'=>'Julho',
                '08'=>'Agosto',
                '09'=>'Setembro',
                '10'=>'Outubro',
                '11'=>'Novembro',
                '12'=>'Dezembro'
            );
            $mes = $meses[date('m')];
            $ano = date("Y");
          
            $empresa_id = session('CodEmpresa');

            $registro = DB::select("
                SELECT c.*, cl.*
                    FROM
                        contratos AS c
                        INNER JOIN clientes AS cl  on c.clientes_id = cl.id 
                    WHERE c.empresa_id = 1
                    AND c.situacaoContrato  = 'A'
                    AND c.id = {$id}
                    
                ");
          
            $parcelas = DB::table('contrato_parcelas AS cp')
            ->select('cp.*')
            ->where([
                ['cp.contratos_id', '=', $id],
            ])
            ->get();

            //dd($parcelas);
            // dd($registro);
            //Valor por extenso
            $valorExtenso = $this->valor_por_extenso($registro[0]->valortotal);
            
            return view('contrato.pdf', compact('registro','valorExtenso','parcelas','dia','mes','ano'));

            //return \PDF::loadView('contrato.pdf', compact('registro','valorExtenso','parcelas','dia','mes','ano'))
            //Se quiser que fique no formato a4 retrato:
            // ->setPaper('a4', 'landscape')
            //->download($id.'.pdf');
            //->stream($id.'.pdf');
    
    }

    function valor_por_extenso($v){
		
        $v = filter_var($v, FILTER_SANITIZE_NUMBER_INT);
       
            $sin = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plu = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
     
            $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
            $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
            $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
            $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
     
            $z = 0;
     
            $v = number_format( $v, 2, ".", "." );
            $int = explode( ".", $v );
     
            for ( $i = 0; $i < count( $int ); $i++ ) 
            {
                for ( $ii = mb_strlen( $int[$i] ); $ii < 3; $ii++ ) 
                {
                    $int[$i] = "0" . $int[$i];
                }
            }
     
            $rt = null;
            $fim = count( $int ) - ($int[count( $int ) - 1] > 0 ? 1 : 2);
            for ( $i = 0; $i < count( $int ); $i++ )
            {
                $v = $int[$i];
                $rc = (($v > 100) && ($v < 200)) ? "cento" : $c[$v[0]];
                $rd = ($v[1] < 2) ? "" : $d[$v[1]];
                $ru = ($v > 0) ? (($v[1] == 1) ? $d10[$v[2]] : $u[$v[2]]) : "";
     
                $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
                $t = count( $int ) - 1 - $i;
                $r .= $r ? " " . ($v > 1 ? $plu[$t] : $sin[$t]) : "";
                if ( $v == "000")
                    $z++;
                elseif ( $z > 0 )
                    $z--;
                    
                if ( ($t == 1) && ($z > 0) && ($int[0] > 0) )
                    $r .= ( ($z > 1) ? " de " : "") . $plu[$t];
                    
                if ( $r )
                    $rt = $rt . ((($i > 0) && ($i <= $fim) && ($int[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
            }
     
            $rt = mb_substr( $rt, 1 );
     
            return($rt ? trim( $rt ) : "zero");
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \AdmEventos\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AdmEventos\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContratoParcela::where('contratos_id','=',$id)->delete(); // Deleta as parcelas
        Contrato::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso','class'=>'danger']);

        return redirect()->route("contratos.listar");

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AdmEventos\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function lixeira($id)
    {
        $contrato = Contrato::find($id);
        $contrato->update([
            'situacaoContrato'  => 'L',
        ]);
        
        Session::flash('mensagem',['msg'=>'Contrato movido para Lixeira com Sucesso','class'=>'success']);

        return redirect()->route("contratos.listar");
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AdmEventos\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function reativar($id)
    {
        $contrato = Contrato::find($id);
        $contrato->update([
            'situacaoContrato'  => 'A',
        ]);
        
        Session::flash('mensagem',['msg'=>'Contrato Reativado com Sucesso','class'=>'success']);

        return redirect()->route("contratos.listar");
        

    }
}
