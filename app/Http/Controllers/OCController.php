<?php
namespace App\Http\Controllers;
use App\Models\Fornecedor;
use App\Models\OC;
use App\Models\Cor;
use App\Models\Insumo;
use App\Models\TipoManta;
use App\Models\TipoMaterial;
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
        $Grid = new Grid(OC::query(), 'OsGrid');

        $Grid->fields([
            'idOC'=>'Código',
            'tipo'=>'Tipo',
            'observacoes'=>'Observações',
            'created_at'=>'Data Cadastro'
        ])

         ->processLine(function($row){
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                return $row;
            })
        
            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idOC'=>['type'=>'integer','label'=>'Código'],
                'tipo'=>['type'=>'text', 'label'=>'Tipo'],
                'observacoes'=>['type'=>'text', 'label'=>'Observações'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'ocs/{idOC}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
        ->action('Deletar', 'ocs/{idOC}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'ocs/bulk-delete');

        return view('ocs.index', ['grid'=>$Grid]);

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
        $fornecedores = Fornecedor::All();

        return view('ocs.register')->with('fornecedores', $fornecedores);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = OC::count();
        $oc = new OC();
        $oc->idOC = $id + 1;
        $oc->tipo = $request->tipo;
        $oc->observacoes = $request->observacoes;
        $oc->fornecedor_idFornecedor = $request->idFornecedor;
//        $oc->created_at = $request->created_at;
//        $oc->updated_at = $request->updated_at;
        $oc-> save();

        //return redirect()->route('ocs.index')->with('message', 'OC Criado Com Sucesso');
        return redirect('registra/insumo/'.$oc->idOC);
    }

    public function insumoOCS($ordem) {
        $fornecedores = Fornecedor::All();
        $cors = Cor::All();
        $materials = TipoMaterial::All();
        $mantas = TipoManta::All();

        return view('insumos.register')->with(['OC' => $ordem])->with(['fornecedores' => $fornecedores])->with(['cors' => $cors])->with(['materials' => $materials])->with(['mantas' => $mantas]);
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
        $oc = OC::where('idOC', '=', $id)->with('insumo')->first();
        $insumos = Insumo::where('oc_idOC', $oc->idOC)->get();

        return view('ocs.edit')->with('oc', $oc)->with('insumos', $insumos);
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