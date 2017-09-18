<?php
namespace App\Http\Controllers;
use App\Subproduto;
use Illuminate\Http\Request;

class SubprodutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('tipo') == null) ? '' : $request->get('tipo');
        $retorno = Subproduto::where('tipo', 'like', '%'.$palavraChave.'%')
            ->orWhere('quantidade', 'like', '%'.$palavraChave.'%')
            ->orderBy('created_at', 'asc')->paginate(10);
        return view('subprodutos.index')->with('subproduto', $retorno);

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
        $subproduto = new Subproduto;
        $subproduto->tipo = $request->tipo;
        $subproduto->quantidade = $request->quantidade;
        $subproduto->comprimento = $request->comprimento;
        $subproduto->largura = $request->largura;
        $subproduto->created_at = $request->created_at;
        $subproduto->updated_at = $request->updated_at;
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
    public function edit(Subproduto $subproduto)
    {
        $subproduto = Subproduto::findOrFail($id);
        return view('subprodutos.edit', compact('subproduto'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subproduto $subproduto)
    {
        $subproduto = Subproduto::findORFail($id);
        $subproduto->tipo = $request->tipo;
        $subproduto->quantidade = $request->quantidade;
        $subproduto->comprimento = $request->comprimento;
        $subproduto->largura = $request->largura;
        $subproduto->created_at = $request->created_at;
        $subproduto->updated_at = $request->updated_at;
        $subproduto-> save();
        return redirect()->route('subprodutos.index')->with('message', 'Subproduto Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subproduto $subproduto)
    {
        $subproduto = Subproduto::findOrFail($id);
        $subproduto->delete();
        return redirect()->route('Subprodutos.index')->with('alert-success','Subproduto Removido com Sucesso!');
    }
}