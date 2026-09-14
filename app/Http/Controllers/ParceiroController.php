<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parceiro;

class ParceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $parceiro;

    function __construct(Parceiro $parceiro)
    {
        $this->parceiro = $parceiro;
    }

    public function index()
    {
        $registros = Parceiro::all();
        return view('parceiros.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parceiros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->parceiro->rules);

        $dados      = $request->all();
        $registro   = new Parceiro();

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
        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registro realizado com Sucesso','class'=>'success']);

        return redirect()->route("parceiros.index");
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
        $registro = Parceiro::find($id);
        return view('parceiros.edit',compact('registro'));
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
        $this->validate($request, $this->parceiro->rules);

        $dados = $request->all();
        $registro = Parceiro::find($id);

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
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com Sucesso','class'=>'primary']);

         return redirect()->route("parceiros.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parceiro::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso','class'=>'danger']);

        return redirect()->route("parceiros.index");
    }
}
