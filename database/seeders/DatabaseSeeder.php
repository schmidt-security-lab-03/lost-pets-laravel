<?php

namespace Database\Seeders;

use App\Models\PetReport;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $examples = [
            ['name' => 'Luna', 'species' => 'cat', 'breed' => 'Mixed breed', 'color' => 'Gray and white', 'city' => 'Northbridge', 'neighborhood' => 'Oak Park', 'status' => 'lost', 'description' => 'A friendly cat with a small white patch on her nose. Fictional demonstration record.'],
            ['name' => 'Benny', 'species' => 'dog', 'breed' => 'Mixed breed', 'color' => 'Tan', 'city' => 'Riverdale', 'neighborhood' => 'Riverside', 'status' => 'found', 'description' => 'A medium-sized dog found near a neighborhood park. Fictional demonstration record.'],
            ['name' => 'Nina', 'species' => 'dog', 'breed' => 'Beagle', 'color' => 'Tricolor', 'city' => 'Northbridge', 'neighborhood' => 'Maple Heights', 'status' => 'reunited', 'description' => 'A happy ending: this dog is back home. Fictional demonstration record.'],
            ['name' => 'Poppy', 'species' => 'cat', 'breed' => 'Mixed breed', 'color' => 'Black', 'city' => 'Maple Grove', 'neighborhood' => 'Green Valley', 'status' => 'lost', 'description' => 'A small, short-haired cat with green eyes. Fictional demonstration record.'],
            ['name' => 'Sunny', 'species' => 'other', 'breed' => 'Cockatiel', 'color' => 'Yellow and gray', 'city' => 'Riverdale', 'neighborhood' => 'Lakeview', 'status' => 'found', 'description' => 'A bird found in a residential area. Fictional demonstration record.'],
        ];

        foreach ($examples as $i => $example) {
            PetReport::firstOrCreate(['name' => $example['name'], 'city' => $example['city']], $example + ['last_seen_at' => today()->subDays($i + 1)]);
        }
    }
}
