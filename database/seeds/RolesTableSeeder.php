<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('roles')->insert([
        	array('id' => '1','name' => 'Quản trị viên','description' => 'Duyệt bài quản lý người dùng','created_at' => '2020-03-19 02:01:03','updated_at' => '2020-03-19 02:01:03'),
  			array('id' => '2','name' => 'Người dùng','description' => 'Người dùng','created_at' => '2020-03-19 02:02:04','updated_at' => '2020-03-19 02:02:04')
        ]);
    }
}
