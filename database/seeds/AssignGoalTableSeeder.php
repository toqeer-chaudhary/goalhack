<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignGoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->assignGoal();
    }

    public function assignGoal()
    {
        DB::table('goal_user')->insert([
            'id' => 1,
            'user_id' => 14,
            'goal_id' => 1,
            'manager_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_user')->insert([
            'id' => 2,
            'user_id' => 15,
            'goal_id' => 1,
            'manager_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_user')->insert([
            'id' => 3,
            'user_id' => 14,
            'goal_id' => 2,
            'manager_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_user')->insert([
            'id' => 4,
            'user_id' => 15,
            'goal_id' => 2,
            'manager_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_user')->insert([
            'id' => 5,
            'user_id' => 16,
            'goal_id' => 3,
            'manager_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
