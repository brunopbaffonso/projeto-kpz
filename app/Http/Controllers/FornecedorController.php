<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::orderby('created_at', 'desc')->paginate(10);
        return view('fornecedores.index', ['fornecedores'=>$fornecedores]);
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
        $fornecedor = new Fornecedor;
        $fornecedor->ativo = $request->ativo;
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->ie = $request->ie;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->bairro = $request->bairro;
        $fornecedor->cep = $request->cep;
        $fornecedor->fone = $request->fone;
        $fornecedor->celular = $request->celular;
        $fornecedor->email = $request->email;
        $fornecedor->created_at = $request->created_at;
        $fornecedor->update_at = $request->update_at;
        $fornecedor-> save();
        return redirect()->route('usuarios.index')->with('message', 'Fornecedor Criado Com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $fornecedor = Fornecedor::findORFail($id);
        $fornecedor->ativo = $request->ativo;
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->ie = $request->ie;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->bairro = $request->bairro;
        $fornecedor->cep = $request->cep;
        $fornecedor->fone = $request->fone;
        $fornecedor->celular = $request->celular;
        $fornecedor->email = $request->email;
        $fornecedor->created_at = $request->created_at;
        $fornecedor->update_at = $request->update_at;
        $fornecedor-> save();
        return redirect()->route('fornecedores.index')->with('message', 'Fornecedor Editado Com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->ativo = 0;
        $fornecedor-> save();
        return redirect()->route('fornecedor.index')->with('alert-success','Fornecedor Removido com Sucesso!');
    }
}
