<?php
namespace App\Http\Controllers;
use App\OC;
use Illuminate\Http\Request;
class OCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
        $retorno = OC::where('tipo', 'like', '%'.$palavraChave.'%')
            ->orWhere('observacoes', 'like', '%'.$palavraChave.'%')
            ->orderBy('created_at', 'asc')->paginate(10);
        return view('ocs.index')->with('oc', $retorno);

        //$oc = OC::orderby('created_at', 'desc')->paginate(10);
        //return view('OCs.index', ['OCs'=>$OCs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ocs.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oc = new OC;
        $oc->tipo = $request->tipo;
        $oc->observacoes = $request->observacoes;
        $oc->created_at = $request->created_at;
        $oc->updated_at = $request->updated_at;
        $oc-> save();
        return redirect()->route('ocs.index')->with('message', 'OC Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\OC  $oc
     * @return \Illuminate\Http\Response
     */
    public function show(OC $oc)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OC  $oc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oc = OC::where('idOC', '=', $id)->first();
        return view('ocs.edit', compact('oc'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OC  $oc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oc = OC::where('idOC', '=', $id)->first();
        $oc->tipo = $request->tipo;
        $oc->observacoes = $request->observacoes;
        $oc->created_at = $request->created_at;
        $oc->updated_at = $request->updated_at;
        $oc-> save();
        return redirect()->route('ocs.index')->with('message', 'OC Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OC  $oc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oc = OC::where('idOC', '=', $id)->first();
        $oc->delete();
        return redirect()->route('ocs.index')->with('alert-success','OC Removida com Sucesso!');
    }
}