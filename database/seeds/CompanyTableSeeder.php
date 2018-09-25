<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Str;
class CompanyTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->company();
    }
    public function company()
    {
        Company::insert([

            'id'        => 1                    ,
            'name'      => 'Virtual University' ,
            'email'     => 'vu@gmail.com'       ,
            'address'   => 'Lawrance Lahore'    ,
            'contact'   => '123456789'          ,
            'website'   => 'www.vu.edu.pk'      ,
            'city'      => 'Lahore'             ,
            'province'  => 'Punjab'             ,
            'country'   => 'Pakistan'           ,
            'created_at' => now()               ,
            'updated_at' => now()               ,

        ]);

        Company::insert([
            'id'         => 2                   ,
            'name'       => 'ABC Company'       ,
            'email'      => 'abc@gmail.com'     ,
            'address'    => 'Lawrance Lahore'   ,
            'contact'    => '123456789'         ,
            'website'    => 'www.abc.com'       ,
            'city'       => 'Lahore'            ,
            'province'   => 'Punjab'            ,
            'country'    => 'Pakistan'          ,
            'created_at' => now()               ,
            'updated_at' => now()               ,
        ]);
//        Company::insert([
//            'name'     => 'Netsol Technologix' ,
//            'email'       => 'netsol@gmail.com' ,
//            'address'          => 'Gulberg Lahore' ,
//            'contact'          => '123456789' ,
//            'website'          => 'www.netsol.pk' ,
//            'city'          => 'Lahore' ,
//            'province'          => 'Punjab' ,
//            'country'          => 'Pakistan' ,
//        ]);
//        Company::insert([
//            'name'     => 'ABC Company' ,
//            'email'       => 'abc@gmail.com' ,
//            'address'          => 'Lawrance Lahore' ,
//            'contact'          => '123456789' ,
//            'website'          => 'www.abc.com' ,
//            'city'          => 'Lahore' ,
//            'province'          => 'Punjab' ,
//            'country'          => 'Pakistan' ,
//        ]);

    }
}
