<?php

use Illuminate\Database\Seeder;
use App\Models\Vision;
class VisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->vision();
    }
    public function vision()
    {
        Vision::insert([
                'company_id'      => 1,
                'name'         =>'Alpha',
                'target'       =>'2000000',
                'description' => 'I am description',
                'start_date'   =>'2016-5-18',
                'end_date'     =>'2018-5-18',
                 'created_at' => now()               ,
                 'updated_at' => now()               ,

        ]);

        Vision::insert([
            'company_id'      => 1,
            'name'         =>'Beta',
            'target'       =>'20000',
            'description' => 'I am description',
            'start_date'   =>'2018-5-18',
            'end_date'     =>'2020-5-18',
            'created_at' => now()               ,
            'updated_at' => now()               ,

        ]);
    }
}
