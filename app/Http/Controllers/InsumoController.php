<?php
namespace App\Http\Controllers;
use App\Insumo;
use Illuminate\Http\Request;
class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('quantidade') == null) ? '' : $request->get('quantidade');
        $retorno = Insumo::where('quantidade', 'like', '%'.$palavraChave.'%')
            ->orWhere('unidadeMedida', 'like', '%'.$palavraChave.'%')
            ->orWhere('precoUnit', 'like', '%'.$palavraChave.'%')
            ->orderBy('created_at', 'asc')->paginate(10);
        return view('insumos.index')->with('insumo', $retorno);

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
        $insumo = new Insumo;
        $insumo->quantidade = $request->quantidade;
        $insumo->comprimento = $request->comprimento;
        $insumo->largura = $request->largura;
        $insumo->unidadeMedida = $request->unidadeMedida;
        $insumo->precoUnit = $request->precoUnit;
        $insumo->created_at = $request->created_at;
        $insumo->update_at = $request->update_at;
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
    public function edit(Insumo $insumo)
    {
        $insumo = Insumo::findOrFail($id);
        return view('insumos.edit', compact('insumo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        $insumo = Insumo::findORFail($id);
        $insumo->quantidade = $request->quantidade;
        $insumo->comprimento = $request->comprimento;
        $insumo->largura = $request->largura;
        $insumo->unidadeMedida = $request->unidadeMedida;
        $insumo->precoUnit = $request->precoUnit;
        $insumo->created_at = $request->created_at;
        $insumo->update_at = $request->update_at;
        $insumo-> save();
        return redirect()->route('insumos.index')->with('message', 'Insumo Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();
        return redirect()->route('insumos.index')->with('alert-success','Insumo Removido com Sucesso!');
    }
}