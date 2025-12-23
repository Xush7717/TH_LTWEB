<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'High Grade (HG)',
                'description' => 'High Grade Gunpla models featuring good detail and articulation at an affordable price point.',
                'scale' => '1/144',
            ],
            [
                'name' => 'Real Grade (RG)',
                'description' => 'Real Grade models with exceptional detail and realistic proportions in 1/144 scale.',
                'scale' => '1/144',
            ],
            [
                'name' => 'Master Grade (MG)',
                'description' => 'Master Grade kits with advanced inner frames, superior detail, and impressive articulation.',
                'scale' => '1/100',
            ],
            [
                'name' => 'Perfect Grade (PG)',
                'description' => 'Perfect Grade represents the pinnacle of Gunpla engineering with massive size and intricate detail.',
                'scale' => '1/60',
            ],
            [
                'name' => 'Super Deformed (SD)',
                'description' => 'Cute, chibi-style Gundam models with exaggerated proportions and simplified construction.',
                'scale' => 'Non-scale',
            ],
            [
                'name' => 'Tools / Accessories',
                'description' => 'Essential modeling tools, paints, and accessories for building and customizing Gunpla.',
                'scale' => null,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
