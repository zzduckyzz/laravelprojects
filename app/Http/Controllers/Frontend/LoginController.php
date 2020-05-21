<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\User;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('frontend/auth/login');
    }

    public function postLogin(LoginRequest $request)
    {
        $user = $request->except('_token');

        $dataUser = User::where('email', $request->email)->first();

        if(empty($dataUser)) {
            return redirect()->back()->with('danger', trans('message_vn.empty_user'));
        }

        if($dataUser->status == STATUS_LOCKED) {
            return redirect()->back()->with('danger', trans('message_vn.txt_locked'));
        }

        if(Auth::attempt($user)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('danger', trans('message_vn.empty_user'));
        }
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
