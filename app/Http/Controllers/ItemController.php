<?php
namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('quantidade') == null) ? '' : $request->get('quantidade');
        $retorno = Item::where('quantidade', 'like', '%'.$palavraChave.'%')
            ->orWhere('borda', 'like', '%'.$palavraChave.'%')
            ->orWhere('precoUnit', 'like', '%'.$palavraChave.'%')
            ->orWhere('fonte', 'like', '%'.$palavraChave.'%')
            ->orderBy('created_at', 'asc')->paginate(10);
        return view('items.index')->with('items', $retorno);

        //$items = Item::orderby('created_at', 'desc')->paginate(10);
        //return view('items.index', ['items'=>$items]);
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
        $item = new Item;
        $item->quantidade = $request->quantidade;
        $item->largura = $request->largura;
        $item->comprimento = $request->comprimento;
        $item->unidadeMedida = $request->unidadeMedida;
        $item->borda = $request->borda;
        $item->arte = $request->arte;
        $item->precoUnit = $request->precoUnit;
        $item->fonte = $request->fonte;
        $item->created_at = $request->created_at;
        $item->update_at = $request->update_at;
        $item-> save();
        return redirect()->route('items.index')->with('message', 'Item Criado Com Sucesso');
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
    public function edit(Item $item)
    {
        $item = Fornecedor::findOrFail($id);
        return view('items.edit', compact('item'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item = Item::findORFail($id);
        $item->quantidade = $request->quantidade;
        $item->largura = $request->largura;
        $item->comprimento = $request->comprimento;
        $item->unidadeMedida = $request->unidadeMedida;
        $item->borda = $request->borda;
        $item->arte = $request->arte;
        $item->precoUnit = $request->precoUnit;
        $item->fonte = $request->fonte;
        $item->created_at = $request->created_at;
        $item->update_at = $request->update_at;
        $item-> save();
        return redirect()->route('items.index')->with('message', 'Item Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index')->with('alert-success','Item Removido com Sucesso!');
    }
}
