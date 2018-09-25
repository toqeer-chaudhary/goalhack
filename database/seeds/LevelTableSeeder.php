<?php

use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->level();
    }
    public function level()
    {
        Level::insert([
            'id'        => 1,
            'company_id' => 1,
            'name' =>'level1',
            'parent_id'=> null,
            'lft' => 1,
            'rgt' => 12,
            'depth' => 0,
            'description' =>'1st level',
        ]);

        Level::insert([
            'id'        => 2,
            'company_id' => 1,
            'name' =>'level2',
            'parent_id'=> null,
            'lft' => 13,
            'rgt' => 14,
            'depth' => 0,
            'description' =>'2nd level',
        ]);

        Level::insert([
            'id'        => 3,
            'company_id' => 1,
            'name' =>'level3',
            'parent_id'=> 1,
            'lft' => 2,
            'rgt' => 9,
            'depth' => 1,
            'description' =>'3rd level',
        ]);

        Level::insert([
            'id'        => 4,
            'company_id' => 1,
            'name' =>'level4',
            'parent_id'=> 1,
            'lft' => 10,
            'rgt' => 11,
            'depth' => 1,
            'description' =>'4th level',
        ]);

        Level::insert([
            'id'        => 5,
            'company_id' => 1,
            'name' =>'level5',
            'parent_id'=> 3,
            'lft' => 3,
            'rgt' => 6,
            'depth' => 2,
            'description' =>'5th level',
        ]);

        Level::insert([
            'id'        => 6,
            'company_id' => 1,
            'name' =>'level6',
            'parent_id'=> 3,
            'lft' => 7,
            'rgt' => 8,
            'depth' => 2,
            'description' =>'6th level',
        ]);

        Level::insert([
            'id'        => 7,
            'company_id' => 1,
            'name' =>'level7',
            'parent_id'=> 5,
            'lft' => 4,
            'rgt' => 5,
            'depth' => 3,
            'description' =>'7th level',
        ]);

        Level::insert([
            'id'        => 8,
            'company_id' => 2,
            'name' =>'level8',
            'parent_id'=> null,
            'depth' => 0,
            'description' =>'8th level',
        ]);

        Level::insert([
            'id'        => 9,
            'company_id' => 2,
            'name' =>'level9',
            'parent_id'=> 8,
            'depth' => 0,
            'description' =>'9th level',
        ]);

    }
}
