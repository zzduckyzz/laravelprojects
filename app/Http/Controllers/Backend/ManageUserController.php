<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Session;

class ManageUserController extends Controller
{
    private $activeUser = "active";

    public function __construct(User $user)
    {
        $this->table = $user;
    }

    /**
     * Lấy ra danh sách thông tin người dùng
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Lấy ra danh sách thông tin người dùng
        $users = $this->table->getlistUser($request);
        // trả về data người dùng
        $viewData = [
            'users' => $users,
            'query' => '',
            'activeUser' => $this->activeUser
        ];
        return view('backend/modules/users/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Chỉnh sửa thông tin người dùng
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Lấy ra thông tin người dùng
        $user = User::find($id);
        // lấy danh sách quyền người dùng
        $listRoleUser = \DB::table('role_user')->where('user_id', $id)->pluck('role_id')->toArray();
        if(Session::has('listRole')) {
            $listRole = Session::get('listRole');
            Session::forget('listRole');
        } else {
            $listRole = $listRoleUser;
        }
        if(!$user) {
            return redirect()->route('ManageListUser')->with('danger', trans('message_vn.text-empty'));
        }
        $viewData = [
            'listRole' =>$listRole,
            'user' =>$user,
            'roles' => $this->table->getAllRole(),
            'activeUser' => $this->activeUser
        ];
        return view('backend/modules/users/edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        //
        if($this->table->updateUser($request, $id)) {
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
        if($this->table->destroyUser($id)) {
            return redirect()->back()->with('success', trans('message_vn.text_delete-success'));
        } else {
            return redirect()->back()->with('danger', trans('message_vn.text-delete_errors'));
        }
    }

    /*
     * delete all user
     * @param $request
     * @return boolean
     */
    public function deleteMultiple(Request $request)
    {
        foreach($request->ids as $id) {
            $this->table->destroyUser($id);
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }

    /*
     * update status user
     * @param $request
     * @return boolean
     */
    public function updateStatusUser(Request $request)
    {
        if($this->table->updateUser($request, $request->id)) {
            return response()->json([
                'success' => trans('message_vn.text_update-success'),
            ]);
        } else {
            return response()->json([
                'errors' => trans('message_vn.text_update-errors'),
            ]);
        }
    }
}
