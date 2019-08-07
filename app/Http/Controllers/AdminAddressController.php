<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAddressController extends Controller
{
    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
    }

    public function index()
    {
        $address = DB::table('address')->get();
        return view('admin.pages.address.index',compact('address'));
    }

    public function create()
    {
        return view('admin.pages.address.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'address' => 'required|min:3',
            'tel' => 'required',
            'hotline' => 'required',
        ],
        [
            'address.required' => 'Địa chỉ hệ thống không được để trống!',
            'address.min' => 'Địa chỉ hệ thống quá ít ký tự',
            'tel.required' => 'Tel không được để trống',
            'hotline.required' => 'Hotline không được để trống',
        ]);
        DB::table('address')->insert([
           'address' => $request->address,
           'tel' => $request->tel,
           'hotline' => $request->hotline,
            'created_at' => now()
        ]);
        return redirect()->route('admin.address.index')->with('thongbao','Thêm địa chỉ hệ thống thành công!');
    }

    public function edit($id)
    {
        $address = DB::table('address')->find($id);
        return view('admin.pages.address.edit',compact('address'));
    }

    public function action($action,$id)
    {
        if ($action)
        {
            switch ($action)
            {
                case 'delete':
                    DB::table('address')->where('id', $id)->delete();
                    return redirect()->back()->with('thongbao', 'Đã xóa tài khoản Amdin thành công');
                    break;
            }
        }
        return redirect()->back();
    }
}
