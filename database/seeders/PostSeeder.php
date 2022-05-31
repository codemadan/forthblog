<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($i=0; $i < 100000; $i++){
            $post = DB::table('posts')->insert(
                [
                    'Title' => Str::random(10),
                    'slug' => str_replace(' ', '-', Str::lower(Str::random(10))),
                    'Content' => Str::random(100),
                    'created_at' => now()->subDays(rand(1, 1000))->format('Y-m-d H:i:s'),
                    'updated_at' => now(),
                ]
            );
            for($j = 0; $j < rand(1, 5); $j++){
                DB::table('post_category')->insert(
                    [
                        'post_id' => $i,
                        'category_id' => rand(1, 5),
                    ]
                );
            }
        }
    }
}
