<?php
namespace App\Http\Controllers;
use App\OS;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\OperatingSystem;

class OSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)    {
        $palavraChave = ($request->get('nome') == null) ? '' : $request->get('nome');
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
        return view('oss.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $os = new OS;
        $os->precoTotal = $request->precoTotal;
        $os->desconto = $request->desconto;
        $os->formaPgto = $request->formaPgto;
        $os->observacoes = $request->observacoes;
//        $os->created_at = $request->created_at;
//        $os->updated_at = $request->updated_at;
        $os-> save();

        //$ordem = OS::orderBy('idOS', 'desc')->first();
        //$ordem = OS::select()->where('created_at',)->first();
//        dd($os);
        $ordem=$os;
        //dd($ordem);
        //return redirect('items/create/' . $os->idOS)->with('message', 'OS Criado Com Sucesso'); // TODO: Atributo na rota
        return redirect('items/create/'.$os->idOS);
//        return view('items.register', ['OS' => $ordem]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\OS  $os
     * @return \Illuminate\Http\Response
     */
    public function show(OS $os)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OS  $os
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $os = OS::where('idOS', '=', $id)->first();
        return view('oss.edit', compact('os'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OS  $os
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $os = OS::where('idOS', '=', $id)->first();
        $os->precoTotal = $request->precoTotal;
        $os->desconto = $request->desconto;
        $os->formaPgto = $request->formaPgto;
        $os->observacoes = $request->observacoes;
//        $os->created_at = $request->created_at;
//        $os->updated_at = $request->updated_at;
        $os-> save();
        return redirect()->route('oss.index')->with('message', 'OS Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OS  $os
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $os = OS::where('idOS', '=', $id)->first();
        $os->delete();
        return redirect()->route('oss.index')->with('alert-success','OS Removida com Sucesso!');
    }
}