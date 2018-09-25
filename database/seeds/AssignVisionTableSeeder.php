<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignVisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->assignVision();
    }

    public function assignVision()
    {
        DB::table('user_vision')->insert([
            'id' => 1,
            'user_id' => 2,
            'vision_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_vision')->insert([
            'id' => 2,
            'user_id' => 3,
            'vision_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_vision')->insert([
            'id' => 3,
            'user_id' => 2,
            'vision_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_vision')->insert([
            'id' => 4,
            'user_id' => 3,
            'vision_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_vision')->insert([
            'id' => 5,
            'user_id' => 4,
            'vision_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
