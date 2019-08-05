<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminProfileController extends Controller
{
    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
    }
    //binding data -> profile
    public function index(){
        $products = DB::table('products')->where('status','!=',1)->get();
        $admin = DB::table('admins')->first();
        $users = DB::table('users')->get();
        // $countProduct = DB::table('products')->where('status','!=',1)->count();
        return view('admin.pages.profile.profile',compact('products','users','admin'));
    }
    //chang status products
    public function changeStatusProducts(Request $request){
        if($request->_token == csrf_token()){
            DB::table('products')->where('id', '=', $request->id)->update([
                'status' => $request->status,
                'updated_at' => now(),
            ]);
            return response()->json([
                'success' => 'Bạn đã cập nhật thành công!'
            ],200);
        }
    }
    //delete product
    public function deleteProduct(Request $request){
        if($request->_token == csrf_token()){
            DB::table('products')->where('id', '=', $request->id)->delete();
            return response()->json([
                'success' => 'Bạn đã xóa thành công!'
            ],200);
        }
    }

    //news
    // public function changeStatusBlogs(Request $request){
    //     if($request->_token == csrf_token()){
    //         DB::table('news')->where('id', '=', $request->id)->update([
    //             'status' => $request->status,
    //             'updated_at' => now(),
    //         ]);
    //         return response()->json([
    //             'success' => 'Bạn đã cập nhật thành công!'
    //         ],200);
    //     }
    // }
    // public function deleteBlog(Request $request){
    //     if($request->_token == csrf_token()){
    //         DB::table('news')->where('id', '=', $request->id)->delete();
    //         return response()->json([
    //             'success' => 'Bạn đã xóa thành công!'
    //         ],200);
    //     }
    // }

    //user
    //add
    public function listUser(Request $request){
        if($request->_token == csrf_token()){
            $user = DB::table('users')->where('id','=',$request->id)->first();
            return response()->json([
                'user' => $user
            ],200);
        }
    }
    public function listUserEdit(Request $request){
        if($request->_token == csrf_token()){
            // dd($request->id);
            DB::table('users')->where('id','=',$request->id_user)
                ->update([
                    'password' => bcrypt($request->repass),
                    'updated_at' => now()
                ]);
            return response()->json([
                'sucsess' => 'bạn đã thay đổi mật khẩu thành công'
            ],200);
        }
    }
    public function listUserDelete(Request $request){
        if($request->_token == csrf_token()){
            DB::table('users')->where('id', '=', $request->id)->delete();
            return response()->json([
                'success' => 'Bạn đã xóa thành công!'
            ],200);
        }
    }
}
