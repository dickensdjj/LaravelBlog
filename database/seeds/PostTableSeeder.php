<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            'title' => 'Title 1',
            'Content' => '<p>This is a very firt post created by laravel seeder.</p>',
            'category' => 'Life',
            'tag' => 'HolyGood',
            'created_at' => date('Y-m-d','2000-12-1')
        ]);

        DB::table('posts')->insert([
            'title' => 'Title 2',
            'Content' => '<p>A good tutorial for a beginner who gonna to be a full-stack developer.</p>',
            'category' => 'Education',
            'tag' => 'IT Tutorial',
            'created_at' => date('Y-m-d','2000-12-2')
        ]);

        DB::table('posts')->insert([
            'title' => 'Title 3',
            'Content' => '<p>Drummer nerd learn to have attack over 1800 after taking <strong>pills</strong></p>',
            'category' => 'Entertainment',
            'tag' => 'MHW',
            'created_at' => date('Y-m-d','2000-12-3')
        ]);
    }
}
