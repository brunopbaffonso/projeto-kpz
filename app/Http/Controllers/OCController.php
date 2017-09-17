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
    public function index()
    {
        $oCs = OC::orderby('created_at', 'desc')->paginate(10);
        return view('OCs.index', ['OCs'=>$OCs]);
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
        $oC = new OC;
        $oC->tipo = $request->tipo;
        $oC->observacoes = $request->observacoes;
        $oC->created_at = $request->created_at;
        $oC->updated_at = $request->updated_at;
        $oC-> save();
        return redirect()->route('OCs.index')->with('message', 'OC Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\OC  $oC
     * @return \Illuminate\Http\Response
     */
    public function show(OC $oC)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OC  $oC
     * @return \Illuminate\Http\Response
     */
    public function edit(OC $oC)
    {
        $oC = OC::findOrFail($id);
        return view('OCs.edit', compact('oc'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OC  $oC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OC $oC)
    {
        $oC = OC::findORFail($id);
        $oC->tipo = $request->tipo;
        $oC->observacoes = $request->observacoes;
        $oC->created_at = $request->created_at;
        $oC->updated_at = $request->updated_at;
        $oC-> save();
        return redirect()->route('OCs.index')->with('message', 'OC Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OC  $oC
     * @return \Illuminate\Http\Response
     */
    public function destroy(OC $oC)
    {
        $oC = OC::findOrFail($id);
        $oC->delete();
        return redirect()->route('OCs.index')->with('alert-success','OC Removida com Sucesso!');
    }
}