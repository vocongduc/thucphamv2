<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use DB;

class HomeController extends Controller
{
    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
    }
    public function index(Request $request)
    {

            if (Auth::guard('admin')){
                return view('admin.pages.dashboard');
            }else{
                return view('admin.auth.login',[
                    'title' => 'Trang đăng nhập ADMIN',
                    'loginRoute' => 'admin.login_post',
                    'forgotPasswordRoute' => 'admin.password.request',
                ]);
            }

    }
}
