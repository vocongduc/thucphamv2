<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{

    //tuyendung
    public function tuyendung(){
        $data['news_focus'] = DB::table('news')->where('focus','=',1)->orderByDesc('id')->take(3)->get();
        $data['news_view'] = DB::table('news')->orderByDesc('view')->take(3)->get();
        $data['recruitment'] = DB::table('recruitments')->orderBy('id','desc')->paginate(8);
        return view('page.tuyenDung',$data);
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
