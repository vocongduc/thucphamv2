<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PartnerController extends Controller
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
        $data['partner'] = DB::table('partner')->orderByDesc('id')->get();
        return view('admin.pages.partner.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.partner.add');
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
            while (file_exists('assets/img_partner/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_partner/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('partner')->insert([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('partner')->where('id', '=', $id)->delete();
        return redirect()->route('partner.index')->with('thongbao', 'Add Success');
    }
}
