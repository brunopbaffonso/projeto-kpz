<?php

namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
        $retorno = Cliente::where('nome', 'like', '%'.$palavraChave.'%')
            ->orWhere('cnpj', 'like', '%'.$palavraChave.'%')
            ->orWhere('cpf', 'like', '%'.$palavraChave.'%')
            ->orderBy('nome', 'asc')->paginate(10);

        $Grid = new Grid(Cliente::query(), 'ClientesGrid');

        $Grid->fields([
            'idCliente'=>'Código',
            'nome'=>'Descrição',
            'cnpj'=>'CNPJ',
            'cpf'=>'CPF',
            'ie'=>'IE',
            'endereco'=>'Endereço',
            'cep'=>'CEP',
            'fone'=>'Telefone',
            'email'=>'E-mail',
            'created_at'=>'Data Cadastro'
        ])

        ->processLine(function($row){
            $row['cpf'] = strlen($row['cpf']) == 11 ? ($row['cpf']) : ( "0".$row['cpf']);
            $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
            return $row;
        })

        ->actionFields([
            'emp_no' //The fields used for process actions. those not are showed 
        ])
        ->advancedSearch([
            'idCliente'=>['type'=>'integer','label'=>'Código'],
            'nome'=>['type'=>'text', 'label'=>'Descrição'],
            'cnpj'=>['type'=>'integer', 'label'=>'CNPJ'],
            'cpf'=>['type'=>'integer', 'label'=>'CPF'],
            'ie'=>['type'=>'text', 'label'=>'IE'],
            'endereco'=>['type'=>'text', 'label'=>'Endereço'],
            'cep'=>['type'=>'text', 'label'=>'CEP'],
            'fone'=>['type'=>'text', 'label'=>'Telefone'],
            'email'=>['type'=>'text', 'label'=>'E-mail'],
            'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
        ]);

        $Grid->action('Editar', 'edit/{emp_no}', ['method' => 'edit'])
        ->action('Deletar', '{emp_no}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', '/projeto-kpz-test/public/modelos/bulk-delete');

        return view('clientes.index', ['grid'=>$Grid])->with('insumo', $retorno);

//        $clientes = Cliente::orderby('created_at', 'desc')->paginate(10);
//        return view('clientes.index', ['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
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
//        $cliente->created_at = $request->created_at;
//        $cliente->updated_at = $request->updated_at;
        $cliente->cidade_idCidade = $request->cidade_idCidade;
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
    public function edit($id)
    {
        //dd($id)
        $retorno = Cliente::where('idCliente', '=', $id)->first();
        if(count($retorno) == 0)
        {
            Session::flash('produto_nencontrado', 'Cliente não encontrado.');
            return redirect('/clientes');
        }


        return view('clientes.edit')->with('cliente', $retorno);

       /* $cliente = Cliente::where('idCliente', '=', $id)->first();
        return view('clientes.edit', compact('cliente'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::where('idCliente', '=', $id)->first();
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
//        $cliente->created_at = $request->created_at;
//        $cliente->updated_at = $request->updated_at;
        $cliente->cidade_idCidade = $request->cidade_idCidade;
        $cliente-> save();
        return redirect()->route('clientes.index')->with('message', 'Cliente Editado Com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $cliente = Cliente::where('idCliente', '=', $id)->first();
        $cliente -> delete();
        Session::flash('sucesso_produto', "Produto excluído com sucesso.");
        return redirect()->route('$clientes.index')->with('alert-success','Cliente Removido com Sucesso!');
        */

        $cliente = Cliente::where('idCliente', '=', $id)->first();
        $cliente->ativo = 0;
        $cliente-> save();
        return redirect()->route('clientes.index')->with('alert-success','Cliente Removido com Sucesso!');
    }
}
