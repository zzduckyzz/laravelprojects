<?php
namespace App\Models\Permissions;

use Zizaco\Entrust\EntrustPermission;
use App\Models\GroupPermission\GroupPermission;

class Permission extends EntrustPermission
{
    //
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'display_name', 'description', 'group_permission_id', 'created_at','updated_at'
    ];

    public function groups()
    {
        return $this->belongsTo(GroupPermission::class,'group_permission_id','id');
    }
    /*
     * get list group permision
     */
    public function getListGroupPermission()
    {
        return GroupPermission::select('id', 'name')->orderBy('id', 'ASC')->get();

    }
}
