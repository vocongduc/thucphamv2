<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    //
    public function index(){
        $data['services'] = DB::table('services')->orderBy('id','desc')->get();

        return view('admin.pages.services.index', $data);
    }

    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'title' => 'unique:services,name',
        ],[
            'title.unique' => 'tiêu đề sản phẩm này đã tồn tại!',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_service_" . $name;
            while (file_exists('images/services/' . $avatar)) {
                $avatar = time() . "_service_" . $name;
            }
            $file->move('images/services/', $avatar);
            $image = $avatar;
        }
        DB::table('services')->insert([
            'name' => $request->title,
            'content' => $request->content,
            'icon' => $image
        ]);

        return redirect()->back()->with('thongbao', 'thêm dịch vụ thành công!');
    }
    public function update(Request $request, $id){
        //dd($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_service_" . $name;
            while (file_exists('images/services/' . $avatar)) {
                $avatar = time() . "_service_" . $name;
            }
            $file->move('images/services/', $avatar);
            if($request->oldimage != '' && file_exists('images/services/' . $request->oldimage)){
                unlink('images/services/' . $request->oldimage);
            }
            $image = $avatar;
        }
        else{
            $image = $request->oldimage;
        }
        DB::table('services')->where('id', $id)->update([
            'name' => $request->name,
            'content' => $request->content,
            'icon' => $image
        ]);

        return redirect()->back()->with('thongbao', 'sửa dịch vụ thành công!');
    }
    public function delete($id){
        $old = DB::table('services')->find($id);
        if($old->icon != '' && file_exists('images/services/' . $old->icon)){
            unlink('images/services/' . $old->icon);
        }

        DB::table('services')->where('id', $id)->delete();

        return redirect()->back()->with('thongbao', 'xóa dịch vụ thành công!');
    }
}
