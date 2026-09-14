<?php

namespace App\Http\Controllers;

use App\Models\TipoLancamento;
use Illuminate\Http\Request;

class TipoLancamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = TipoLancamento::all();
        return view('tipolancamento.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipolancamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados      = $request->all();
        $registro   = new TipoLancamento();

        $registro->empresa_id =  session('CodEmpresa');
        $registro->descricao = $dados['descricao'];
        $registro->tipo = $dados['tipo'];
        $registro->situacao = $dados['situacao'];
        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registro realizado com Sucesso','class'=>'success']);

        return redirect()->route("tipolancamento.index");

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
        $registro = TipoLancamento::find($id);
        return view('tipolancamento.edit',compact('registro'));

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
        $registro = TipoLancamento::find($id);

        $registro->empresa_id = session('CodEmpresa');
        $registro->descricao = $dados['descricao'];
        $registro->tipo = $dados['tipo'];
        $registro->situacao = $dados['situacao'];
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com Sucesso','class'=>'primary']);

        return redirect()->route("tipolancamento.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoLancamento::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso','class'=>'danger']);

        return redirect()->route("tipolancamento.index");

    }
}
