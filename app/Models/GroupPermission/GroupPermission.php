<?php

namespace App\Models\GroupPermission;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permissions\Permission;

class GroupPermission extends Model
{
    //
    protected $table = 'group_permission';

    protected $fillable = [
        'name', 'description','created_at','updated_at'
    ];

    public function permissions() {
        return $this->hasMany(Permission::class, 'group_permission_id','id');
    }


}
