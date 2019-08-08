<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class IntroduceController extends Controller
{
    public function __construct(){
        $mess = DB::table('introduce')->count();
        view()->share('mess', $mess);
        $introduce = DB::table('introduce')->orderBy('id', 'DESC')->get();
        view()->share('contact', $introduce);
        // $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        // view()->share('contacts', $contacts);
    }
    //display
    public function display()
    {
        $data['introduce'] = DB::table('introduce')->find(1);
        return view('page.gioithieu',$data);
    }
    //list
    public function index()
    {
        $introduce = DB::table('introduce')->get();
        return view('admin.pages.introduce.index',compact('introduce'));
    }
    //edit
    public function edit($id){
        $data['introduce'] = DB::table('introduce')->where('id',$id)->first();
        return view('admin.pages.introduce.edit',$data);
    }
    public function editStore(Request $request, $id){
        
        $this->validate($request, [
            'content' => 'min:3',

        ], [
            'content.min' => 'Ít nhất 3 ký tự',
        ]);

        DB::table('introduce')->where('id',$id)->update([
            'content' => $request->content,
        ]);
        return redirect()->route('introduce.index')->with('thongbao','Sửa thông tin liên hệ công ty thành công.');
    }
    public function show($id)
    {
        $data['introduce'] = DB::table('introduce')->first();
        return view('page.gioithieu',$data);
    }
}
