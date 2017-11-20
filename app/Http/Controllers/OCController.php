<?php
namespace App\Http\Controllers;
use App\OC;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;

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
        $Grid = new Grid(OC::query(), 'OsGrid');

        $Grid->fields([
            'idOC'=>'Código',
            'tipo'=>'Tipo',
            'observacoes'=>'Observações',
            'created_at'=>'Data Cadastro'
        ])
            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idOC'=>['type'=>'integer','label'=>'Código'],
                'tipo'=>['type'=>'text', 'label'=>'Tipo'],
                'observacoes'=>['type'=>'text', 'label'=>'Observações'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'edit/{emp_no}', ['method' => 'edit'])
            ->action('Deletar', '{emp_no}', [
                'confirm'=>'Deseja mesmo deletar esse registro?',
                'method'=>'DELETE',
            ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', '/projeto-kpz-test/public/modelos/bulk-delete');

        return view('ocs.index', ['grid'=>$Grid])->with('subproduto', $retorno);

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
//        $oc->created_at = $request->created_at;
//        $oc->updated_at = $request->updated_at;
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
//        $oc->created_at = $request->created_at;
//        $oc->updated_at = $request->updated_at;
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