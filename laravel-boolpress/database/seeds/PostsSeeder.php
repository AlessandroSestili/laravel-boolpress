<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $title = $faker->sentence();

        DB::table('posts')->insert([
            'title' => $title,

            'content' => $faker->paragraph(),

            'slug' => Str::slug($title),
        ]);
    }
}
