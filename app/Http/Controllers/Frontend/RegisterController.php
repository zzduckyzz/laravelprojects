<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Hash;
use App\Models\Users\User;

class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('frontend/auth/register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = $request->except('_token', 'rpassword', 'password');
        $user['password'] = Hash::make($request->password);
        $id = User::insertGetId($user);

        if ($id)
        {
            if (\Auth::guard('users')->loginUsingId($id)) {
                return redirect('home');
            }
        }
    }
}
