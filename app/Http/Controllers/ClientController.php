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
    // public function loaitintuc($slug)
    //chi tiet tuyen dung
    public function chitiettuyendung($slug){
        $data['chitiet'] = DB::table('recruitments')->where('slug',$slug)->first();
        // dd($data['chitiet']);
        return view('page.Tuyendungchitiet',$data);
    }

//    tin tuc
    public function tintuc()
    {
        $cate_id = DB::table('cate_news')->where('slug',$slug)->pluck('id')->first();
        $data['cate_name'] = DB::table('cate_news')->where('slug',$slug)->first();
        $data['news'] = DB::table('news')->where('cate_id',$cate_id)->paginate(5);
        return view('page.tintuc',$data);
    }
    public function chitiettintuc($cate, $slug)
    {
        $news_id = DB::table('news')->where('slug',$slug)->pluck('id');
        $cate_id = DB::table('cate_news')->where('slug',$cate)->pluck('id')->first();
        $data['news'] = DB::table('news')->where('cate_id',$cate_id)->first();
        $data['news_tags'] = DB::table('news_tags')->where('news_id', '=', $news_id)->get();
        return view('page.tintucchitiet',$data);
    }
    public function loaithucdon($slug)
    {
        $cate_id = DB::table('cate_menu')->where('slug',$slug)->pluck('id')->first();
        $data['cate_name'] = DB::table('cate_menu')->where('slug',$slug)->first();
        $data['menu'] = DB::table('menu')->where('cate_id',$cate_id)->paginate(5);
        return view('page.thucdon',$data);
    }

    public function chitietthucdon($cate, $slug)
    {
        $menu_id = DB::table('menu')->where('slug',$slug)->pluck('id');
        $cate_id = DB::table('cate_menu')->where('slug',$cate)->pluck('id')->first();
        $data['menu'] = DB::table('menu')->where('cate_id',$cate_id)->first();
        $data['menu_tags'] = DB::table('menu_tags')->where('menu_id', '=', $menu_id)->get();
        return view('page.thucdonchitiet',$data);
    }

//    Giới thiệu
    public function gioiThieuDoiTac()
    {
        $data['partner'] = DB::table('partner')->orderBy('id','desc')->paginate(4);
        return view('page.doiTac',$data);
    }
}
