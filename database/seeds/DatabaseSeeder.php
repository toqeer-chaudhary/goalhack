<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LicenceTableSeeder::class);
        $this->call(VisionTableSeeder::class);
        $this->call(StrategyTableSeeder::class);
        $this->call(KPITableSeeder::class);
        $this->call(GoalTableSeeder::class);
        $this->call(GoalDataTableSeeder::class);
        $this->call(ResourceTableSeeder::class);
        $this->call(AssignVisionTableSeeder::class);
        $this->call(AssignStrategyTableSeeder::class);
        $this->call(AssignKpiTableSeeder::class);
        $this->call(AssignGoalTableSeeder::class);
        $this->call(LocationTableSeeder::class);
    }
}
