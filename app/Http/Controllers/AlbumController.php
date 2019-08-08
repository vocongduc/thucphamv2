<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
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
        $albums = DB::table('albums')->get();
        return view('admin.pages.album.index',compact('albums'));
    }

    public function create()
    {
        return view('admin.pages.album.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'content' => 'required',
        ],
        [
            'title.required' => 'Album ảnh không được để trống!',
            'title.min' => 'Tên album ảnh quá ít ký tự',
            'content.required' => 'Nội dung album không được để trống',
        ]);
        if ($request->hasFile('image')){
            $file = $request->image;
            // Lấy tên file
            $file_name = $file->getClientOriginalName();
            // lấy loại file
            $file_type = $file->getMimeType();
            // lấy kích thước file
            $file_size = $file->getSize();
            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if ($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'-'.rand().'-'.$file_name;
                    if ($file->move('assets/img_album',$file_name)){
                        DB::table('albums')->insert([
                            'title' => $request->title,
                            'image'=> $file_name,
                            'content' => $request->content,
                            'created_at' => now()
                        ]);
                        return redirect()->route('admin.album.index')->with('thongbao','Đã thêm thành công album ảnh mới.');
                    }
                }else{
                    return back()->with('error','Bạn không thể upload ảnh quá 1mb');
                }
            }else{
                return back()->with('error','File bạn chọn không phải là hình ảnh');
            }
        }else{
            return back()->with('error','Bạn chưa thêm ảnh minh hoạ cho sản phẩm');
        }
    }

    public function edit($id)
    {
        $albums = DB::table('albums')->find($id);
        return view('admin.pages.album.edit',compact('albums'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'content' => 'required',
        ],
        [
            'title.required' => 'Album ảnh không được để trống!',
            'title.min' => 'Tên album ảnh quá ít ký tự',
            'content.required' => 'Nội dung album không được để trống',
        ]);
        $album = DB::table('albums')->find($id);
        if ($request->hasFile('image')){
            $file = $request->image;
            // Lấy tên file
            $file_name = $file->getClientOriginalName();
            // lấy loại file
            $file_type = $file->getMimeType();
            // lấy kích thước file
            $file_size = $file->getSize();
            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if ($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'-'.rand().'-'.$file_name;
                    if ($file->move('assets/img_album',$file_name)){
                        unlink('assets/img_album/' .$album->image);
                        $file_name = $file_name;
                    }
                }else{
                    return back()->with('error','Bạn không thể upload ảnh quá 1mb');
                }
            }else{
                return back()->with('error','File bạn chọn không phải là hình ảnh');
            }
        }else{
            $file_name = $request->old_file;
        }
        $input = [
            'title' => $request->title,
            'image' => $file_name,
            'content' => $request->content,
        ];
        DB::table('albums')->whereId($id)->update($input);
        return redirect()->route('admin.album.index')->with('thongbao','Sửa album ảnh thành công!');
    }
    public function action($action,$id)
    {
        if ($action) {
            switch ($action) {
                case 'delete':
                    DB::table('albums')->where('id', $id)->delete();
                    return redirect()->back()->with('thongbao', 'Đã xóa tài khoản Amdin thành công');
                    break;
            }
        }
        return redirect()->back();
    }
}
