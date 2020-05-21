<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'password' => bcrypt('12345678'),
                'phone' => '',
                'address' => '',
                'gender' => 1,
                'avatar' => '',
                'birthday' => \Carbon\Carbon::now(),
                'status' => '2',
                'remember_token' => str_random(10),
                'created_at'     => \Carbon\Carbon::now(),
                'updated_at'     => \Carbon\Carbon::now()
            ],
        ]);
    }
}
