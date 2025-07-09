<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Item::create([
                'name' => 'Item ' . Str::random(5),
                'price' => rand(10, 1000),
                'user_id' => 1, 
                'category_id' => 1, 
            ]);
        }
    }
}
