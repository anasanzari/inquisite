<?php

use Illuminate\Database\Seeder;

class FbUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          DB::table('fb_users')->insert([
            'id' => '4',
            'name' => 'Mark Zuckerberg',
          ]);

    }
}
