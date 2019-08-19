<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class ContactController extends Controller
{
    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
    }
    //list
    public function index()
    {
        $contact = DB::table('contacts')->get();
        return view('admin.pages.contact.index',compact('contact'));
    }
    //delete
    public function destroy($id)
    {
        DB::table('contacts')->where('id',$id)->delete();
        return redirect()->back()->with('thongbao','Đã xóa.');
    }
    //add
    public function create(){
        $data['thongtin'] = DB::table('change_contacts')->orderBy('id','desc')->first();
        return view('page.lienHe',$data);
    }
    public function store(Request $request){
        // dd('lol me nos');
        $this->validate($request, [
            'fullname' => 'required|min:3',
            'email' => 'required',
            'phone' => 'required|min:8|max:15',
            'title'=>'required|min:3',
            'content' => 'required|min:3',

        ], [
            'title.required' => 'Tiêu đề không được xác định',
            'title.min'=>'Tiêu đề phải hơn 3 kí tự',
            'content.required' => 'Nội dung không được xác định',
            'content.min'=>'Nội dung phải hơn 3 kí tự',
            'phone.required' => 'SĐT không được xác định',
            'phone.min'=>'SĐT phải hơn 8 kí tự',
            'phone.max'=>'SĐT phải ít hơn 15 kí tự',
            'email.required' => 'Email không được xác định',
            'fullname.required' => 'Họ tên không được xác định',
            'fullname.min' => 'Họ tên phải hơn 3 kí tự'

        ]);

        DB::table('contacts')->insert([
            'title' => $request->title,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
            'created_at' => now()
        ]);
        return redirect()->back()->with('thongbao','Đăng kí gửi liên hệ thành công.');
    }
    //change infor 
    public function createChange(){
        $data['thongtin'] = DB::table('change_contacts')->orderBy('id','desc')->get();
        return view('admin.pages.contact.change',$data);
    }
    public function storeChange(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|min:8|max:15',
            'facebook'=>'required',
            'email' => 'required',
            'website'=> 'required',
            'certificate'=> 'required'

        ], [
            'name.required' => 'Tên công ty không được xác định',
            'name.min'=>'Tên công ty phải hơn 3 kí tự',
            'address.required' => 'Địa chỉ công ty không được xác định',
            'address.min'=>'Địa chỉ công ty phải hơn 3 kí tự',
            'phone.required' => 'SĐT công ty không được xác định',
            'phone.min'=>'SĐT công ty phải hơn 8 kí tự',
            'phone.max'=>'SĐT công ty phải ít hơn 15 kí tự',
            'facebook.required' => 'Link FaceBook công ty không được xác định',
            'email.required'=>'Địa chỉ email công ty không được xác định',
            'website.required'=>'Website công ty không được xác định',
            'certificate.required'=>'Giấy chứng nhận ĐKKD công ty không được xác định',

        ]);

        DB::table('change_contacts')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'certificate' => $request->certificate,
            'email' => $request->email,
            'fblink' => $request->facebook,
            'website' => $request->website,
            'phone' => $request->phone,
            'created_at' => now()
        ]);
        return redirect()->back()->with('thongbao','Lưu tin liên hệ công ty thành công.');
    }

    //destroyinfor
    public function destroyinfor($id){
        DB::table('change_contacts')->where('id',$id)->delete();
        return redirect()->back()->with('thongbao','Đã xóa.');
    }
    //edit
    public function edit($id){
        $data['thongtin'] = DB::table('change_contacts')->where('id',$id)->first();
        return view('admin.pages.contact.edit',$data);
    }
    public function editStore(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|min:8|max:15',
            'facebook'=>'required',
            'email' => 'required',
            'website'=> 'required',
            'certificate'=> 'required'

        ], [
            'name.required' => 'Tên công ty không được xác định',
            'name.min'=>'Tên công ty phải hơn 3 kí tự',
            'address.required' => 'Địa chỉ công ty không được xác định',
            'address.min'=>'Địa chỉ công ty phải hơn 3 kí tự',
            'phone.required' => 'SĐT công ty không được xác định',
            'phone.min'=>'SĐT công ty phải hơn 8 kí tự',
            'phone.max'=>'SĐT công ty phải ít hơn 15 kí tự',
            'facebook.required' => 'Link FaceBook công ty không được xác định',
            'email.required'=>'Địa chỉ email công ty không được xác định',
            'website.required'=>'Website công ty không được xác định',
            'certificate.required'=>'Giấy chứng nhận ĐKKD công ty không được xác định',

        ]);

        DB::table('change_contacts')->where('id',$id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'certificate' => $request->certificate,
            'email' => $request->email,
            'fblink' => $request->facebook,
            'website' => $request->website,
            'phone' => $request->phone,
            'created_at' => now()
        ]);
        return redirect()->route('contact.change')->with('thongbao','Sửa thông tin liên hệ công ty thành công.');
    }
}
