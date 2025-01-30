<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    protected readonly Paciente $paciente;

    public function __construct()
    {
        $this->paciente = new Paciente;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PacienteRequest $request)
    {

        $dados_paciente = [
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'celular' => $request->input('celular'),
        ];

        // dd($dados_paciente, $request);
        try {
            $response = $this->paciente->create($dados_paciente);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => $th->getCode()], 500);
        }

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PacienteRequest $request, string $id_paciente)
    {
        $nome = $request->input('nome');
        $celular = $request->input('celular');

        try {
            $this->paciente->find($id_paciente)->update([
                'nome' => $nome,
                'celular' => $celular,
            ]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => $th->getCode()], 500);
        }

        $paciente_atualizado = $this->paciente->find($id_paciente);

        return response()->json($paciente_atualizado);
    }

    public function listar_pacientes_do_medico(Request $request, $id_medico)
    {

        $response = [];
        $agendado = filter_var($request->input('apenas-agendadas'), FILTER_VALIDATE_BOOLEAN);
        $nome = $request->input('nome');

        $lista_consulta = Consulta::with('paciente')
            ->when($agendado, function ($query) {
                $query->where('data', '>', now());
            })
            ->when($nome, function ($query) use ($nome) {
                $query->whereHas('paciente', fn ($query_p) => $query_p->where('nome', 'LIKE', "%$nome%"));
            })
            ->where('medico_id', $id_medico)
            ->orderBy('data', 'asc')
            ->get();

        // dd($lista_consulta);

        foreach ($lista_consulta as $key => $consulta) {
            $id_paciente = $consulta->paciente->id;

            $dados_consulta = [
                'id' => $consulta->id,
                'data' => $consulta->data,
                'created_at' => $consulta->created_at,
                'updated_at' => $consulta->updated_at,
                'deleted_at' => $consulta->deleted_at,
            ];

            // Verifica se o paciente já exite na resposta. Caso sim, adiciona a consulta ao mesmo registro.
            if (array_key_exists($id_paciente, $response)) {
                $response[$id_paciente]['consulta'][] = $dados_consulta;

                continue;
            }

            $response[$id_paciente] = [
                'id' => $id_paciente,
                'nome' => $consulta->paciente->nome,
                'cpf' => $consulta->paciente->cpf,
                'celular' => $consulta->paciente->celular,
                'created_at' => $consulta->paciente->created_at,
                'updated_at' => $consulta->paciente->updated_at,
                'deleted_at' => $consulta->paciente->deleted_at,
                'consulta' => [$dados_consulta],
            ];
        }

        $response = array_values($response);

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
