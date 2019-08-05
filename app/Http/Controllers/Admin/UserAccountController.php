<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class UserAccountController extends Controller
{
    protected $user;

    public function __construct()
    {
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $this->users = DB::table('users')
            ->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin.view.user.account'))
        {
            $users = $this->users;
            return view('admin.pages.account.user.index',compact('users'));
        }
        abort(401);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin.view-create.user.account'))
        {
            return view('admin.pages.account.user.create');
        }
        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('admin.create.user.account'))
        {
            $this->validator($request);
            $createUser = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 1,
                'created_at' => now()
            ]);
            if (isset($createUser))
            {
                return redirect()->route('user.account.index')->with('thongbao','Tạo tài khoản thành công');
            }else{
                return redirect()->route('user.account.index')->with('error','Tạo tài khoản không thành công');
            }
        }
        else
        {
            abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lock($id)
    {
        if (Gate::allows('admin.edit.user.account'))
        {
            $lockUser = DB::table('users')->whereId($id)
                ->update(['status' => 0]);
            if (isset($lockUser))
            {
                return redirect()->back()->with('thongbao','Khoá tài khoản thành công!');
            }else{
                return redirect()->back()->with('error','Khoá tài khoản không thành công!');
            }
        }
        abort(401);
    }

    public function unlock($id)
    {
        if (Gate::allows('admin.edit.user.account'))
        {
            $unlockUser = DB::table('users')->whereId($id)
                    ->update(['status' => 1]);
                if (isset($unlockUser))
                {
                    return redirect()->back()->with('thongbao','Mở khoá tài khoản thành công!');
                }else{
                    return redirect()->back()->with('error','Mở khoá tài khoản không thành công!');
                }
        }
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('admin.view-edit.user.account'))
        {
            $data['users'] = DB::table('users')
                ->where('users.id','=',$id)
                ->first();
            return view('admin.pages.account.user.edit',$data);
        }
        abort(401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('admin.edit.user.account'))
        {
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email'
            ]);
            if (isset($request->password))
            {
                $this->validate($request,[
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                ]);
                $input = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'updated_at' => now()
                ];
            }else{
                $input = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'updated_at' => now()
                ];
            }
            if ($updateUser = DB::table('users')->whereId($id)->update($input))
            {
                return redirect()->route('user.account.index')->with('thongbao','Sửa tài khoản thành công!');
            }else{
                return redirect()->route('user.account.index')->with('error','Sửa tài khoản không thành công!');
            }
        }
        abort(401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admin.delete.user.account'))
        {
            $deleteUser = DB::table('users')->whereId($id)
                ->detele();
            if ($deleteUser){
                return redirect()->back()->with('thongbao','Xoá tài khoản thành công!');
            }else{
                return redirect()->back()->with('error','Xoá tài khoản không thành công!');
            }
        }
        abort(401);
    }

    private function validator(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
        $messages = [
            'name.required' => 'Tên không được để trống!',
            'email.unique' => 'Email đã có trong hồ sơ!',
            'password.min' => 'Mật khẩu tối thiểu phải chứa 6 ký tự!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password_confirmation.required' => 'Trường nhập lại mật khẩu không được để trống!!',
            'password_confirmation.same' => 'Bạn nhập lại mật khẩu không chính xác!',
        ];
        //validate the request.
        $request->validate($rules,$messages);
    }
}
