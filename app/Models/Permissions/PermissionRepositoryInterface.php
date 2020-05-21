<?php
namespace App\Models\Permissions;

interface PermissionRepositoryInterface
{
    public function getAllListPermission($condition=array());

    public function delete($id);
}