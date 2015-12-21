<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
          'name' => 'Life Before Us',
          'author' => 'Suhra Majeed',
          'month' => 1,
          'year' => 2016,
          'content' => ''
        ]);
    }
}
