<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignStrategyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->assignStrategy();
    }

    public function assignStrategy()
    {
        DB::table('strategy_user')->insert([
            'id' => 1,
            'user_id' => 5,
            'strategy_id' => 1,
            'manager_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('strategy_user')->insert([
            'id' => 2,
            'user_id' => 6,
            'strategy_id' => 1,
            'manager_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('strategy_user')->insert([
            'id' => 3,
            'user_id' => 5,
            'strategy_id' => 2,
            'manager_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('strategy_user')->insert([
            'id' => 4,
            'user_id' => 6,
            'strategy_id' => 2,
            'manager_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('strategy_user')->insert([
            'id' => 5,
            'user_id' => 7,
            'strategy_id' => 3,
            'manager_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


}
