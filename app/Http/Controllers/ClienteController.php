<?php

namespace App\Http\Controllers;
use App\Models\Cidade;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $Grid = new Grid(Cliente::query(), 'ClientesGrid');

        $Grid->fields([
            'idCliente'=>'#',
            'nome'=>'Descrição',
            'cnpj'=>'CNPJ',
            'ie'=>'IE',
            'endereco'=>'Endereço',
            'cep'=>'CEP',
            'fone'=>'Telefone',
            'email'=>'E-mail',
            'created_at'=>'Data Cadastro'
        ])

            ->processLine(function($row){
                $row['cnpj'] = substr($row['cnpj'], 0, 2) . '.' . substr($row['cnpj'], 2, 3) . '.' . substr($row['cnpj'], 5, 3) . '/' . substr($row['cnpj'], 8, 4) . '-' . substr($row['cnpj'], 12, 2);
                $row['fone'] = '(' . substr($row['fone'], 0, 2) . ')' . substr($row['fone'], 2, 4) . '-' . substr($row['fone'], 6);
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                return $row;
            })

            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idCliente'=>['type'=>'integer','label'=>'Código'],
                'nome'=>['type'=>'text', 'label'=>'Descrição'],
                'cnpj'=>['type'=>'text', 'label'=>'CNPJ'],
                'ie'=>['type'=>'text', 'label'=>'IE'],
                'endereco'=>['type'=>'text', 'label'=>'Endereço'],
                'cep'=>['type'=>'text', 'label'=>'CEP'],
                'fone'=>['type'=>'text', 'label'=>'Telefone'],
                'email'=>['type'=>'text', 'label'=>'E-mail'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'clientes/{idCliente}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
            ->action('Deletar', 'clientes/{idCliente}', [
                'confirm'=>'Deseja mesmo deletar esse registro?',
                'method'=>'DELETE',
            ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'clientes/bulk-delete');

        return view('clientes.index', ['grid'=>$Grid]);

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
        $clientes = Cliente::all();
        $cidades = Cidade::all();
        return view('clientes.register')->with('cidade', $cidades);
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
        $cliente->cidade_idCidade = Cidade::select('idCidade')->where(['nome' => $request->cidade_idCidade,'estado_uf' => $request->estado_uf])->first()->idCidade;
        
       

       $this->validate($request,[
            'nome'=> 'string|min:3|max:255',
            'endereco'=> 'required|min:3|max:255',
            'bairro'=> 'required|min:3|max:255',
            'cidade'=> 'required|min:3|max:255',
            'telefone'=>'min:10|max:12',
            'celular'=>'required|min:11|max:13'
        ],[
            'nome.string'=>'Esse campo so aceita letras',
            'nome.min'=>'Minimo de 3 caracteres',
            'nome.max'=>'maximo de 255 caracteres',
            'endereco.min'=>'Minimo de 3 caracteres',
            'endereco.max'=>'maximo de 255 caracteres',
            'bairro.min'=>'Minimo de 3 caracteres',
            'bairro.max'=>'maximo de 255 caracteres',
            'cidade.min'=>'Minimo de 3 caracteres',
            'cidade.max'=>'maximo de 255 caracteres',
            'telefone.min'=>'Minimo de 10 caracteres',
            'telefone.max'=>'maximo de 12 caracteres',
            'celular.min'=>'Minimo de 11 caracteres',
            'celular.max'=>'maximo de 13 caracteres'
        ]);

        $cliente-> save();

        if($request->submit == "0"){
            session()->flash('mensagem', 'Item Criado Com Sucesso');
            return view('clientes.index');
        }

        return redirect()->route('clientes.index')->with('message', 'Cliente Criado Com Sucesso');

        //dd($request->all());
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
        $cliente = Cliente::where('idCliente', '=', $id)->first();
        $cidade = Cidade::all();
        if(count($cliente) == 0)
        {
            Session::flash('produto_nencontrado', 'Cliente não encontrado.');
            return redirect('/clientes');
        }



        return view('clientes.edit')->with('cliente', $cliente)->with('cidade', $cidade);

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
        $cliente->cidade_idCidade = Cidade::select('idCidade')->where(['nome' => $request->cidade_idCidade,'estado_uf' => $request->estado_uf])->first()->idCidade;

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