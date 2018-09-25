<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';


use Illuminate\Database\Seeder;

use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user();
    }
    public  function user()
    {
//        $faker = Faker\Factory::create();
//        for ($i = 1; $i <= 20; $i++) {
//            User::insert([
//                'id' => $i,
//                'company_id' => mt_rand(1,3),
//                'level_id' => mt_rand(0,4),
//                'name' => $faker->name,
//                'last_name' => $faker->name,
//                'email' => $faker->email,
//                'designation' => 'QA',
//                'country' => $faker->country,
//                'province' => str_random(10),
//                'city' => $faker->city,
//                'address' => $faker->address,
//                'status'  => '1', //mt_rand(0,1)
//                'contact' => $faker->e164PhoneNumber,
//                'image' => mt_rand(1,4).".jpg",
//                'password' => Hash::make('zeeshan123'),
//                'created_at' => now(),
//                'updated_at' => now(),
//                'verify_token' => str_random(40),
//            ]);
        User::insert([
                'id' => 1,
                'company_id' => 1,
                'level_id' => 0,
                'name' => "Virtual University",
                'email' => "vu@gmail.com",
                'designation' => 'Admin',
                'country' => "Pakistan",
                'province' => "Punjab",
                'city' => "Lahore",
                'address' => "Lawrence road Lahore",
                'status'  => '1', //mt_rand(0,1)
                'contact' => "03016245267",
                'image' => mt_rand(1,4).".jpg",
                'password' => Hash::make('admin123'),
                'stripe_id' =>"vustripe",
                'created_at' => now(),
                'updated_at' => now(),
                'verify_token' => str_random(40),
            ]);

        User::insert([
            'id' => 2,
            'company_id' => 1,
            'level_id' => 1,
            'name' => "Ali",
            'last_name' => "iqbal",
            'email' => "ali@gmail.com",
            'designation' => 'ceo',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 3,
            'company_id' => 1,
            'level_id' => 1,
            'name' => "Alia",
            'last_name' => "imran",
            'email' => "alia@gmail.com",
            'designation' => 'ceo',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 4,
            'company_id' => 1,
            'level_id' => 2,
            'name' => "Toqeer",
            'last_name' => "chaudhary",
            'email' => "toqeer@gmail.com",
            'designation' => 'cfo',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 5,
            'company_id' => 1,
            'level_id' => 2,
            'name' => "sana",
            'last_name' => "Rasool",
            'email' => "sana@gmail.com",
            'designation' => 'cfo',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);
        User::insert([
            'id' => 6,
            'company_id' => 1,
            'level_id' => 3,
            'name' => "saba",
            'last_name' => "Rasool",
            'email' => "saba@gmail.com",
            'designation' => 'Manager',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);
        User::insert([
            'id' => 7,
            'company_id' => 1,
            'level_id' => 3,
            'name' => "Tahira",
            'last_name' => "Rasool",
            'email' => "tahira@gmail.com",
            'designation' => 'manager',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 8,
            'company_id' => 1,
            'level_id' => 4,
            'name' => "Maria",
            'last_name' => "Saleem",
            'email' => "maria@gmail.com",
            'designation' => 'Assistent manager',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 9,
            'company_id' => 1,
            'level_id' => 4,
            'name' => "Hoor",
            'last_name' => "Hashir",
            'email' => "hoor@gmail.com",
            'designation' => 'Assistent manager',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 10,
            'company_id' => 1,
            'level_id' => 5,
            'name' => "Noor",
            'last_name' => "ali",
            'email' => "noor@gmail.com",
            'designation' => 'teamlead',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 11,
            'company_id' => 1,
            'level_id' => 5,
            'name' => "zeeshan",
            'last_name' => "tanveer",
            'email' => "zeeshan@gmail.com",
            'designation' => 'teamlead',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);
        User::insert([
            'id' => 12,
            'company_id' => 1,
            'level_id' => 6,
            'name' => "Anaya",
            'last_name' => "khan",
            'email' => "anaya@gmail.com",
            'designation' => 'QA',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 13,
            'company_id' => 1,
            'level_id' => 6,
            'name' => "Amina",
            'last_name' => "majeed",
            'email' => "amina@gmail.com",
            'designation' => 'QA',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 14,
            'company_id' => 1,
            'level_id' => 7,
            'name' => "Muazzam",
            'last_name' => "ali",
            'email' => "muazzam@gmail.com",
            'designation' => 'QA',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 15,
            'company_id' => 1,
            'level_id' => 7,
            'name' => "Aftab",
            'last_name' => "Chaudhary",
            'email' => "aftab@gmail.com",
            'designation' => 'QA',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);


        User::insert([
            'id' => 16,
            'company_id' => 1,
            'level_id' => 7,
            'name' => "Ayesha",
            'last_name' => "khan",
            'email' => "ayesha@gmail.com",
            'designation' => 'QA',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);




        User::insert([
            'id' => 17,
            'company_id' => 2,
            'level_id' => 0,
            'name' => "abc Company",
            'email' => "abc@gmail.com",
            'designation' => 'Admin',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "canal road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245269",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 18,
            'company_id' => 2,
            'level_id' => 8,
            'name' => "Rehan",
            'last_name' => "Zafar",
            'email' => "rehan@gmail.com",
            'designation' => 'CEO',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "canal road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245269",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 19,
            'company_id' => 2,
            'level_id' => 8,
            'name' => "johar",
            'last_name' => "zaman",
            'email' => "johar@gmail.com",
            'designation' => 'CEO',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "canal road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245269",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);
        User::insert([
            'id' => 20,
            'company_id' => 2,
            'level_id' => 9,
            'name' => "zahid",
            'last_name' => "Ali",
            'email' => "Zahid@gmail.com",
            'designation' => 'Manager',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "canal road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245269",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 21,
            'company_id' => 2,
            'level_id' => 9,
            'name' => "Hussnain",
            'last_name' => "Ali",
            'email' => "Hussnain@gmail.com",
            'designation' => 'Manager',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "canal road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245269",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);

        User::insert([
            'id' => 22,
            'level_id' => 0,
            'name' => "Sheraz",
            'last_name' => "Pervaiz",
            'email' => "Goalhack@gmail.com",
            'designation' => 'SuperAdmin',
            'country' => "Pakistan",
            'province' => "Punjab",
            'city' => "Lahore",
            'address' => "Lawrence road Lahore",
            'status'  => '1', //mt_rand(0,1)
            'contact' => "03016245267",
            'image' => mt_rand(1,4).".jpg",
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'verify_token' => str_random(40),
        ]);
        }

}
