<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CertificateController extends Controller
{
    public function index()
    {
        $data['certificate']=DB::table('certificate')->get();
        return view('admin.pages.certificate.list',$data);
    }
    public function create()
    {
        return view('admin.pages.certificate.add');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_certificate/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_certificate/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('certificate')->insert([
            'image'=>$file_name,
        ]);
        return redirect()->back()->with('thông báo',"Thành công");
    }
    public function edit($id)
    {
        $certificate['certificate']=DB::table('certificate')->find($id);
        return view('admin.pages.certificate.edit',$certificate);
    }
    public function editstore(Request $request,$id)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_certificate/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_certificate/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('certificate')->where('id',$id)->update([
            'image'=>$file_name,
        ]);
        return redirect()->route('certificate.index');
    }
    public function destroy($id)
    {
        $certificate=DB::table('certificate')->find($id);
        $image=$certificate->image;
        if (file_exists('assets/img_certificate/' . $image) && $image != '') {
            unlink('assets/img_certificate/' . $image);
        }
        DB::table('certificate')->where('id',$id)->delete();
        return redirect()->back()->with('thông báo',"Thành công");
    }
    public function show($id)
    {
        $data['certificate'] = DB::table('certificate')->find($id);
       return view('page.giayChungNhan',$data);
    }
}
