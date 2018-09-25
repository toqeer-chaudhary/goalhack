<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignKpiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->assignKpi();
    }

    public function assignKpi()
    {
        DB::table('kpi_user')->insert([
            'id' => 1,
            'user_id' => 8,
            'kpi_id' => 1,
            'manager_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kpi_user')->insert([
            'id' => 2,
            'user_id' => 9,
            'kpi_id' => 1,
            'manager_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kpi_user')->insert([
            'id' => 3,
            'user_id' => 8,
            'kpi_id' => 2,
            'manager_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kpi_user')->insert([
            'id' => 4,
            'user_id' => 9,
            'kpi_id' => 2,
            'manager_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kpi_user')->insert([
            'id' => 5,
            'user_id' => 10,
            'kpi_id' => 3,
            'manager_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
