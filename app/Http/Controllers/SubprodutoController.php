<?php
namespace App\Http\Controllers;
use App\Subproduto;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;

class SubprodutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
        $retorno = Subproduto::where('tipo', 'like', '%'.$palavraChave.'%')
            ->orWhere('quantidade', 'like', '%'.$palavraChave.'%')
            ->orderBy('created_at', 'asc')->paginate(10);

        $Grid = new Grid(Subproduto::query(), 'SubprodutoGrid');

        $Grid->fields([
            'idSubproduto'=>'Código',
            'tipo'=>'Descrição',
            'quantidade'=>'Quantidade',
            'comprimento'=>'Comprimento',
            'largura'=>'Largura',
            'created_at'=>'Data Cadastro'
        ])
            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idSubproduto'=>['type'=>'integer','label'=>'Código'],
                'tipo'=>['type'=>'text', 'label'=>'Descrição'],
                'quantidade'=>['type'=>'integer', 'label'=>'Quantidade'],
                'comprimento'=>['type'=>'is_float(comprimento)', 'label'=>'Comprimento'],
                'largura'=>['type'=>'is_float(largura)', 'label'=>'Largura'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'edit/{emp_no}', ['method' => 'edit'])
            ->action('Deletar', '{emp_no}', [
                'confirm'=>'Deseja mesmo deletar esse registro?',
                'method'=>'DELETE',
            ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', '/projeto-kpz-test/public/modelos/bulk-delete');

        return view('subprodutos.index', ['grid'=>$Grid])->with('subproduto', $retorno);

        //$subprodutos = Subproduto::orderby('created_at', 'desc')->paginate(10);
        //return view('subprodutos.index', ['subprodutos'=>$subprodutos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subprodutos.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subproduto = new Subproduto;
        $subproduto->tipo = $request->tipo;
        $subproduto->quantidade = $request->quantidade;
        $subproduto->comprimento = $request->comprimento;
        $subproduto->largura = $request->largura;
//        $subproduto->created_at = $request->created_at;
//        $subproduto->updated_at = $request->updated_at;
        $subproduto->cor_idCor = $request->cor_idCor;
        $subproduto-> save();
        return redirect()->route('subprodutos.index')->with('message', 'Subproduto Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function show(Subproduto $subproduto)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subproduto = Subproduto::where('idSubproduto', '=', $id)->first();
        return view('subprodutos.edit', compact('subproduto'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subproduto = Subproduto::where('idSubproduto', '=', $id)->first();
        $subproduto->tipo = $request->tipo;
        $subproduto->quantidade = $request->quantidade;
        $subproduto->comprimento = $request->comprimento;
        $subproduto->largura = $request->largura;
//        $subproduto->created_at = $request->created_at;
//        $subproduto->updated_at = $request->updated_at;
        $subproduto->cor_idCor = $request->cor_idCor;
        $subproduto-> save();
        return redirect()->route('subprodutos.index')->with('message', 'Subproduto Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subproduto = Subproduto::where('idSubproduto', '=', $id)->first();
        $subproduto->delete();
        return redirect()->route('subprodutos.index')->with('alert-success','Subproduto Removido com Sucesso!');
    }
}