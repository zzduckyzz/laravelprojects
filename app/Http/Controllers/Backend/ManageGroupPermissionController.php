<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupPermission\GroupPermission;
use App\Http\Requests\GroupPermissionRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ManageGroupPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groupPermission = GroupPermission::orderBy('id', 'DESC')->paginate(NUMBER_PAGE);
        $viewData = [
            'groupPermission'  => $groupPermission,
            'query' => '',
        ];
        return view('backend/modules/group-permission/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend/modules/group-permission/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupPermissionRequest $request)
    {
        //
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        try {
            GroupPermission::insert($data);
            return redirect()->route('ManageListGroupPermission')->with('success', trans('message_vn.text_create_success'));
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
        $groupPermission = GroupPermission::find($id);
        if(!$groupPermission) {
            return redirect()->route('ManageListGroupPermission')->with('danger', trans('message_vn.text-empty'));
        }
        return view('backend/modules/group-permission/edit', compact('groupPermission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupPermissionRequest $request, $id)
    {
        //
        $groupPermission = GroupPermission::find($id);
        if(!$groupPermission) {
            return redirect()->route('ManageListGroupPermission')->with('danger', trans('message_vn.text-empty'));
        }
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();
        try {
            $groupPermission->update($data);
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
        $groupPermission = GroupPermission::find($id);
        if(!$groupPermission) {
            return redirect()->back()->with('danger', trans('message_vn.text-empty'));
        }
        try{
            $groupPermission->delete($id);
            return redirect()->back()->with('success', trans('message_vn.text_delete-success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', trans('message_vn.text-delete_errors'));
        }
    }

    public function deleteMultiple(Request $request) {

        foreach($request->ids as $id) {
            GroupPermission::find($id)->delete();
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }
}
