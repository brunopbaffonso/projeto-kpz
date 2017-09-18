<?php
namespace App\Http\Controllers;
use App\OS;
use Illuminate\Http\Request;
class OSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)    {
        $palavraChave = ($request->get('precoTotal') == null) ? '' : $request->get('precoTotal');
        $retorno = OS::where('precoTotal', 'like', '%'.$palavraChave.'%')
            ->orWhere('formaPgto', 'like', '%'.$palavraChave.'%')
            ->orWhere('observacoes', 'like', '%'.$palavraChave.'%')
            ->orderBy('created_at', 'asc')->paginate(10);
        return view('oss.index')->with('os', $retorno);

        //$OSs = OS::orderby('created_at', 'desc')->paginate(10);
        //return view('OSs.index', ['OSs'=>$OSs]);
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
        $oS = new OS;
        $oS->precoTotal = $request->precoTotal;
        $oS->desconto = $request->desconto;
        $oS->formaPgto = $request->formaPgto;
        $oS->observacoes = $request->observacoes;
        $oS->created_at = $request->created_at;
        $oS->updated_at = $request->updated_at;
        $oS-> save();
        return redirect()->route('OSs.index')->with('message', 'OS Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function show(OS $oS)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function edit(OS $oS)
    {
        $oS = OS::findOrFail($id);
        return view('OSs.edit', compact('os'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OS $oS)
    {
        $oS = OS::findORFail($id);
        $oS->precoTotal = $request->precoTotal;
        $oS->desconto = $request->desconto;
        $oS->formaPgto = $request->formaPgto;
        $oS->observacoes = $request->observacoes;
        $oS->created_at = $request->created_at;
        $oS->updated_at = $request->updated_at;
        $oS-> save();
        return redirect()->route('OSs.index')->with('message', 'OS Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function destroy(OS $oS)
    {
        $oS = OS::findOrFail($id);
        $oS->delete();
        return redirect()->route('OSs.index')->with('alert-success','OS Removida com Sucesso!');
    }
}