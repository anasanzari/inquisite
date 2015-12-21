<?php

use Illuminate\Database\Seeder;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('interviews')->insert([
          'person' => 'Some One',
          'content' => 'One||@||Hello there||Q||Checking if works fine!||@||Yes it does'
        ]);
    }
}
