<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;


class VideoController extends Controller
{
    public function index()
    {
        $data['video']=DB::table('video')->get();
        return view('admin.pages.video.list',$data);
    }
    public function create()
    {
        return view('admin.pages.video.add');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3',

        ],[
            'title.required' => 'Tên không được xác định',
            'title.min' => 'Tên không được ít hơn 3 kí tự',

        ]);
        if ($request->hasFile('video')) {

            $file = $request->file('video');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/video/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/video/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('video')->insert([
            'title'=>$request->title,
            'video'=>$file_name,
        ]);
        return redirect()->back()->with('thongbao',"Thành công");
    }
    public function edit($id)
    {   
        $data['video']=DB::table('video')->find($id);
        return view('admin.pages.video.edit',$data);
    }
    public function editstore(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required|min:3',

        ],[
            'title.required' => 'Tên không được xác định',
            'title.min' => 'Tên không được ít hơn 3 kí tự',

        ]);
        if ($request->hasFile('video')) {

            $file = $request->file('video');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_video_" . $name;
            while (file_exists('assets/video/' . $image)) {
                $image = str_random(4) . "_video_" . $name;
            }
            $file->move('assets/video/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('video')->where('id',$id)->update([
            'title'=>$request->title,
            'video'=>$file_name,
        ]); 
        return redirect()->route('video.index')->with('thongbao',"Thành công");
    }
    public function destroy($id)
    {
        $video=DB::table('video')->find($id);
        $video=$video->video;
        if (file_exists('assets/video/' . $video) && $video != '') {
            unlink('assets/video/' . $video);
        }
        DB::table('video')->where('id', '=', $id)->delete();
        return redirect()->route('video.index')->with('thongbao', 'Thành công');
    }
    public function show($id)
    {
        $data['video'] = DB::table('video')->find($id);
        return view('page.videoClip',$data);
    }
}
