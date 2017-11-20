<?php

namespace App\Http\Controllers;
use App\Fornecedor;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
        $retorno = Fornecedor::where('nome', 'like', '%'.$palavraChave.'%')
            ->orWhere('cnpj', 'like', '%'.$palavraChave.'%')
            ->orderBy('nome', 'asc')->paginate(10);
        $Grid = new Grid(Fornecedor::query(), 'ClientesGrid');

        $Grid->fields([
            'idFornecedor'=>'Código',
            'nome'=>'Descrição',
            'cnpj'=>'CNPJ',
            'ie'=>'IE',
            'endereco'=>'Endereço',
            'cep'=>'CEP',
            'fone'=>'Telefone',
            'celular'=>'Celular',
            'email'=>'E-mail',
            'created_at'=>'Data Cadastro'
        ])

            ->processLine(function($row){
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                return $row;
            })


            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idFornecedor'=>['type'=>'integer','label'=>'Código'],
                'nome'=>['type'=>'text', 'label'=>'Descrição'],
                'cnpj'=>['type'=>'integer', 'label'=>'CNPJ'],
                'ie'=>['type'=>'text', 'label'=>'IE'],
                'endereco'=>['type'=>'text', 'label'=>'Endereço'],
                'cep'=>['type'=>'text', 'label'=>'CEP'],
                'fone'=>['type'=>'text', 'label'=>'Telefone'],
                'email'=>['type'=>'text', 'label'=>'E-mail'],
                'celular'=>['type'=>'text', 'label'=>'Celular'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'edit/{emp_no}', ['method' => 'edit'])
            ->action('Deletar', '{emp_no}', [
                'confirm'=>'Deseja mesmo deletar esse registro?',
                'method'=>'DELETE',
            ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', '/projeto-kpz-test/public/modelos/bulk-delete');

        return view('fornecedores.index', ['grid'=>$Grid])->with('insumo', $retorno);

        //$fornecedores = Fornecedor::orderby('created_at', 'desc')->paginate(10);
        //return view('fornecedores.index', ['fornecedores'=>$fornecedores]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedores.register');
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
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->ie = $request->ie;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->bairro = $request->bairro;
        $fornecedor->cep = $request->cep;
        $fornecedor->fone = $request->fone;
        $fornecedor->celular = $request->celular;
        $fornecedor->email = $request->email;
//        $fornecedor->created_at = $request->created_at;
//        $fornecedor->updated_at = $request->updated_at;
        $fornecedor-> save();
        return redirect()->route('fornecedores.index')->with('message', 'Fornecedor Criado Com Sucesso');
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
    public function edit($id)
    {
        $fornecedor = Fornecedor::where('idFornecedor', '=', $id)->first();
        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::where('idFornecedor', '=', $id)->first();
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->ie = $request->ie;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->bairro = $request->bairro;
        $fornecedor->cep = $request->cep;
        $fornecedor->fone = $request->fone;
        $fornecedor->celular = $request->celular;
        $fornecedor->email = $request->email;
//        $fornecedor->created_at = $request->created_at;
//        $fornecedor->updated_at = $request->updated_at;
        $fornecedor-> save();
        return redirect()->route('fornecedores.index')->with('message', 'Fornecedor Editado Com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::where('idFornecedor', '=', $id)->first();
        $fornecedor->ativo = 0;
        $fornecedor-> save();
        return redirect()->route('fornecedores.index')->with('alert-success','Fornecedor Removido com Sucesso!');
    }
}
