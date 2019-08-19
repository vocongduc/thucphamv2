<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;


class AdminAccountController extends Controller
{
    protected $admin;

    public function __construct()
    {
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $this->middleware('auth:admin');
        $this->admins = DB::table('admins')
            ->select('admins.*','role.name as role','role.id as level')
            ->join('role','admins.level','role.id')
            ->get();
            $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin.view.admin.account'))
        {
            $admins = $this->admins;
            return view('admin.pages.account.admin.index',compact('admins'));
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
        if (Gate::allows('admin.view-create.admin.account'))
        {
            $roles = DB::table('role')->get();
            return view('admin.pages.account.admin.create',compact('roles'));
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
        if (Gate::allows('admin.create.admin.account'))
        {
            $this->validator($request);
            $createAdmin = DB::table('admins')->insert([
               'name' => $request->name,
               'email' => $request->email,
               'level' => $request->level,
                'password' => bcrypt($request->password),
                'status' => 1,
                'created_at' => now()
            ]);
            if (isset($createAdmin))
            {
                return redirect()->route('admin.account.index')->with('thongbao','Tạo tài khoản thành công');
            }else{
                return redirect()->route('admin.account.index')->with('error','Tạo tài khoản không thành công');
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
        if (Gate::allows('admin.edit.admin.account'))
        {
            if ($id != Auth::guard('admin')->id())
            {
                $lockAdmin = DB::table('admins')->whereId($id)
                    ->update(['status' => 0]);
                if (isset($lockAdmin))
                {
                    return redirect()->back()->with('thongbao','Khoá tài khoản thành công!');
                }else{
                    return redirect()->back()->with('error','Khoá tài khoản không thành công!');
                }
            }else{
                return redirect()->back()->with('error','Bạn không thể khoá chính mình!');
            }
        }
        abort(401);
    }

    public function unlock($id)
    {
        if (Gate::allows('admin.edit.admin.account'))
        {
            if ($id != Auth::guard('admin')->id())
            {
                $unlockAdmin = DB::table('admins')->whereId($id)
                    ->update(['status' => 1]);
                if (isset($unlockAdmin))
                {
                    return redirect()->back()->with('thongbao','Mở khoá tài khoản thành công!');
                }else{
                    return redirect()->back()->with('error','Mở khoá tài khoản không thành công!');
                }
            }else{
                return redirect()->back()->with('error','Bạn không thể mở khoá tài khoản của chính mình!');
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
        if (Gate::allows('admin.view-edit.admin.account'))
        {
            $data['roles'] = DB::table('role')->get();
            $data['admin'] = DB::table('admins')
                ->select('admins.*','role.name as role','role.id as level')
                ->join('role','admins.level','=','role.id')
                ->where('admins.id','=',$id)
                ->first();
            return view('admin.pages.account.admin.edit',$data);
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
        if (Gate::allows('admin.edit.admin.account'))
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
                    'level' => $request->level,
                    'updated_at' => now()
                ];
            }else{
                $input = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'level' => $request->level,
                    'updated_at' => now()
                ];
            }
            if ($updateAdmin = DB::table('admins')->whereId($id)->update($input))
            {
                return redirect()->back()->with('thongbao','Sửa tài khoản thành công!');
            }else{
                return redirect()->back()->with('error','Sửa tài khoản không thành công!');
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
        if (Gate::allows('admin.delete.admin.account'))
        {
            if ($id != Auth::guard('admin')->id()){
                $deleteAdmin = DB::table('admin')->whereId($id)
                    ->detele();
                if ($deleteAdmin){
                    return redirect()->back()->with('thongbao','Xoá tài khoản thành công!');
                }else{
                    return redirect()->back()->with('error','Xoá tài khoản không thành công!');
                }
            }else{
                return redirect()->back()->with('error','Bạn không thể xoá tài khoản chính mình');
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
