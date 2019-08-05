<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;


class RecruitmentController extends Controller
{
    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
    }
    // index list
    public function index(){
        $data['recruitment'] = DB::table('recruitments')->orderBy('id','desc')->get();
        return view('admin.pages.recruitment.index',$data);
    }
    //delete
    public function delete($id){
        $recruitment = DB::table('recruitments')->where('id',$id)->first();
        if($recruitment->image !="" && $recruitment->image !="logo1.png" && file_exists('assets/img_new/' . $recruitment->image)){
            unlink('assets/img_new/'.$recruitment->image);
        };
        DB::table('recruitments')->where('id',$id)->delete();
        return redirect()->back()->with('thongbao','Đã xóa.');
    }
    // add
    public function add(){
        return view('admin.pages.recruitment.add');
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|min:3',
            'salaryMin' => 'required',
            'salaryMax' => 'required',
            'address'=>'required|min:3',
            'noidung' => 'required|min:3',

        ], [
            'title.required' => 'Tiêu đề không được xác định',
            'title.min'=>'Tiêu đề phải hơn 3 kí tự',
            'address.required' => 'Địa chỉ không được xác định',
            'address.min'=>'ĐỊa chỉ phải hơn 3 kí tự',
            'noidung.required' => 'Nội dung không được xác định',
            'noidung.min'=>'Nội dung phải hơn 3 kí tự',
            'salaryMin.required' => 'Lương không được xác định',
            'salaryMax.required' => 'Lương không được xác định',

        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_new/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_new/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }

        DB::table('recruitments')->insert([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'salaryMin' => $request->salaryMin,
            'salaryMax' => $request->salaryMax,
            'address' => $request->address,
            'image' => $file_name,
            'content' =>$request->noidung,
            'status'=>1,
            'created_at' => now()
        ]);

        $recruitment = DB::table('recruitments')->orderBy('id','desc')->first();
        $explode = explode(';', $request->tags);
        foreach($explode as $ex){
            DB::table('recruitment_tags')->insert([
                'name' => $ex,
                'recruitment_id' => $recruitment->id,
                'searchs' => 0
            ]);
        } 
        return redirect()->route('recruitment.index')->with('thongbao','Thêm tuyển dụng thành công.');   
    }

    //edit
    public function edit($id){
        $data['recruitment'] = DB::table('recruitments')->where('id',$id)->first();
        $tags = DB::table('recruitment_tags')->where('recruitment_id',$id)->get(); 
        $tag = "";
        foreach($tags as $value){
            $tag.=$value->name.';';
        }
        $data['tag'] = $tag;
        return view('admin.pages.recruitment.edit',$data);
    }
    public function editStore(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|min:3',
            'salaryMin' => 'required',
            'salaryMax' => 'required',
            'address'=>'required|min:3',
            'noidung' => 'required|min:3',

        ], [
            'title.required' => 'Tiêu đề không được xác định',
            'title.min'=>'Tiêu đề phải hơn 3 kí tự',
            'address.required' => 'Địa chỉ không được xác định',
            'address.min'=>'ĐỊa chỉ phải hơn 3 kí tự',
            'noidung.required' => 'Nội dung không được xác định',
            'noidung.min'=>'Nội dung phải hơn 3 kí tự',
            'salaryMin.required' => 'Lương không được xác định',
            'salaryMax.required' => 'Lương không được xác định',

        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_new/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_new/', $image);
            $file_name = $image;

        } else {
            $file_name = $request->old_file;
        }

        DB::table('recruitments')->where('id',$id)->update([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'salaryMin' => $request->salaryMin,
            'salaryMax' => $request->salaryMax,
            'address' => $request->address,
            'image' => $file_name,
            'content' =>$request->noidung,
            'status'=>1,
            'created_at' => now()
        ]);

        $recruitment = DB::table('recruitments')->orderBy('id','desc')->first();
        DB::table('recruitment_tags')->where('recruitment_id',$id)->delete();
        $explode = explode(';', $request->tags);
        foreach($explode as $ex){
            DB::table('recruitment_tags')->insert([
                'name' => $ex,
                'recruitment_id' => $recruitment->id,
                'searchs' => 0
            ]);
        }
        return redirect()->route('recruitment.index')->with('thongbao','Đã lưu.');
    }
    //action
    public function act($id,$status){
        DB::table('recruitments')->where('id',$id)->update([
            'status' => $status
        ]);
        return redirect()->back()->with('thongbao','Đã chuyển trạng thái.');
    }

}
