<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Empresa::all();
        return view('empresa.index', compact('registros'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $dados      = $request->all();
//        $registro   = new Empresa();
//
//        $registro->cnpj = $dados['cnpj'];
//        $registro->razaosocial = $dados['razaosocial'];
//        $registro->nomefantasia = $dados['nomefantasia'];
//        $registro->endereco = $dados['endereco'];
//        $registro->cidade = $dados['cidade'];
//        $registro->bairro = $dados['bairro'];
//        $registro->cep = $dados['cep'];
//        $registro->save();

        Empresa::create($request->all());

        \Session::flash('mensagem',['msg'=>'Registro realizado com Sucesso','class'=>'success']);

        return redirect()->route("index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Empresa::find($id);
        return view('empresa.edit',compact('registro'));

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
        $registro = Empresa::find($id);

        $registro->cnpj = $dados['cnpj'];
        $registro->razaosocial = $dados['razaosocial'];
        $registro->nomefantasia = $dados['nomefantasia'];
        $registro->endereco = $dados['endereco'];
        $registro->cidade = $dados['cidade'];
        $registro->bairro = $dados['bairro'];
        $registro->cep = $dados['cep'];
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com Sucesso','class'=>'primary']);

        return redirect()->route("index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Empresa::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso','class'=>'danger']);

        return redirect()->action('EmpresaController@index');

    }
}
