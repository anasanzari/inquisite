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
        for($i=1;$i<10;$i++){
          DB::table('stickers')->insert([
            'url' => url("http://localhost/Openshift/inquisite/public/uploads/stickers/$i.jpg") // this is weird the url function doesn't seem to work properly here
          ]);
        }

    }
}
