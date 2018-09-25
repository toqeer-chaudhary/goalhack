<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use App\Models\GoalData;
use Illuminate\Database\Seeder;


class GoalDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->goalData();
    }

    public function goalData()
    {
        $faker = Faker\Factory::create();
        for ($i = 1 ;$i <= 20 ; $i++)
        {
            GoalData::insert([
                "id"                    => $i,
                'goal_id'              => mt_rand(1,2) ,
                'user_id'              => mt_rand(14,16) ,
                'actual_data'          => mt_rand(350,550),
                'comment'              => $faker->text ,
                'data_entry_date'      => "2018-".mt_rand(7,8)."-".mt_rand(1,29),
                'is_approved'          => 0,
            ]);
        }
    }
}
