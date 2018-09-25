<?php

use App\Models\Licence;
use Illuminate\Database\Seeder;

class LicenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->license();
    }

    public function license()
    {
        Licence::insert([
            'id'              => 1            ,
            'company_id'      => 1            ,
            'licence_key'     => 'abc123'     ,
            'isExpire'        => 1            ,
            'created_at'      => now()        ,
            'updated_at'      => now()        ,
        ]);

        Licence::insert([
            'id'              => 2            ,
            'company_id'      => 2            ,
            'licence_key'     => 'abc123456'  ,
            'isExpire'        => 0            ,
            'created_at'      => now()        ,
            'updated_at'      => now()        ,
        ]);
    }
}
