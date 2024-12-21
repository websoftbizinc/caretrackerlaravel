<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends AdminController
{
    /**
     * if user logged in redirect on dashboard page else redirect on a login page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
//        dd(User::all());
        if (!Auth::check()) {
            $redirect_url = Session::get('redirect_url');
            return view('admin.Auth.login', [
                'page_title' => 'Login',
                'redirect_url' => $redirect_url,
            ]);
        } else {
            return redirect('/dashboard');
        }

    }

    /**
     * user login process
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request)
    {

        $rules = [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ];

        //Validation rules
        $v = Validator::make($request->all(), $rules);

        //If validation fails
        if ($v->fails()) {
            return Redirect::back()->withErrors($v)->withInput();
        };

        $rememberMe = $request->has('pms_remember_me') ? true : false;

        //Check User Authorisation
        $authorised = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
//            'is_admin' => 1,
//            'role_id' => 1,
        ]);

        if ($authorised) {
//            if (!Auth::user()->active) {
//
//                //Logout
//                Auth::logout();
//                return redirect('/')
//                    ->with(['msg_type' => 'danger', 'msg' => 'Your user account is marked as inactive.']);
//            } else {
//             Ṣ
                setcookie('logged_in', true, time() + (120));
                return redirect($request->redirect_url)->with(['msg_type' => 'success', 'msg' => 'Logged in Successfully', 'logged_in' => 'true']);
//            }
        } else {
            return redirect('/')
//            ->with('error', '');
                ->with(['msg_type' => 'danger', 'msg' => 'There was a problem logging you in, please try again.']);
        }

    }

    /**
     * user logout process
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('/')->with(['msg_type' => 'success', 'msg' => 'You have successfully been logged out.']);
    }

    /**
     * change password view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
        $breadcrumbData = [
            [
                'title' => 'Dashboard',
                'url' => route('dashboard'),
                'active' => false,
            ],
            [
                'title' => 'Change Password',
                'url' => '#',
                'active' => true,
            ]

        ];
        return view('admin.auth.change-password', [
            'page_title' => 'Change Password',
            'menu' => 'change-password',
            'breadcrumbData' => $breadcrumbData,
        ]);
    }

    public function postChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        } else {
            $user = User::find(auth()->user()->id);
            if (checkPassword($user->password, $request->old_password)) {
                $user->update(['password' => Hash::make($request->new_password)]);
                return Redirect::back()->with(['msg_type' => 'success', 'msg' => 'Password changed']);
            } else {
                return Redirect::back()->with(['msg_type' => 'error', 'msg' => 'old password does ot matched']);
            }
        }
    }

    public function resetPassword($token = null)
    {
        return view('admin.auth.reset-password', [
            'page_title' => 'Reset Password',
            'token' => $token,
        ]);
    }

    public function postResetPassword(Request $request, $token)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        } else {
            $userEmail = DB::table('password_resets')->where('token', $token)->first();
            if ($userEmail) {
                $user = User::query()->where('email', $userEmail->email)->first();
                $user->update(['password' => Hash::make($request->new_password)]);
                removePasswordResetToken($user->email);
                return Redirect::back()->with(['msg_type' => 'success', 'msg' => 'Password changed']);

            } else {
                return Redirect::back()->with(['msg_type' => 'danger', 'msg' => 'invalid token']);
            }

        }
    }
}
