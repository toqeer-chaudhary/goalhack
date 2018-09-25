<?php

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->location();
    }

    public function location()
    {
        for ($i = 1 ; $i <= 20 ; $i++ )
        {
            Location::insert([
            'user_id' => mt_rand(14,16),
            'goaldatas_id' => $i,
            'latitude'=> mt_rand(31,40).".".mt_rand(10000000,40000000),
            'longitude' => mt_rand(74,80).".".mt_rand(60000000,70000000),
            'city_name' => "Lahore",
            ]);
        }
    }
}
