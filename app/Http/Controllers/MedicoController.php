<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Models\Consulta;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    protected readonly Medico $medicos;

    protected readonly Consulta $consulta;

    public function __construct()
    {
        $this->medicos = new Medico;
        $this->consulta = new Consulta;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $input_nome = $request->input('nome');

        $nome = preg_replace('/\b(dr|dra)\s+/i', '', $input_nome); // \b-fronteria de palavras, \s+=espaços em branco, /i- para case-insensitive

        $lista_medicos = $this->medicos->where('nome', 'LIKE', "%$nome%")->orderBy('nome', 'asc')->get();

        return response()->json($lista_medicos);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicoRequest $request)
    {
        $dados_medico = [
            'nome' => $request->input('nome'),
            'especialidade' => $request->input('especialidade'),
            'cidade_id' => $request->input('cidade_id'),
        ];

        try {
            // dd($dados_medico, $request);

            $response = $this->medicos->create($dados_medico);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => $th->getCode()], 500);
        }

        return response()->json($response);
    }

    public function agendar_consulta(Request $request)
    {

        $medico_id = $request->input('medico_id');
        $paciente_id = $request->input('paciente_id');

        // dd($medico_id, $paciente_id);

        try {
            $consulta_registrada = $this->consulta->create([

                'data' => now(),
                'medico_id' => $medico_id,
                'paciente_id' => $paciente_id,

            ]);

            // dd($consulta_registrada);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => $th->getCode()], 500);
        }

        return response()->json($consulta_registrada);
    }

    public function lista_medicos_cidade(Request $request, $id_cidade)
    {

        $input_nome = $request->input('nome');

        $nome = preg_replace('/\b(dr|dra)\s+/i', '', $input_nome); // \b-fronteria de palavras, \s+=espaços em branco, /i- para case-insensitive

        // dd($id_cidade, $input_nome);

        $lista_medico_cidade = $this->medicos
            ->where('cidade_id', $id_cidade)
            ->where('nome', 'LIKE', "%$nome%")
            ->orderBy('nome', 'asc')
            ->get();

        if ($lista_medico_cidade) {
            return response()->json($lista_medico_cidade);

        } else {
            return response()->json(['message' => 'Médico não foi encontrado'], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
