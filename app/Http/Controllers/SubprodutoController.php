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
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
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
    public function destroy($id)
    {
        $subproduto = Subproduto::where('idSubproduto', '=', $id)->first();
        $subproduto->delete();
        return redirect()->route('subprodutos.index')->with('alert-success','Subproduto Removido com Sucesso!');
    }
}