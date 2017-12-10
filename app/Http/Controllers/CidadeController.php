<?php
namespace App\Http\Controllers;
use App\Models\Cidade;
use Illuminate\Http\Request;


class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cidades = Cidade::with('estados')->get();
        return response()->json($cidades);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidades)
    {
         print_r('teste');
         $cidades = Cidade::with('estados')->find($id);

         if(!$cidades) {
            return response()->json([
            'message'   => 'Não há resultados',
           ], 404);
         }

        return response()->json($municipios);
    }

    public function get_cidades($id)
{
    $cidade = DB::table('cidade')
      ->where('uf','=', $estados_uf)
      ->orderBy('name','asc')
      ->get();

    return Response::json($cidade);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subproduto  $subproduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
}