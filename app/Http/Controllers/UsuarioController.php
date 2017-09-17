<?php
namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Http\Request;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = Usuario::orderby('created_at', 'desc')->paginate(10);
        return view('usuario.index')->with('usuarios',$usuarios);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->cpf = $request->cpf;
        $usuario->ativo = $request->ativo;
        $usuario->tipoAcesso = $request->tipoAcesso;
        $usuario->nome = $request->nome;
        $usuario->fone = $request->fone;
        $usuario->celular = $request->celular;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->created_at = $request->created_at;
        $usuario->update_at = $request->update_at;
        $usuario->remember_token = $request->remember_token;
        $usuario-> save();
        return redirect()->route('usuarios.index')->with('message', 'Usuario Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $id)
    {
        $usuarios = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $id)
    {
        $usuario = Usuario::findORFail($id);
        $usuario->cpf = $request->cpf;
        $usuario->ativo = $request->ativo;
        $usuario->tipoAcesso = $request->tipoAcesso;
        $usuario->nome = $request->nome;
        $usuario->fone =$request->fone;
        $usuario->celular =$request->celular;
        $usuario->email =$request->email;
        $usuario->password =$request->password;
        $usuario->created_at =$request->created_at;
        $usuario->update_at =$request->update_at;
        $usuario->remember_token = $request->remember_token;
        $usuario-> save();
        return redirect()->route('usuarios.index')->with('message', 'Usuario Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->ativo = 0;
        $usuario-> save();
        return redirect()->route('usuario.index')->with('alert-success','Usuario Removido com Sucesso!');
    }
}