<?php
namespace App\Http\Controllers;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $Grid = new Grid(Modelo::query(), 'ModelosGrid');
        
        $Grid->fields([
            'idModelo'=>'Código',
            'nome'=>'Descrição' 
        ])
        ->actionFields([
            'emp_no' //The fields used for process actions. those not are showed 
        ])
        ->advancedSearch([
            'idModelo'=>['type'=>'integer','label'=>'Código'],
            'nome'=>['type'=>'text', 'label'=>'Descrição']
        ]);

        $Grid->action('Editar', 'modelos/{idModelo}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
        ->action('Deletar', 'modelos/{idModelo}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'modelos/bulk-delete');

        return view('modelos.index', ['grid'=>$Grid]);

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
        return view('modelos.register');
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

        $this->validate($request,[
            'nome'=> 'required|min:3|max:255',
        ],[
            'nome.string'=>'Esse campo so aceita Letras',
            'nome.min'=>'Minimo de 3 caracteres',
            'nome.max'=>'maximo de 255 caracteres',
        ]);

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
    public function edit($id)
    {
        $modelo = Modelo::where('idModelo', '=', $id)->first();
        return view('modelos.edit', compact('modelo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modelo = Modelo::where('idModelo', '=', $id)->first();
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
    public function destroy($id)
    {
        $modelo = Modelo::where('idModelo', '=', $id)->first();
        $modelo->delete();
        return redirect()->route('modelos.index')->with('alert-success','Modelo Removido com Sucesso!');
    }
}