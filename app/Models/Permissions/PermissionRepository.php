<?php
namespace App\Models\Permissions;
use App\Models\Permissions\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    private $model;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function getAllListPermission($condition=array(),$sort=array(),$paginate=true)
    {

        // TODO: Implement getAllListPermission() method.
        $permissions = Permission::select('*');

        // kiem tra xem co ton tai relationship hay k
        $with = array_get($condition,'with');
        if ($with)
        {
            foreach($with as $table => $itemWith)
            {
                $selectRela = array_get($itemWith,'select');
                if ($selectRela)
                {
                    $dataWith = [
                        $table => function($q) use ($selectRela)
                        {
                            $q->select($selectRela);
                        }
                    ];
                }
                $permissions  = $permissions->with($dataWith);
            }
        }

        $query = array_get($condition,'query');

        if ($query)
        {
            foreach($query as $value)
            {
                list($col, $ope, $val) = $value;
                $permissions = $permissions->where($col,$ope,$val);
            }
        }

        $select  = array_get($condition,'select');

        if ($select){
            $permissions = $permissions->Addselect($select);
        }

        $permissions = ($sort)   ? $permissions->orderBy($sort) : $permissions->orderBy('id','DESC');
        $permissions = $paginate ? $permissions->paginate(NUMBER_PAGE)   : $paginate->get();

        return $permissions;
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        return is_array($id) ? $this->model->destroy($id) : $this->getById($id)->delete();
    }
}