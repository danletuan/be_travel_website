<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Adventure Travel', 'Beach', 'Explore World', 'Family Holidays', 'Art and Culture'];

        for ($i = 1; $i <= 9; $i++) {
            DB::table('news')->insert([
                'title' => 'Sample News Title ' . $i,
                'image' => 'images/News/image' . $i . '.png',
                'category' => $categories[array_rand($categories)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
