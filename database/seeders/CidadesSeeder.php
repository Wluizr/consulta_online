<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dados_cidades = [
            // São Paulo
            ['nome' => 'São Paulo', 'estado' => 'SP'],
            ['nome' => 'Campinas', 'estado' => 'SP'],
            ['nome' => 'Sorocaba', 'estado' => 'SP'],
            ['nome' => 'Santos', 'estado' => 'SP'],
            ['nome' => 'São Bernardo do Campo', 'estado' => 'SP'],

            // Rio de Janeiro
            ['nome' => 'Rio de Janeiro', 'estado' => 'RJ'],
            ['nome' => 'Niterói', 'estado' => 'RJ'],
            ['nome' => 'Duque de Caxias', 'estado' => 'RJ'],
            ['nome' => 'Cabo Frio', 'estado' => 'RJ'],
            ['nome' => 'Nova Iguaçu', 'estado' => 'RJ'],

            // Acre
            ['nome' => 'Rio Branco', 'estado' => 'AC'],
            ['nome' => 'Cruzeiro do Sul', 'estado' => 'AC'],
            ['nome' => 'Sena Madureira', 'estado' => 'AC'],
            ['nome' => 'Tarauacá', 'estado' => 'AC'],
            ['nome' => 'Feijó', 'estado' => 'AC'],

            // Alagoas
            ['nome' => 'Maceió', 'estado' => 'AL'],
            ['nome' => 'Arapiraca', 'estado' => 'AL'],
            ['nome' => 'Palmeira dos Índios', 'estado' => 'AL'],
            ['nome' => 'Penedo', 'estado' => 'AL'],
            ['nome' => 'União dos Palmares', 'estado' => 'AL'],

            // Paraná
            ['nome' => 'Curitiba', 'estado' => 'PR'],
            ['nome' => 'Londrina', 'estado' => 'PR'],
            ['nome' => 'Maringá', 'estado' => 'PR'],
            ['nome' => 'Ponta Grossa', 'estado' => 'PR'],
            ['nome' => 'Cascavel', 'estado' => 'PR'],

            // Rio Grande do Sul
            ['nome' => 'Porto Alegre', 'estado' => 'RS'],
            ['nome' => 'Caxias do Sul', 'estado' => 'RS'],
            ['nome' => 'Pelotas', 'estado' => 'RS'],
            ['nome' => 'Santa Maria', 'estado' => 'RS'],
            ['nome' => 'Gravataí', 'estado' => 'RS'],

            // Bahia
            ['nome' => 'Salvador', 'estado' => 'BA'],
            ['nome' => 'Feira de Santana', 'estado' => 'BA'],
            ['nome' => 'Vitória da Conquista', 'estado' => 'BA'],
            ['nome' => 'Itabuna', 'estado' => 'BA'],
            ['nome' => 'Ilhéus', 'estado' => 'BA']
        ];

        foreach ($dados_cidades as $key => $cidade) {
            Cidade::create($cidade);
        }        
    }
}
