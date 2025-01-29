<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public readonly Cidade $cidades;

    public function __construct()
    {
        $this->cidades = new Cidade;

    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nome_cidade = $request->input('nome');
        $lista_cidades = $this->cidades->where('nome', 'LIKE', "%$nome_cidade%")->orderBy('nome', 'asc')->get();
        
        return response()->json($lista_cidades);
    }

}
