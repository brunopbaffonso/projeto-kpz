<?php
namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Rafwell\Simplegrid\Grid;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
         $Grid = new Grid(Item::query(), 'ItensGrid');

        $Grid->fields([
            'idItem'=>'Código',
            'quantidade'=>'Quantidade',
            'largura'=>'Largura',
            'comprimento'=>'Comprimento',
            'unidadeMedida'=>'Medida',
            'borda'=>'Borda',
            'arte'=>'Arte',
            'fonte'=>'Fonte',
            'precoUnit'=>'Unitario',
            'created_at'=>'Data Cadastro'
        ])

        ->processLine(function($row){
                $row['arte'] = link_to($row['arte']);
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                $row['precoUnit'] =  'R$ '.number_format($row['precoUnit'], 2, ',', '.');
                $row['comprimento'] =  number_format($row['comprimento'], 2, ',', '.');
                $row['largura'] =  number_format($row['largura'], 2, ',', '.');
                return $row;
            })

            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idItem'=>['type'=>'integer','label'=>'Código'],
                'quantidade'=>['type'=>'integer', 'label'=>'Quantidade'],
                'largura'=>['type'=>'doubleval(largura)', 'label'=>'Largura'],
                'comprimento'=>['type'=>'doubleval(comprimento)', 'label'=>'Comprimento'],
                'borda'=>['type'=>'text', 'label'=>'Borda'],
                'arte'=>['type'=>'link', 'label'=>'Arte'],
                'fonte'=>['type'=>'text', 'label'=>'Fonte'],
                'unidadeMedida'=>['type'=>'text', 'label'=>'Medida'],
                'precoUnit'=>['type'=>'money', 'label'=>'Unitario'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'items/{idItem}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
        ->action('Deletar', 'items/{idItem}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'items/bulk-delete');

        return view('items.index', ['grid'=>$Grid]);

        //$items = Item::orderby('created_at', 'desc')->paginate(10);
        //return view('items.index', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
        return view('items.register')->with('id', $id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arte = $request->file('arte');
        //dd($arte);

        $item = new Item;
        $item->quantidade = $request->quantidade;
        $item->largura = $request->largura;
        $item->comprimento = $request->comprimento;
        $item->unidadeMedida = $request->unidadeMedida;
        $item->borda = $request->borda;
        if(!empty($arte))
        {
            $item->arte = Storage::put('artes', $arte);
        }
        $item->precoUnit = $request->precoUnit;
        $item->fonte = $request->fonte;
//        $item->created_at = $request->created_at;
//        $item->updated_at = $request->updated_at;
//        $item->os_idOS = OS::orderBy('idOS', 'desc')->first();
        $item->os_idOS = $request->os_idOS;
//        dd($item);
        $item-> save();
        if($request->submit == "0"){
            return redirect()->route('items.index')->with('message', 'Item Criado Com Sucesso');
        }
        else return view('items.register', ['OS' => $item->os_idOS]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::where('idItem', '=', $id)->first();
        return view('items.edit', compact('item'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::where('idItem', '=', $id)->first();
        $item->quantidade = $request->quantidade;
        $item->largura = $request->largura;
        $item->comprimento = $request->comprimento;
        $item->unidadeMedida = $request->unidadeMedida;
        $item->borda = $request->borda;
        $item->arte = $request->arte;
        $item->precoUnit = $request->precoUnit;
        $item->fonte = $request->fonte;
//        $item->created_at = $request->created_at;
//        $item->updated_at = $request->updated_at;
        $item-> save();
        return redirect()->route('items.index')->with('message', 'Item Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::where('idItem', '=', $id)->first();
        $item->delete();
        return redirect()->route('items.index')->with('alert-success','Item Removido com Sucesso!');
    }
}
