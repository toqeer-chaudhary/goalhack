<?php

use Illuminate\Database\Seeder;

use App\Models\Kpi;
class KPITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->kpi();
    }
    public function kpi()
    {
        Kpi::insert([
            'strategy_id'     => 1 ,
            'user_id'       => 4 ,
            'name'          => 'Higher Seles staff' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'target'        => 100 ,
//            'status'        => 'In Progress',
//            'is_assigned'   => 'Assigned',
            'start_date'    => '2016-6-18' ,
            'end_date'      => '2017-6-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        Kpi::insert([
            'strategy_id'     => 1 ,
            'user_id'       => 6 ,
            'name'          => 'Increase sales by 50%' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'target'        => 100000 ,
//            'status'        => 'In Progress',
//            'is_assigned'   => 'Assigned',
            'start_date'    => '2016-5-18' ,
            'end_date'      => '2017-5-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        Kpi::insert([
            'strategy_id'     => 1 ,
            'user_id'       => 6 ,
            'name'          => 'Invest in marketing' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'target'        => 50 ,
//            'status'        => 'In Progress',
//            'is_assigned'   => 'Assigned',
            'start_date'    => '2016-3-18' ,
            'end_date'      => '2017-11-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        Kpi::insert([
            'strategy_id'     => 2 ,
            'user_id'       => 7 ,
            'name'          => 'Seminar Conduct' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'target'        => 3 ,
//            'status'        => 'In Progress',
//            'is_assigned'   => 'Assigned',
            'start_date'    => '2016-8-18' ,
            'end_date'      => '2017-5-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        Kpi::insert([
            'strategy_id'     => 2 ,
            'user_id'       => 7 ,
            'name'          => 'TV Commercial' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'target'        => 1000 ,
//            'status'        => 'In Progress',
//            'is_assigned'   => 'Assigned',
            'start_date'    => '2017-2-18' ,
            'end_date'      => '2018-2-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        Kpi::insert([
            'strategy_id'     => 3 ,
            'user_id'       => 8 ,
            'name'          => 'Talk to people' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'target'        => 100 ,
//            'status'        => 'In Progress',
//            'is_assigned'   => 'Assigned',
            'start_date'    => '2018-7-18' ,
            'end_date'      => '2019-7-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        Kpi::insert([
            'strategy_id'     => 3 ,
            'user_id'       => 8 ,
            'name'          => 'ABC Kpi' ,
            'description'   => 'Conduct 3 seminars in next 3 months',
            'target'        => 10 ,
//            'status'        => 'In Progress',
//            'is_assigned'   => 'Assigned',
            'start_date'    => '2019-2-18' ,
            'end_date'      => '2020-5-18' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

    }
}
