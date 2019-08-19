<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $this->middleware('auth:admin');
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
    }
    public function index()
    {
        $data['follow'] = DB::table('follow')->orderByDesc('id')->get();
        return view('admin.pages.follow.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.follow.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,[
            'name'=>'required|min:3',
            'link' => 'required|regex:'.$regex,
        ],[
            'name.required' => 'Tên không được xác định',
            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'link.required'=>'Link không được xác định',
            'link.regex'=>'Sai định dạng url',
        ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_follow/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_follow/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('follow')->insert([
            'name'=>$request->name,
            'link'=>$request->link,
            'status'=>$request->status,
            'logo'=>$file_name,
        ]);
        return redirect()->back()->with('thongbao',"Thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['follow'] = DB::table('follow')->get();
        return view('master-layout',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('follow')->where('id', '=', $id)->delete();
        return redirect()->route('follow.index')->with('thongbao', 'Add Success');
    }
    public function setactive($id, $status)
    {
        DB::table('follow')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }
}
