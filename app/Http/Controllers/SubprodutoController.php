<?php
namespace App\Http\Controllers;
use App\Models\Subproduto;
use App\Models\Cor;
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
        $Grid = new Grid(Subproduto::query(), 'SubprodutoGrid');

        $Grid->fields([
            'idSubproduto'=>'Código',
            'tipo'=>'Descrição',
            'quantidade'=>'Quantidade',
            'comprimento'=>'Comprimento',
            'largura'=>'Largura',
            'unidadeMedida'=>'Unid. Medida',
            'created_at'=>'Data Cadastro'
        ])

        ->processLine(function($row){
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                $row['largura'] = number_format($row['largura'], 2, ',', '.');
                $row['comprimento'] =  number_format( $row['comprimento'], 2, ',', '.');
                return $row;
            })
        
            ->actionFields([
                'emp_no' 
            ])
            ->advancedSearch([
                'idSubproduto'=>['type'=>'integer','label'=>'Código'],
                'tipo'=>['type'=>'text', 'label'=>'Descrição'],
                'quantidade'=>['type'=>'integer', 'label'=>'Quantidade'],
                'comprimento'=>['type'=>'is_float(comprimento)', 'label'=>'Comprimento'],
                'largura'=>['type'=>'is_float(largura)', 'label'=>'Largura'],
                'unidadeMedida'=>['type'=>'text', 'label'=>'Unid. Medida'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'subprodutos/{idSubproduto}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
        ->action('Deletar', 'subprodutos/{idSubproduto}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'subprodutos/bulk-delete');

        return view('subprodutos.index', ['grid'=>$Grid]);

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
        $cors = Cor::All();

        return view('subprodutos.register')->with('cor', $cors);
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
        $subproduto->unidadeMedida = $request->unidadeMedida;
        $subproduto->cor_idCor = $request->cor_idCor;
        //dd($subproduto);
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
        $cors = Cor::All();
        return view('subprodutos.edit')->with('subproduto', $subproduto)->with('cor', $cors);
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
        $subproduto->unidadeMedida = $request->unidadeMedida;
        $subproduto->cor_idCor = $request->idCor;
        //dd($subproduto);
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