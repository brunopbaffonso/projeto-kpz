<?php
namespace App\Http\Controllers;
use App\OS;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\OperatingSystem;
use Rafwell\Simplegrid\Grid;

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
        $Grid = new Grid(OS::query(), 'OsGrid');

        $Grid->fields([
            'idOS'=>'Código',
            'precoTotal'=>'Preço Total',
            'desconto'=>'Desconto',
            'formaPgto'=>'Forma Pgto.',
            'observacoes'=>'Observações',
            'created_at'=>'Data Cadastro'
        ])
            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'idOS'=>['type'=>'integer','label'=>'Código'],
                'precoTotal'=>['type'=>'money', 'label'=>'Preço Total'],
                'desconto'=>['type'=>'money', 'label'=>'Desconto'],
                'formaPgto'=>['type'=>'text', 'label'=>'Forma Pgto.'],
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

        return view('oss.index', ['grid'=>$Grid])->with('subproduto', $retorno);

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
        //dd($ordem);
        $ordem=$os;
        //dd($ordem);
        //return redirect('items/create/' . $os->idOS)->with('message', 'OS Criado Com Sucesso'); // TODO: Atributo na rota
        return view('items.register', ['OS' => $ordem]);
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