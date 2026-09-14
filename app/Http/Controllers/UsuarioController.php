<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();

        return view('usuario.create', compact('empresas'));
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
        $registro   = new User();

        $registro->company_id = $dados['empresas'];
        $registro->name = $dados['name'];
        $registro->email = $dados['email'];
        $registro->password =  bcrypt($dados['password']);

        $file = $request->file('photograph');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/usuarios/". str_slug($dados['empresas'],'_');
            $ext = $file->guessClientExtension();
            $nomeArquivo = "foto_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->photograph = $diretorio.'/'.$nomeArquivo;
        }
        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registro realizado com Sucesso','class'=>'success']);

        return redirect()->route("HomeController.index");
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
        $empresas = Empresa::all();
        $registro =  User::find($id);
        return view('usuario.edit',compact('registro','empresas'));
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
        $registro = User::find($id);

        $registro->company_id = $dados['empresas'];
        $registro->name = $dados['name'];
        $registro->email = $dados['email'];
        $registro->password =  bcrypt($dados['password']);

        $file = $request->file('photograph');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/usuarios/". str_slug($dados['empresas'],'_');
            $ext = $file->guessClientExtension();
            $nomeArquivo = "foto_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->photograph = $diretorio.'/'.$nomeArquivo;
        }
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
       // \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso','class'=>'danger']);

    }
}
