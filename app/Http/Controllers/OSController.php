<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Item;
use App\Models\OS;
use App\Models\Modelo;
use App\Models\Borda;
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
        $clientes = Cliente::All();

        return view('oss.register')->with('clientes', $clientes);
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
        $os = new OS();
        $os->idOS = $id + 1;
        $os->status=$request->status;
        $os->contato=$request->contato;
        $os->precoTotal = $request->precoTotal;
        $os->desconto = $request->desconto;
        $os->formaPgto = $request->formaPgto;
        $os->observacoes = $request->observacoes;
        $os->cliente_idCliente = $request->idCliente;
        $os->save();
        //dd($os);
        //return redirect('items/create/' . $os->idOS)->with('message', 'OS Criado Com Sucesso'); // TODO: Atributo na rota
        return redirect('registra/item/'.$os->idOS);
    }

    public function itemOSS($ordem) {
        $modelos = Modelo::All();
        $bordas = Borda::All();
        
        return view('items.register')->with('OS', $ordem)->with('modelos', $modelos)->with('bordas',$bordas);
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
        $os = OS::where('idOS', '=', $id)->with('item')->first();
        $items = Item::where('os_idOS', $os->idOS)->get();
        $cliente = Cliente::All();
        //return view('oss.edit', compact('os', 'cliente'));
        return view('oss.edit')->with('os', $os)->with('items', $items)->with('cliente', $cliente)->with('items', $items);
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
        $os->status=$request->status;
        $os->precoTotal = $request->precoTotal;
        $os->desconto = $request->desconto;
        $os->formaPgto = $request->formaPgto;
        $os->observacoes = $request->observacoes;
        $os->cliente_idCliente = $request->idCliente;

        //dd($os);

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