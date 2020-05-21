<?php

use Illuminate\Database\Seeder;

class GroupPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('group_permission')->insert([
        	array('id' => '1','name' => 'Danh mục bài viết','description' => 'Danh mục bài viết','created_at' => '2019-03-19 00:48:12','updated_at' => '2019-03-19 01:08:33'),
			array('id' => '2','name' => 'Bài viết','description' => 'Bài viết','created_at' => '2019-03-19 00:48:48','updated_at' => '2019-03-19 01:08:20'),
			array('id' => '3','name' => 'Người dùng','description' => 'Người dùng','created_at' => '2019-03-19 01:14:14','updated_at' => '2019-03-19 01:14:14')
        ]);
    }
}
