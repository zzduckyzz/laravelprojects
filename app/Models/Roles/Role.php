<?php

namespace App\Models\Roles;

use Zizaco\Entrust\EntrustRole;
use App\Models\Permissions\Permission;
use Illuminate\Support\Facades\Config;
use App\Models\GroupPermission\GroupPermission;
use Carbon\Carbon;

class Role extends EntrustRole
{
    //
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'display_name', 'description','created_at','updated_at'
    ];
    /*
     * The roles that belong to the roles.
     */
    public function permissionRole()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany(Config::get('auth.providers.users.model'),Config::get('entrust.role_user_table'),Config::get('entrust.role_foreign_key'),Config::get('entrust.user_foreign_key'));

    }

    /*
     * get list roles
     */
    public function getListAllRole()
    {
       return $this->select('*')->with('permissionRole')->orderBy('id', 'DESC')->paginate(NUMBER_PAGE);
    }

    /*
     * insert data roles
     * @param data array
     * @return boolean
     */
    public function insertRole($data)
    {
        // get data insert table role
        $dataRoles = $data->except('_token', 'permission', 'checkAll');
        $dataRoles['created_at'] = Carbon::now();
        $dataRoles['updated_at'] = Carbon::now();

        try {
            $id =  $this->insertGetId($dataRoles);
            // for data insert table permission_role
            if(!empty($data->permission)) {
                foreach($data->permission as $permission) {

                    \DB::table('permission_role')->insert(['permission_id'=> $permission, 'role_id'=> $id]);
                }
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    /*
     * update roles
     * @param data array
     * @return boolean
     */

    public function updateRole($data, $id) {

        $dataRoles = $data->except('_token', 'permission', 'checkAll');
        $dataRoles['updated_at'] = Carbon::now();
        try {
            $this->findOrFail($id)->update($dataRoles);
            \DB::table('permission_role')->where('role_id', $id)->delete();
            if(!empty($data->permission)) {
                foreach($data->permission as $permission) {

                    \DB::table('permission_role')->insert(['permission_id'=> $permission, 'role_id'=> $id]);
                }
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*
     * delete one roles
     * @param id role
     * @return boolean
     */

    public function destroyRole($id)
    {
        $role = $this->find($id);
        if(!$role) {
            return false;
        }
        try {
            $role->users()->sync([]);
            $role->perms()->sync([]);
            $role->forceDelete();
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
    /*
     * get list data permission
     * @param
     * @return array
     */

    public function getListPermission()
    {
        return GroupPermission::select('id', 'name')->with('permissions')->orderBy('id', 'ASC')->get();
    }

}
