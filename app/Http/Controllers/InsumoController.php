<?php
namespace App\Http\Controllers;
use App\Models\Insumo;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Grid = new Grid(Insumo::query(), 'InsumosGrid');

        $Grid->fields([
            'idInsumo'=>'Código',
            'nome'=>'Descrição',
            'quantidade'=>'Quantidade',
            'comprimento'=>'Comprimento',
            'largura'=>'Largura',
            'unidadeMedida'=>'Medida',
            'precoUnit'=>'Unitario',
            'created_at'=>'Data Cadastro'
        ])

        ->processLine(function($row){
                $row['precoUnit'] = 'R$'.number_format($row['precoUnit'], 2, ',', '.');
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                $row['comprimento'] =  number_format($row['comprimento'], 2, ',', '.');
                $row['largura'] =  number_format($row['largura'], 2, ',', '.');
                return $row;
            })

            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idInsumo'=>['type'=>'integer','label'=>'Código'],
                'nome'=>['type'=>'text', 'label'=>'Quantidade'],
                'quantidade'=>['type'=>'integer', 'label'=>'Quantidade'],
                'comprimento'=>['type'=>'integer', 'label'=>'Comprimento'],
                'largura'=>['type'=>'integer', 'label'=>'Largura'],
                'unidadeMedida'=>['type'=>'text', 'label'=>'Medida'],
                'precoUnit'=>['type'=>'money', 'label'=>'Unitario'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'insumos/{idInsumo}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
        ->action('Deletar', 'insumos/{idInsumo}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'insumos/bulk-delete');

        return view('insumos.index', ['grid'=>$Grid]);

        //$insumos = Insumo::orderby('created_at', 'desc')->paginate(10);
        //return view('insumos.index', ['insumos'=>$insumos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insumos.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $insumo = new Insumo;
        $insumo->nome = $request->nome;
        $insumo->quantidade = $request->quantidade;
        $insumo->comprimento = $request->comprimento;
        $insumo->largura = $request->largura;
        $insumo->unidadeMedida = $request->unidadeMedida;
        $insumo->precoUnit = $request->precoUnit;
        
        $this->validate($request,[
            'nome'=> 'string|min:3|max:255',
            'quantidade'=> 'numeric|min:1',
            'comprimento'=> 'numeric|between:0,99.99',
            'largura'=> 'numeric|between:0,99.99',
            'precoUnit'=> 'numeric|between:0.01,9999.99'
        ],[
            'nome.string'=>'Esse campo so aceita Letras',
            'nome.min'=>'Minimo de 3 caracteres',
            'nome.max'=>'maximo de 255 caracteres',
            'quantidade.numeric'=>'Esse campos so aceita numeros',
            'quantidade.min'=>'Deve estar no intervalo',
            'comprimento.numeric'=>'Esse campos so aceita numeros',
            'comprimento.between'=>'Campo aceita numeros em um intervalo de 0 e 99,99',
            'largura.numeric'=>'Esse campos so aceita numeros',
            'largura.between'=>'Campo aceita numeros em um intervalo de 0 e 99,99',
            'precoUnit.between'=>'Campo aceita valor entre de 0,01 e 9999,99 reais'
        ]);

        $insumo-> save();
        return redirect()->route('insumos.index')->with('message', 'Insumo Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insumo = Insumo::where('idInsumo', '=', $id)->first();
        return view('insumos.edit', compact('insumo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $insumo = Insumo::where('idInsumo', '=', $id)->first();
        $insumo->quantidade = $request->quantidade;
        $insumo->nome=$request->nome;
        $insumo->comprimento = $request->comprimento;
        $insumo->largura = $request->largura;
        $insumo->unidadeMedida = $request->unidadeMedida;
        $insumo->precoUnit = $request->precoUnit;
//        $insumo->created_at = $request->created_at;
//        $insumo->updated_at = $request->updated_at;
        $insumo-> save();
        return redirect()->route('insumos.index')->with('message', 'Insumo Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo = Insumo::where('idInsumo', '=', $id)->first();
        $insumo->delete();
        return redirect()->route('insumos.index')->with('alert-success','Insumo Removido com Sucesso!');
    }
}