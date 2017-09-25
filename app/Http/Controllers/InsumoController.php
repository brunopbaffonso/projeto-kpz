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
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
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
        $insumo->quantidade = $request->quantidade;
        $insumo->comprimento = $request->comprimento;
        $insumo->largura = $request->largura;
        $insumo->unidadeMedida = $request->unidadeMedida;
        $insumo->precoUnit = $request->precoUnit;
        $insumo->created_at = $request->created_at;
        $insumo->updated_at = $request->updated_at;
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
        $insumo->comprimento = $request->comprimento;
        $insumo->largura = $request->largura;
        $insumo->unidadeMedida = $request->unidadeMedida;
        $insumo->precoUnit = $request->precoUnit;
        $insumo->created_at = $request->created_at;
        $insumo->updated_at = $request->updated_at;
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