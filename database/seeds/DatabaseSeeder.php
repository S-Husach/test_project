<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    for ($i = 1; $i <= 10; $i++) {
        DB::table('donations')->insert([
            'name' => 'donator'.$i,
            'email' => 'donator'.$i.'@gmail.com',
            'amount' => rand(10,500).'.'.rand(0,99),
            'message' => 'Hi! Its a fake-user'.$i,
            'created_at' => '2020-'.rand(1,12).'-'.rand(1,30),
            ]
        );
        }
    }
}
