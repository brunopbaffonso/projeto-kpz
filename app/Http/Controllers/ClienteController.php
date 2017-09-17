<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderby('created_at', 'desc')->paginate(10);
        return view('clientes.index', ['clientes'=>$clientes]);
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
        $cliente = new Cliente;
        $cliente->ativo = $request->ativo;
        $cliente->nome = $request->nome;
        $cliente->cnpj = $request->cnpj;
        $cliente->cpf = $request->cpf;
        $cliente->ie = $request->ie;
        $cliente->endereco = $request->endereco;
        $cliente->bairro = $request->bairro;
        $cliente->cep = $request->cep;
        $cliente->fone = $request->fone;
        $cliente->celular = $request->celular;
        $cliente->email = $request->email;
        $cliente->created_at = $request->created_at;
        $cliente->update_at = $request->update_at;
        $cliente-> save();
        return redirect()->route('clientes.index')->with('message', 'Cliente Criado Com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente = Cliente::findORFail($id);
        $cliente->ativo = $request->ativo;
        $cliente->nome = $request->nome;
        $cliente->cnpj = $request->cnpj;
        $cliente->cpf = $request->cpf;
        $cliente->ie = $request->ie;
        $cliente->endereco = $request->endereco;
        $cliente->bairro = $request->bairro;
        $cliente->cep = $request->cep;
        $cliente->fone = $request->fone;
        $cliente->celular = $request->celular;
        $cliente->email = $request->email;
        $cliente->created_at = $request->created_at;
        $cliente->update_at = $request->update_at;
        $cliente-> save();
        return redirect()->route('clientes.index')->with('message', 'Cliente Editado Com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->ativo = 0;
        $cliente-> save();
        return redirect()->route('$cliente.index')->with('alert-success','Cliente Removido com Sucesso!');
    }
}
