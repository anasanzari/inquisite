<?php

use Illuminate\Database\Seeder;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
          DB::table('stories')->insert([
            'userid' => '4',
            'person' => 'Anas',
            'place' => 'RajPath',
            'stickerid' => 1,
            'content' => 'Random'.$i
          ]);
        }

    }
}
