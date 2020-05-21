<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    /*
     * @param $email, $password
     * @login
     * @return boolen
     */
    public function login() {

        return view('backend/modules/auth/login');
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
            $checkRole = \Auth::user()->hasRole(['Quản trị viên', 'Người dùng']);
            if(!$checkRole) {
                return redirect()->back()->with('danger', 'Bạn không có quyền truy cập');
            }
            return redirect()->route('HomeIndex');
        } else {
            return redirect()->back()->with('danger', trans('message_vn.empty_user'));
        }

    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
