<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Models\Permissions\Permission;
use App\Models\Permissions\PermissionRepository;
use Carbon\Carbon;

class ManagePermissionController extends Controller
{
    public $table ;
    public $permissionRepository;
    public function __construct(Permission $permission, PermissionRepository $permissionRepository)
    {
        $this->table               = $permission;
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // đưa các điều kiện vào mảng
        $filter = [];

        $request->name  ? $filter['query'][] = ['name','like','%'.$request->name.'%' ] : '';
        $request->group_permission_id    ? $filter['query'][] = ['group_permission_id','=',$request->group_permission_id] : '';

        $filter['with'] = [
            'groups' => [
                'select' => [
                    'id','name'
                ],
            ]
        ];
        $permissions = $this->permissionRepository->getAllListPermission($filter);
        $viewData = [
            'permissions'  => $permissions,
            'groupPermission' => $this->table->getListGroupPermission(),
            'query' => $request->query()
        ];
        return view('backend/modules/permissions/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get view
        $groupPermission = $this->table->getListGroupPermission();
        return view('backend/modules/permissions/add', compact('groupPermission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionsRequest $request)
    {
        //
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        try {
            Permission::insert($data);
            return redirect()->back()->with('success', trans('message_vn.text_create_success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', trans('message_vn.text_create_errors'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permission = Permission::find($id);
        if(!$permission) {
            return redirect()->route('ManageListPermission')->with('danger', trans('message_vn.text-empty'));
        }
        $viewData = [
            'permission'  => $permission,
            'groupPermission' => $this->table->getListGroupPermission(),
        ];
        return view('backend/modules/permissions/edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionsRequest $request, $id)
    {
        //
        $permission = Permission::find($id);
        if(!$permission) {
            return redirect()->route('ManageListPermission')->with('danger', trans('message_vn.text-empty'));
        }
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();

        try {
            $permission->update($data);
            return redirect()->back()->with('success', trans('message_vn.text_update-success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', trans('message_vn.text_update-errors'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $permission = Permission::find($id);
        if(!$permission) {
            return redirect()->back()->with('danger', trans('message_vn.text-empty'));
        }
        try{
            $this->permissionRepository->delete($id);
            return redirect()->back()->with('success', trans('message_vn.text_delete-success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', trans('message_vn.text-delete_errors'));
        }

    }

    public function deleteMultiple(Request $request) {

        foreach($request->ids as $id) {
            $this->permissionRepository->delete($id);
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }
}
