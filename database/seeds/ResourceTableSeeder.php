<?php

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
{
    public function run()
    {
        $this->resource();
    }

    public function resource()
    {
        Resource::insert([
            'company_id'        => 1,
            'controller_name'   => 'CompanyController' ,
            'controller_action' => "index" ,
            'node_id'           => "j1_3" ,
            "parent_id"         => "j1_1" ,
        ]);
        Resource::insert([
            'company_id'        => 1,
            'controller_name'   => 'LevelController' ,
            'controller_action' => "create" ,
            'node_id'           => "j1_103" ,
            "parent_id"         => "j1_100" ,
        ]);
        Resource::insert([
            'company_id'        => 3,
            'controller_name'   => 'StrategyController' ,
            'controller_action' => "update" ,
            'node_id'           => "j1_190" ,
            "parent_id"         => "j1_182" ,
        ]);
        Resource::insert([
            'company_id'        => 2,
            'controller_name'   => 'VisionController' ,
            'controller_action' => "show" ,
            'node_id'           => "j1_227" ,
            "parent_id"         => "j1_222" ,
        ]);
    }
}
