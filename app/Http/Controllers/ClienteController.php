<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Barryvdh\DomPDF\PDF;

class ClienteController extends Controller
{
    private $cliente;

    function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Cliente::all();
        return view('clientes.index', compact('registros'));
    }

    public function report(){

        $registros = Cliente::all();

        return view('clientes.report', compact('registros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->cliente->rules);

        $dados      = $request->all();
        $registro   = new Cliente();

        $registro->empresa_id =  session('CodEmpresa');
        $registro->nome = $dados['nome'];
        $registro->cpf = $dados['cpf'];
        $registro->endereco = $dados['endereco'];
        $registro->cidade = $dados['cidade'];
        $registro->bairro = $dados['bairro'];
        $registro->cep = $dados['cep'];
        $registro->telefone = $dados['telefone'];
        $registro->celular = $dados['celular'];
        $registro->email = $dados['email'];

        $file = $request->file('foto');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/clientes/".$rand;
            $ext = $file->guessClientExtension();
            $nomeArquivo = "foto_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->foto = $diretorio.'/'.$nomeArquivo;
        }

        $registro->save();

        //Cliente::create($request->all());

        \Session::flash('mensagem',['msg'=>'Registro realizado com Sucesso','class'=>'success']);

        return redirect()->route("clientes.index");
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
        $registro = Cliente::find($id);
        return view('clientes.edit',compact('registro'));
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
        $this->validate($request, $this->cliente->rules);

        $dados = $request->all();
        $registro = Cliente::find($id);

        $registro->empresa_id = session('CodEmpresa');
        $registro->nome = $dados['nome'];
        $registro->cpf = $dados['cpf'];
        $registro->endereco = $dados['endereco'];
        $registro->cidade = $dados['cidade'];
        $registro->bairro = $dados['bairro'];
        $registro->cep = $dados['cep'];
        $registro->telefone = $dados['telefone'];
        $registro->celular = $dados['celular'];
        $registro->email = $dados['email'];

        $file = $request->file('foto');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/clientes/".$rand;
            $ext = $file->guessClientExtension();
            $nomeArquivo = "foto_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->foto = $diretorio.'/'.$nomeArquivo;
        }

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com Sucesso','class'=>'primary']);
        return redirect()->route("clientes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Verifica se exite contrato de locação para Cliente
        $contrato = DB::table('contratos AS c')
            ->select('c.*')
            ->where([
                ['c.clientes_id', '=',  $id],
                ['c.situacaoContrato', '=', 'A'],
                ['c.empresa_id', '=', session('CodEmpresa')],
            ])
            ->first();
    
        if (!empty($contrato)){
            
            \Session::flash('mensagem',['msg'=>'Ateção: Cliente não pode ser EXCLUIDO, Já Exite Contrato de Locação, Verifique!','class'=>'danger']);
            return redirect()->route("index");
        }

        Cliente::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso','class'=>'danger']);

        return redirect()->route("clientes.index");
    }
}
