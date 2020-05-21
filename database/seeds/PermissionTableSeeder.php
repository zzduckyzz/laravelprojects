<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('permissions')->insert([
        	array('id' => '1','name' => 'them-danh-muc','display_name' => 'Thêm mới danh mục','description' => 'Thêm mới danh mục','group_permission_id' => '1','created_at' => '2019-03-19 00:56:20','updated_at' => '2019-03-19 01:03:17'),
			array('id' => '2','name' => 'chinh-sua-danh-muc','display_name' => 'Chỉnh sửa danh mục','description' => 'Chỉnh sửa danh mục','group_permission_id' => '1','created_at' => '2019-03-19 00:59:30','updated_at' => '2019-03-19 01:03:37'),
			array('id' => '3','name' => 'xoa-danh-muc','display_name' => 'Xóa danh mục','description' => 'Xóa danh mục','group_permission_id' => '1','created_at' => '2019-03-19 01:00:43','updated_at' => '2019-03-19 01:03:59'),
			array('id' => '4','name' => 'cap-nhat-trang-thai-danh-muc','display_name' => 'Cập nhật trạng thái danh mục','description' => 'Cập nhật trạng thái danh mục','group_permission_id' => '1','created_at' => '2019-03-19 01:01:32','updated_at' => '2019-03-19 01:04:33'),
			array('id' => '5','name' => 'danh-sach-danh-muc','display_name' => 'Danh sách danh mục','description' => 'Danh sách danh mục','group_permission_id' => '1','created_at' => '2019-03-19 01:02:47','updated_at' => '2019-03-19 01:17:17'),
			array('id' => '6','name' => 'them-bai-viet','display_name' => 'Thêm bài viết','description' => 'Thêm bài viết','group_permission_id' => '2','created_at' => '2019-03-19 01:05:08','updated_at' => '2019-03-19 01:05:08'),
			array('id' => '7','name' => 'chinh-sua-bai-viet','display_name' => 'Chỉnh sửa bài viết','description' => 'Chỉnh sửa bài viết','group_permission_id' => '2','created_at' => '2019-03-19 01:05:32','updated_at' => '2019-03-19 01:05:32'),
			array('id' => '8','name' => 'xoa-bai-viet','display_name' => 'Xóa bài viết','description' => 'Xóa bài viết','group_permission_id' => '2','created_at' => '2019-03-19 01:06:38','updated_at' => '2019-03-19 01:06:38'),
			array('id' => '9','name' => 'duyet-bai-viet','display_name' => 'Duyệt bài viết','description' => 'Duyệt bài viết','group_permission_id' => '2','created_at' => '2019-03-19 01:07:00','updated_at' => '2019-03-19 01:07:00'),
			array('id' => '10','name' => 'danh-sach-bai-viet','display_name' => 'Danh sách bài viết','description' => 'Danh sách bài viết','group_permission_id' => '2','created_at' => '2019-03-19 01:07:55','updated_at' => '2019-03-19 01:07:55'),
			array('id' => '11','name' => 'them-nguoi-dung','display_name' => 'Thêm người dùng','description' => 'Thêm người dùng','group_permission_id' => '3','created_at' => '2019-03-19 01:14:44','updated_at' => '2019-03-19 01:14:44'),
			array('id' => '12','name' => 'chinh-sua-nguoi-dung','display_name' => 'Chỉnh sửa người dùng','description' => 'Chỉnh sửa người dùng','group_permission_id' => '3','created_at' => '2019-03-19 01:15:04','updated_at' => '2019-03-19 01:15:04'),
			array('id' => '13','name' => 'xoa-nguoi-dung','display_name' => 'Xóa người dùng','description' => 'Xóa người dùng','group_permission_id' => '3','created_at' => '2019-03-19 01:15:42','updated_at' => '2019-03-19 01:15:42'),
			array('id' => '14','name' => 'update-trang-thai-nguoi-dung','display_name' => 'Update trạng thái người dùng','description' => 'Update trạng thái người dùng','group_permission_id' => '3','created_at' => '2019-03-19 01:16:27','updated_at' => '2019-03-19 01:16:27'),
			array('id' => '15','name' => 'danh-sach-nguoi-dung','display_name' => 'Danh sách người dùng','description' => 'Danh sách người dùng','group_permission_id' => '3','created_at' => '2019-03-19 01:16:49','updated_at' => '2019-03-19 01:16:49')
        ]);
    }
}
