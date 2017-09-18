<?php
namespace App\Http\Controllers;
use App\Modelo;
use Illuminate\Http\Request;
class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
        $retorno = Modelo::where('nome', 'like', '%'.$palavraChave.'%')
            ->orderBy('nome', 'asc')->paginate(10);
        return view('modelos.index')->with('modelo', $retorno);

        //$modelos = Modelo::orderby('idModelo', 'desc')->paginate(10);
        //return view('modelos.index', ['modelos'=>$modelos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modelos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelo = new Modelo;
        $modelo->nome = $request->nome;
        $modelo-> save();
        return redirect()->route('modelos.index')->with('message', 'Modelo Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        $modelos = Modelo::findOrFail($id);
        return view('modelos.edit', compact('modelo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo)
    {
        $modelo = Modelo::findORFail($id);
        $modelo->nome = $request->nome;
        $modelo-> save();
        return redirect()->route('modelos.index')->with('message', 'Modelo Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}