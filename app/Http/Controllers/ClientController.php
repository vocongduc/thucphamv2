<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class ClientController extends Controller
{

    public function __construct()
    {
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
    }
    //tuyendung
    public function tuyendung(){
        $data['news_focus'] = DB::table('news')->where('focus','=',1)->orderByDesc('id')->take(3)->get();
        $data['news_view'] = DB::table('news')->orderByDesc('view')->take(3)->get();
        $data['recruitment'] = DB::table('recruitments')->orderBy('id','desc')->paginate(8);
        return view('page.tuyenDung',$data);
    }
    //chi tiet tuyen dung
    public function chitiettuyendung($slug){
        $data['chitiet'] = DB::table('recruitments')->where('slug',$slug)->first();
        // dd($data['chitiet']);
        return view('page.Tuyendungchitiet',$data);
    }

//    tin tuc
    public function tintuc()
    {
        $data['news'] = DB::table('news')->orderBy('id','desc')->paginate(5);
        return view('page.tintuc',$data);
    }
//    thuc don
    public function thucdon()
    {
        $data['menu'] = DB::table('menu')->orderBy('id','desc')->paginate(5);
        return view('page.thucDon',$data);
    }
}
