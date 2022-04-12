<?php

use App\Advertising;

use Illuminate\Database\Seeder;

class AdvertisingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisingPlans = [
            ["duration" => 24, "price" => 2, 99],
            ["duration" => 72, "price" => 5, 99],
            ["duration" => 144, "price" => 9, 99],

        ];
        foreach ($advertisingPlans as $advertisingPlan) {
            $newAdv = new Advertising();
            $newAdv->duration = $advertisingPlan["duration"];
            $newAdv->price = $advertisingPlan["price"];
            $newAdv->save();
        }
    }
}
