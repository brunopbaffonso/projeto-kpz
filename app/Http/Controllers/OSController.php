<?php
namespace App\Http\Controllers;
use App\Models\OS;
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
    public function index(Request $request)    
    {

        $Grid = new Grid(OS::query(), 'OsGrid');

        $Grid->fields([
            'idOS'=>'Código',
            'contato'=>'Contato',
            'status'=>'Status',
            'precoTotal'=>'Preço Total',
            'desconto'=>'Desconto',
            'formaPgto'=>'Forma Pgto.',
            'observacoes'=>'Observações',
            'created_at'=>'Data Cadastro'
        ])

          ->processLine(function($row){
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                $row['precoTotal'] =  'R$ '.number_format($row['precoTotal'], 2, ',', '.');
                $row['desconto'] =  'R$ '.number_format($row['desconto'], 2, ',', '.');
                return $row;
            })

            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])



            ->advancedSearch([
                'idOS'=>['type'=>'integer','label'=>'Código'],
                'contato'=>['type'=>'text', 'label'=>'Contato'],
                'status'=>['type'=>'in', 'label'=>'Preço Total'],
                'precoTotal'=>['type'=>'money', 'label'=>'Preço Total'],
                'desconto'=>['type'=>'money', 'label'=>'Desconto'],
                'formaPgto'=>['type'=>'text', 'label'=>'Forma Pgto.'],
                'observacoes'=>['type'=>'textarea', 'label'=>'Observações'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'oss/{idOS}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
        ->action('Deletar', 'oss/{idOS}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'oss/bulk-delete');

        return view('oss.index', ['grid'=>$Grid]);

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
        $id = OS::count();
        $os = new OS;
        $os->idOS = $id + 1;
        $os->contato=$request->contato;
        $os->precoTotal = $request->precoTotal;
        $os->desconto = $request->desconto;
        $os->formaPgto = $request->formaPgto;
        $os->observacoes = $request->observacoes;
        $os->item()->create([

        ],
            [

            ]);
        $os->save();
        //$ordem = OS::orderBy('idOS', 'desc')->first();
        //$ordem = OS::select()->where('created_at',)->first();
        //dd($ordem);
        $ordem=$os;
        //dd($ordem);
        //return redirect('items/create/' . $os->idOS)->with('message', 'OS Criado Com Sucesso'); // TODO: Atributo na rota

        return view('items.register', ['OS' => $ordem]);
    }

    public function itemsOSS($ordem) {
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
        $os->contato=$request->contato;
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