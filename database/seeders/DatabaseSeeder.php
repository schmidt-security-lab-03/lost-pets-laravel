<?php

namespace Database\Seeders;

use App\Models\PetReport;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $examples = [
            ['name' => 'Luna', 'species' => 'cat', 'breed' => 'Sem raça definida', 'color' => 'Cinza e branca', 'city' => 'São Paulo', 'neighborhood' => 'Vila Mariana', 'status' => 'lost', 'description' => 'Gata dócil com uma pequena mancha branca no focinho. Exemplo fictício para demonstração.'],
            ['name' => 'Bento', 'species' => 'dog', 'breed' => 'Sem raça definida', 'color' => 'Caramelo', 'city' => 'Campinas', 'neighborhood' => 'Cambuí', 'status' => 'found', 'description' => 'Cachorro de porte médio encontrado próximo a uma praça. Exemplo fictício para demonstração.'],
            ['name' => 'Nina', 'species' => 'dog', 'breed' => 'Beagle', 'color' => 'Tricolor', 'city' => 'São Paulo', 'neighborhood' => 'Moema', 'status' => 'reunited', 'description' => 'Uma história que terminou bem: voltou para casa. Exemplo fictício para demonstração.'],
            ['name' => 'Pipoca', 'species' => 'cat', 'breed' => 'Sem raça definida', 'color' => 'Preta', 'city' => 'Curitiba', 'neighborhood' => 'Água Verde', 'status' => 'lost', 'description' => 'Gata pequena com olhos verdes e pelo curto. Exemplo fictício para demonstração.'],
            ['name' => 'Sol', 'species' => 'other', 'breed' => 'Calopsita', 'color' => 'Amarela e cinza', 'city' => 'Campinas', 'neighborhood' => 'Taquaral', 'status' => 'found', 'description' => 'Ave encontrada em uma área residencial. Exemplo fictício para demonstração.'],
        ];

        foreach ($examples as $i => $example) {
            PetReport::firstOrCreate(['name' => $example['name'], 'city' => $example['city']], $example + ['last_seen_at' => today()->subDays($i + 1)]);
        }
    }
}
