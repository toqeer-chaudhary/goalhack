<?php

use Illuminate\Database\Seeder;
use App\Models\Goal;

class GoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->goal();
    }

    public function goal()
    {
        Goal::insert([
            'kpi_id'               => 1 ,
            'user_id'              => 10 ,
            'name'                 => 'Goal alpha' ,
            'target'               => 500 ,
            'goal_data_entry_mode' => 'Daily',
            'description' => 'Its Goal Description',
            'start_date'           => '2018-6-20' ,
            'end_date'             => '2018-8-20' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        Goal::insert([
            'kpi_id'               => 1 ,
            'user_id'              => 10 ,
            'name'                 => 'Goal Beta' ,
            'target'               => 100 ,
            'goal_data_entry_mode' => 'Daily',
            'description' => 'Its Goal Description',
            'start_date'           => '2018-7-10' ,
            'end_date'             => '2018-8-28' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        Goal::insert([
            'kpi_id'               => 2 ,
            'user_id'              => 11 ,
            'name'                 => 'Goal charlie' ,
            'target'               => 100 ,
            'goal_data_entry_mode' => 'Monthly',
            'description' => 'Its Goal Description',
            'start_date'           => '2018-1-22' ,
            'end_date'             => '2019-8-22' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        Goal::insert([
        'kpi_id'               => 2 ,
        'user_id'              => 11 ,
        'name'                 => 'Goal bravo' ,
        'target'               => 100 ,
        'goal_data_entry_mode' => 'weekly',
        'description' => 'Its Goal Description',
        'start_date'           => '2018-4-10' ,
        'end_date'             => '2018-8-10' ,
        'created_at'    => now(),
        'updated_at'    => now(),
    ]);

        Goal::insert([
            'kpi_id'               => 3 ,
            'user_id'              => 12 ,
            'name'                 => 'Goal brigade' ,
            'target'               => 100 ,
            'goal_data_entry_mode' => 'weekly',
            'description' => 'Its Goal Description',
            'start_date'           => '2018-4-10' ,
            'end_date'             => '2018-8-10' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        Goal::insert([
            'kpi_id'               => 1 ,
            'user_id'              => 10 ,
            'name'                 => 'Goal infantry' ,
            'target'               => 100 ,
            'goal_data_entry_mode' => 'weekly',
            'description' => 'Its Goal Description',
            'start_date'           => '2018-6-10' ,
            'end_date'             => '2018-8-10' ,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
