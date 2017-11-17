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
    public function index (Request $request, $id)
    {
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
        $retorno = Item::where('quantidade', 'like', '%' . $palavraChave . '%')
            ->orWhere('borda', 'like', '%' . $palavraChave . '%')
            ->orWhere('precoUnit', 'like', '%' . $palavraChave . '%')
            ->orWhere('fonte', 'like', '%' . $palavraChave . '%')
            ->orderBy('created_at', 'asc')->paginate(10);

//        return view('items.index', compact('item', 'id'));

        return view('items.index', ['item' => $retorno, 'id' => $id]);

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
//        dd($id);
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
        $item = new Item;
        $item->quantidade = $request->quantidade;
        $item->largura = $request->largura;
        $item->comprimento = $request->comprimento;
        $item->unidadeMedida = $request->unidadeMedida;
        $item->borda = $request->borda;
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('arte') && $request->file('arte')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->arte->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->image->storeAs('artes', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/artes/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();

        }
        $item->precoUnit = $request->precoUnit;
        $item->fonte = $request->fonte;
//        $item->created_at = $request->created_at;
//        $item->updated_at = $request->updated_at;


       // $item->os_idOS = OS::orderBy('idOS', 'desc')->first();
        $item->os_idOS = $request->os_idOS;
        //dd($item);
        $item-> save();
        return redirect('items/'.$request->os_idOS)->with('message', 'Item Criado Com Sucesso');
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
