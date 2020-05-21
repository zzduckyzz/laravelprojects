<?php

namespace App\Models\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Models\Roles\Role;
use App\Helpers\HelpersFun;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'sex', 'password','phone','avatar','address', 'status', 'created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userRole()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    /*
     * get list all info user
     * @param request
     * return array
     */
    public function getlistUser($req)
    {
        $users = $this->select('*')->with('userRole');
        if($req->name) {
            $users = $users->where('name','like','%'.$req->name.'%');
        }
        if($req->email) {
            $users = $users->where('email','like','%'.$req->name.'%');
        }
        if($req->status) {
            $users = $users->where('status', $req->status);
        }

        $users = $users->orderBy('id', 'DESC')->paginate(NUMBER_PAGE);
        return $users;
    }

    /*
     * get all role
     * @param
     * @return array
     */

    public function getAllRole()
    {
        return Role::all();
    }

    /*
     * update info user
     * @param $request
     * @return boolean
     */
    public function updateUser($data, $id)
    {

        $dataUser = $data->except('_token', 'roles', 'images', 'id');
        $user = User::find($id);
        if(!$user) {
            return false;
        }
        if($data->hasFile('images')) {
            HelpersFun::deleteImage($user->avatar);
            $avatar = HelpersFun::saveImage($data->file('images'), 'users', ['width' => 200, 'height' => 300]);
            if(!$avatar) {
                return false;
            }
            $dataUser['avatar'] = $avatar;
        }
        $dataUser['updated_at'] = \Carbon\Carbon:: now();
        
        try {
            $user->update($dataUser);

            if(isset($data->roles) && !empty($data->roles)) {
                \DB::table('role_user')->where('user_id', $id)->delete();
                foreach($data->roles as $role) {
                    \DB::table('role_user')->insert(['role_id'=> $role, 'user_id'=> $id]);
                }
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*
     * delete one user
     * @param id role
     * @return boolean
     */

    public function destroyUser($id)
    {
        $user = $this->find($id);
        if(!$user) {
            return false;
        }
        try {
            $user->delete(['id'=>$id]);
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}
