<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use League\Csv\Reader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->count(10)->create();
        // Category::factory()->count(5)->active()->create();

        $csv = Reader::createFromPath(database_path('seeders/categories.csv'));
        $csv->setHeaderOffset(0);

        $csv->each(function ($record) {
            Category::createOrFirst([
                'name' => $record['name'],
                'description' => $record['description'],
                'is_active' => (bool) $record['is_active'],
            ]);
        });
    }
}
