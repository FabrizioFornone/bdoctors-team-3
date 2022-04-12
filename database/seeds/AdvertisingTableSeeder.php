<?php

use App\Advertising;
use Illuminate\Database\Seeder;

class AdvertisingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Adverisings = [
            ["duration" => 24, "price" => 2.99],
            ["duration" => 72, "price" => 5.99],
            ["duration" => 144, "price" => 9.99],
        ];
        foreach ($Adverisings as $Advertising) {
            $newAdv = new Advertising();
            $newAdv->duration = $Advertising["duration"];
            $newAdv->price = $Advertising["price"];
            $newAdv->save();
        }
    }
}
