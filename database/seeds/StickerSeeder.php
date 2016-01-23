<?php

use Illuminate\Database\Seeder;

class StickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stickers')->insert([
          'id' => 0,
          'url' => ""
        ]);
        for($i=1;$i<10;$i++){
          DB::table('stickers')->insert([
            'url' => "uploads/stickers/$i.png" // this is weird the url function doesn't seem to work properly here
          ]);
        }

    }
}
