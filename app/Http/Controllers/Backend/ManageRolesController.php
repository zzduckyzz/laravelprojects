<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Roles\Role;
use App\Http\Requests\RolesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ManageRolesController extends Controller
{
    public function __construct(Role $role)
    {

        $this->table = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $viewData = [
            'roles'  => $this->table->getListAllRole(),
            'query' => '',
        ];
        return view('backend/modules/roles/index', $viewData);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Session::has('listPermission')) {
            $listPermission = Session::get('listPermission');
            Session::forget('listPermission');
        } else {
            $listPermission = [];
        }
        $viewData =[
            'listPermission' => $listPermission,
            'dataPermissions' => $this->table->getListPermission(),
        ];
        return view('backend/modules/roles/add', $viewData);
    }

    /**
     *
     * insert data table rolse
     * @param  data $request
     * @return boolean
     */
    public function store(RolesRequest $request)
    {
        // data insert in table roles
        Session::forget('listPermission');
        if( $this->table->insertRole($request)) {
            return redirect()->route('ManageListRole')->with('success', trans('message_vn.text_create_success'));
        } else {
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
        $role = $this->table->find($id);

        $listPermissionRole = \DB::table('permission_role')->where('role_id', $id)->pluck('permission_id')->toArray();

        if(Session::has('listPermission')) {
            $listPermission = Session::get('listPermission');
            Session::forget('listPermission');
        } else {
            $listPermission = $listPermissionRole;
        }
        if(!$role) {
            return redirect()->route('ManageListRole')->with('danger', trans('message_vn.text-empty'));
        }
        $viewData =[
            'listPermission' => $listPermission,
            'dataPermissions' => $this->table->getListPermission(),
            'role' =>$role,
        ];

        return view('backend/modules/roles/edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, $id)
    {
        //
        Session::forget('listPermission');
        if($this->table->updateRole($request, $id)) {
            return redirect()->back()->with('success', trans('message_vn.text_update-success'));
        } else {
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
        if($this->table->destroyRole($id)) {
            return redirect()->back()->with('success', trans('message_vn.text_delete-success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text-delete_errors'));
        }
    }

    /*
     * delete All roles
     */

    public function deleteMultiple(Request $request) {

        foreach($request->ids as $id) {
            $this->table->destroyRole($id);
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }
}
