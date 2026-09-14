<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\ContratoParcela;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Parceiro;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($personId = null)
    {
          
        $dataUser = Auth::user();

        if($dataUser->master == true && $personId == null){
            $empresas = Empresa::all();
            return view('empresa.listall', compact('empresas'));
        }else if ($dataUser->master == true && $personId != null){
            
         
            //Consultas total de parcelas pagas
            $totalmeses         = $this->ConsultaParcelas($personId);

            //Consultas total de parcelas Vencidas
            $totalmesesVencidos = $this->ConsultaParcelasVencidas($personId);
                       
            //Total de Clientes
            $totalClientes  =  $this->TotalClientes($personId);

            //Total de Contratos
            $totalContratos  =  $this->TotalContratos($personId);

            //Total de Parceiros
            $totalParceiros  =  $this->TotalParceiros($personId);
           
            $registro = Empresa::find($personId);
            session(['CodEmpresa' => $personId]);
            return view('painel', compact('registro','totalmeses','totalmesesVencidos', 'totalClientes','totalContratos','totalParceiros'));

        }else{
            
            $companyId = $dataUser->company_id;
                        
            if($companyId != null){

                $registro = Empresa::find($companyId);
                session(['CodEmpresa' => $companyId]);

                //Consultas total de parcelas
                $financeiro = $this->ConsultaParcelas($companyId);
                $totalClientes =  $this->TotalClientes($companyId);

                //Consultas total de parcelas pagas
                $totalmeses     = $this->ConsultaParcelas($companyId);
                
                //Consultas total de parcelas vencidadas
                $totalmesesVencidos = $this->ConsultaParcelasVencidas($companyId);

                //Total de Clientes
                $totalClientes  =  $this->TotalClientes($companyId);

                //Total de Contratos
                $totalContratos  =  $this->TotalContratos($companyId);

                //Total de Parceiros
                $totalParceiros  =  $this->TotalParceiros($companyId);

                return view('painel', compact('registro','totalmeses','totalmesesVencidos','totalClientes','totalContratos','totalParceiros'));
            }else{
                return view('customerros.usernotlinked-company');
            }
        }
    }

    //Consultas total de parcelas
    public function ConsultaParcelas($companyId){

        $ano = date('Y');
        $situacao = "A";
        $meses = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $financeiro = [];
        foreach ($meses as $mes) {
            
            $sql = DB::select("
                SELECT
                    CASE WHEN sum(cp.valorparcela) IS NULL THEN '0.00'
                        ELSE sum(cp.valorparcela)
                    END AS totalparcela,
                    month(cp.datavencimento) AS mes,
                    year(cp.datavencimento) AS ano
                FROM
                    contratos AS c
                    JOIN contrato_parcelas AS cp ON cp.contratos_id = c.id
                WHERE
                    c.empresa_id = {$companyId}
                AND
                    month(cp.datavencimento) = {$mes}
                AND
                    year(cp.datavencimento) = {$ano}
                GROUP BY month(cp.datavencimento), year(cp.datavencimento)
            ");

            if(!empty($sql)){
                $financeiro[$mes]['totalparcela'] = floatVal($sql[0]->totalparcela);
                $financeiro[$mes]['mes'] = $sql[0]->mes;
                $financeiro[$mes]['ano'] = $sql[0]->ano;
            }else{
                $financeiro[$mes]['totalparcela'] = floatVal(0.00);
                $financeiro[$mes]['mes'] = $mes;
                $financeiro[$mes]['ano'] = intVal($ano);
            }
        }

        return $financeiro;

    }

    //Consultas total de parcelas vencidas
    public function ConsultaParcelasVencidas($companyId){

        $dia    = date('d');
        $data   = "'" . date('Y').'-'.date('m').'-'.date('d') ."'";
        $ano    = date('Y');

        $situacao = "A";
        $meses = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $financeiro = [];

        foreach ($meses as $mes) {
            
            $sql = DB::select("
                SELECT
                    CASE WHEN sum(cp.valorparcela) IS NULL THEN '0.00'
                        ELSE sum(cp.valorparcela)
                    END AS totalparcela,
                    month(cp.datavencimento) AS mes,
                    year(cp.datavencimento) AS ano
                FROM contratos AS c JOIN contrato_parcelas AS cp ON cp.contratos_id = c.id
                WHERE c.empresa_id = {$companyId}
                AND cp.situacao = 'A'
                AND isNull(cp.datapagamento) 
                AND cp.datavencimento < {$data}
                AND month(cp.datavencimento) = {$mes}
                AND year(cp.datavencimento) = {$ano}
                GROUP BY month(cp.datavencimento), year(cp.datavencimento)
            ");

            if(!empty($sql)){
                $financeiro[$mes]['totalparcela'] = floatVal($sql[0]->totalparcela);
                $financeiro[$mes]['mes'] = $sql[0]->mes;
                $financeiro[$mes]['ano'] = $sql[0]->ano;
            }else{
                $financeiro[$mes]['totalparcela'] = floatVal(0.00);
                $financeiro[$mes]['mes'] = $mes;
                $financeiro[$mes]['ano'] = intVal($ano);
            }
        }

        return $financeiro;

    }


    //Consultas total de clientes
    public function TotalClientes($companyId){

        $totalClientes = Cliente::where('empresa_id','=', $companyId)->count();

        //$totalClientes = DB::table('clientes AS c')
        //->select('c.id')
       // ->where([
       //     ['c.empresa_id', '=',  $companyId],
       //  ])
       // ->count();

        return $totalClientes;

    }

    //Consultas total de contratos
    public function TotalContratos($companyId){

        $totalContratos = Contrato::where('empresa_id','=', $companyId)->count();
    
        //$totalContratos = DB::table('contratos AS c')
        //->select('c.id')
        //->where([
        //    ['c.empresa_id', '=',  $companyId],
        // ])
        //->count();
        return $totalContratos;

    }

    //Consultas total de parceiros
    public function TotalParceiros($companyId){

        $totalParceiros = Parceiro::where('empresa_id','=', $companyId)->count();
    
        //$totalParceiros = DB::table('parceiros AS p')
        //->select('p.id')
        //->where([
        //    ['p.empresa_id', '=',  $companyId],
        // ])
        //->count();
        return $totalParceiros;

    }

}
