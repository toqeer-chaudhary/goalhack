<?php

use Illuminate\Database\Seeder;
use App\Models\Strategy;

class StrategyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->strategy();
    }

    public function strategy()
    {
        Strategy::insert([
            'vision_id'     => 1 ,
            'user_id'       => 2 ,
            'name'          => 'Strategy Alpha' ,
            'description'   => 'Higher 100 marketing people in next two months',
            'start_date'    => '2016-6-18' ,
            'end_date'      => '2018-5-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        Strategy::insert([
            'vision_id'     => 1 ,
            'user_id'       => 2,
            'name'          => 'Strategy Bravo' ,
            'description'   => 'Increase sales by 50%',
            'start_date'    => '2016-6-18' ,
            'end_date'      => '2018-5-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        Strategy::insert([
            'vision_id'     => 2 ,
            'user_id'       => 3 ,
            'name'          => 'Awesome Strategy' ,
            'description'   => 'Invest in marketing',
            'start_date'    => '2018-6-18' ,
            'end_date'      => '2020-4-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        Strategy::insert([
            'vision_id'     => 2 ,
            'user_id'       => 4 ,
            'name'          => 'King Strategy' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'start_date'    => '2018-6-18' ,
            'end_date'      => '2020-4-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
