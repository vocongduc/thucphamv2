<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Address extends Controller
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
}
