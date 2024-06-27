<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'The Victoria',
                'price' => 374662,
                'bedroom_count' => 4,
                'bathroom_count' => 2,
                'storey_count' => 2,
                'garage_count' => 2,
            ],
            [
                'name' => 'The Xavier',
                'price' => 513268,
                'bedroom_count' => 4,
                'bathroom_count' => 2,
                'storey_count' => 1,
                'garage_count' => 2,
            ],
            [
                'name' => 'The Como',
                'price' => 454990,
                'bedroom_count' => 4,
                'bathroom_count' => 3,
                'storey_count' => 2,
                'garage_count' => 3,
            ],
            [
                'name' => 'The Aspen',
                'price' => 384356,
                'bedroom_count' => 4,
                'bathroom_count' => 2,
                'storey_count' => 2,
                'garage_count' => 2,
            ],
            [
                'name' => 'The Lucretia',
                'price' => 572002,
                'bedroom_count' => 4,
                'bathroom_count' => 3,
                'storey_count' => 2,
                'garage_count' => 2,
            ],
            [
                'name' => 'The Toorak',
                'price' => 521951,
                'bedroom_count' => 5,
                'bathroom_count' => 2,
                'storey_count' => 1,
                'garage_count' => 2,
            ],
            [
                'name' => 'The Skyscape',
                'price' => 263604,
                'bedroom_count' => 3,
                'bathroom_count' => 2,
                'storey_count' => 2,
                'garage_count' => 2,
            ],
            [
                'name' => 'The Clifton',
                'price' => 386103,
                'bedroom_count' => 3,
                'bathroom_count' => 2,
                'storey_count' => 1,
                'garage_count' => 1,
            ],
            [
                'name' => 'The Geneva',
                'price' => 390600,
                'bedroom_count' => 4,
                'bathroom_count' => 3,
                'storey_count' => 2,
                'garage_count' => 2,
            ],

        ])
            ->each(fn ($data) => Property::create($data));
    }
}
