<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Mockery\Exception;

class LoginController extends Controller
{
    /**
     * This trait has all the login throttling functionality.
     */
    use ThrottlesLogins;
    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;
    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;
    /**
     * Show the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login',[
            'title' => 'Trang đăng nhập ADMIN',
            'loginRoute' => 'admin.login_post',
            'forgotPasswordRoute' => 'admin.password.request',
        ]);
    }
    /**
     * Login the admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validator($request);

        //kiểm tra xem người dùng có quá nhiều lần thử đăng nhập không.
        if ($this->hasTooManyLoginAttempts($request)){
            //Fire the lockout event.
            $this->fireLockoutEvent($request);
            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        //attempt login.
        if (Auth::guard('admin')->attempt(
            ['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'))->with('thongbao','Bạn đã đăng nhập với tư cách quản trị viên');
        }

        //theo dõi các nỗ lực đăng nhập từ người dùng.
        $this->incrementLoginAttempts($request);

        //Authentication failed
        return $this->loginFailed();
    }
    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        //logout the admin
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.showLoginForm')
            ->with('thongbao','Quản trị viên đã được đăng xuất!');

    }
    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];
        //custom validation error messages.
        $messages = [
            'email.exists' => 'Những thông tin không phù hợp với hồ sơ của chúng tôi.',
        ];
        //validate the request.
        $request->validate($rules,$messages);
    }
    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        //Login failed
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Đăng nhập thất bại. Xin hãy thử lại!');
    }
    /**
     * Username used in ThrottlesLogins trait
     *
     * @return string
     */
    public function username(){
        return 'email';
    }
}
