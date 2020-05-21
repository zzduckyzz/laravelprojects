<?php

Route::group(['namespace'=>'Auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('login', ['uses' => 'LoginController@login'])->name('login');
        Route::post('login', ['uses' => 'LoginController@postLogin']);
        Route::get('logout', ['uses' => 'LoginController@logoutUser'])->name('logout');
    });
});

Route::group(['namespace'=> 'Backend', 'middleware' =>['auth']], function () {

    Route::get('home',[ 'uses'=>'ManageHomeController@index'])->name('HomeIndex');
    // nhóm route quản lý nhóm quyền
    Route::group(['prefix' => 'group-permissions'], function () {
        Route::get('list-group-permissions' , ['uses' => 'ManageGroupPermissionController@index'])->name('ManageListGroupPermission');
        Route::get('create-group-permission' , ['uses' => 'ManageGroupPermissionController@create'])->name('createGroupPermission');
        Route::post('create-group-permission' , ['uses' => 'ManageGroupPermissionController@store']);
        Route::get('edit-group-permission/{id}' , ['uses' => 'ManageGroupPermissionController@edit'])->name('editGroupPermission');
        Route::post('edit-group-permission/{id}' , ['uses' => 'ManageGroupPermissionController@update'])->name('editGroupPermission');
        Route::get('delete-group-permission/{id}', ['uses' => 'ManageGroupPermissionController@destroy'])->name('deleteGroupPermission');
        Route::post('delete-multiple-group-permissions', ['uses' => 'ManageGroupPermissionController@deleteMultiple'])->name('deleteMultipleGroupPermission');
    });
    // nhóm route quản lý  quyền của từng người dùng
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('list-permissions' , ['uses' => 'ManagePermissionController@index'])->name('ManageListPermission');
        Route::get('create-permission' , ['uses' => 'ManagePermissionController@create'])->name('createPermission');
        Route::post('create-permission' , ['uses' => 'ManagePermissionController@store']);
        Route::get('edit-permission/{id}', ['uses' => 'ManagePermissionController@edit'])->name('editPermission');
        Route::post('edit-permission/{id}', ['uses' => 'ManagePermissionController@update'])->name('editPermission');
        Route::get('delete-permission/{id}', ['uses' => 'ManagePermissionController@destroy'])->name('deletePermission');
        Route::post('delete-multiple-permissions', ['uses' =>  'ManagePermissionController@deleteMultiple'])->name('deleteMultiplePermission');
    });
    // Nhóm route quản lý vai trò của người dùng
    Route::group(['prefix' => 'roles'], function() {
        Route::get('list-roles' , ['uses' => 'ManageRolesController@index'])->name('ManageListRole');
        Route::get('create-role' , ['uses' => 'ManageRolesController@create'])->name('createRole');
        Route::post('create-role' , ['uses' => 'ManageRolesController@store']);
        Route::get('edit-role/{id}', ['uses' => 'ManageRolesController@edit'])->name('editRole');
        Route::post('edit-role/{id}', ['uses' => 'ManageRolesController@update'])->name('editRole');
        Route::get('delete-role/{id}', ['uses' => 'ManageRolesController@destroy'])->name('deleteRole');
        Route::post('delete-multiple-roles', ['uses' =>  'ManageRolesController@deleteMultiple'])->name('deleteMultipleRoles');
    });
    // nhóm route quản lý người dùng
    Route::group(['prefix' => 'users'], function() {
        Route::get('list-users' , ['uses' => 'ManageUserController@index'])
            ->name('ManageListUser')->middleware('permission:danh-sach-nguoi-dung');
        Route::get('edit-user/{id}', ['uses' => 'ManageUserController@edit'])
            ->name('editUser')->middleware('permission:chinh-sua-nguoi-dung');
        Route::post('edit-user/{id}', ['uses' => 'ManageUserController@update'])
            ->name('editUser');
        Route::get('delete-user/{id}', ['uses' => 'ManageUserController@destroy'])
            ->name('deleteUser')->middleware('permission:xoa-nguoi-dung');
        Route::post('delete-multiple-user', ['uses' => 'ManageUserController@deleteMultiple'])
            ->name('deleteMultipleUser')->middleware('permission:xoa-nguoi-dung');
        Route::post('update-status-user', ['uses' => 'ManageUserController@updateStatusUser'])
            ->name('updateStatusUser');
    });

    // Nhóm route quản lý danh mục sản phẩm
    Route::group(['prefix'=> 'categories'], function () {
        Route::get('list-categories', ['uses' => 'ManageCategoriesController@index'])
            ->name('ManageListCategories')->middleware('permission:danh-sach-danh-muc');
//            ->middleware('permission:list-categories');
        Route::get('create-categories', ['uses' => 'ManageCategoriesController@create'])
                ->name('createCategories')->middleware('permission:them-danh-muc');
        Route::post('create-categories', ['uses' => 'ManageCategoriesController@store']);
        Route::get('edit-categories/{id}', ['uses' => 'ManageCategoriesController@edit'])
            ->name('editCategories')->middleware('permission:chinh-sua-danh-muc');
        Route::post('edit-categories/{id}', ['uses' => 'ManageCategoriesController@update'])
            ->name('editCategories');
        Route::get('delete-categories/{id}', ['uses' => 'ManageCategoriesController@destroy'])
            ->name('deleteCategories')->middleware('permission:xoa-danh-muc');
        Route::post('delete-multiple-categories', ['uses' => 'ManageCategoriesController@deleteMultiple'])
            ->name('deleteMultipleCategories')->middleware('permission:xoa-danh-muc');
        Route::post('update-status-categories', ['uses' => 'ManageCategoriesController@updateStatus'])
            ->name('updateStatusCategories');
    });
   
    // quản lý bài viết tin tức
    Route::group(['prefix'=> 'news'], function () {
        Route::get('list-news', ['uses' => 'ManageNewController@index'])
            ->name('ManageListNews')->middleware('permission:danh-sach-bai-viet');
        Route::get('create-news', ['uses' => 'ManageNewController@create'])
            ->name('createNews')->middleware('permission:them-bai-viet');
        Route::post('create-news', ['uses' => 'ManageNewController@store']);
        Route::get('edit-news/{id}', ['uses' => 'ManageNewController@edit'])
            ->name('editNews')->middleware('permission:chinh-sua-bai-viet');
        Route::post('edit-news/{id}', ['uses' => 'ManageNewController@update'])
            ->name('editNews');
        Route::get('delete-news/{id}', ['uses' => 'ManageNewController@destroy'])
            ->name('deleteNews')->middleware('permission:xoa-bai-viet');
        Route::post('delete-multiple-news', ['uses' => 'ManageNewController@deleteMultiple'])
            ->name('deleteMultipleNews')->middleware('permission:xoa-bai-viet');
        Route::post('update-status-news', ['uses' => 'ManageNewController@updateStatus'])
            ->name('updateStatusNews');
    });

    

});
