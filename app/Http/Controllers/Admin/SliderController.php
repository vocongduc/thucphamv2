<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    //

    public function index(){
        $data['sliders'] = DB::table('sliders')->orderBy('id', 'desc')->get();

        return view('admin.pages.slider.index', $data);
    }
    public function store(Request $request){
        //dd($request->all());
        if ($request->hasFile('slider')) {
            $file = $request->file('slider');
            $file_name = $this->imagename($file->getClientOriginalName());
            $name = time() . "_slider_" . $file_name;
            while (file_exists('images/slider/' . $name)) {
                $name = time() . "_slider_" . $name;
            }
            $file->move('images/slider/', $name);
            $image = $name;
        }


        DB::table('sliders')->insert([
            'image' => $image,
        ]);

        return redirect()->back()->with('thongbao', 'thêm silder thành công!');
    }
    /*
     * sửa slider
     * */
    public function update(Request $request, $id){
            //dd($request->all());
            $input= $request->all();
        if ($request->hasFile('slider')) {
            $file = $request->file('slider');
            $file_name = $this->imagename($file->getClientOriginalName());
            $name = time() . "_slider_" . $file_name;
            while (file_exists('images/slider/' . $name)) {
                $name = time() . "_slider_" . $name;
            }
            if($input['old-image']!='' && file_exists('images/slider/'.$input['old-image'])){
                unlink('images/slider/'.$input['old-image']);
            }
            $file->move('images/slider/', $name);

            $image = $name;
        }
        else{
            $image= $input['old-image'];
        }

        DB::table('sliders')->where('id', $id)->update([
            'image' => $image,
        ]);

        return redirect()->back()->with('thongbao', 'sửa silder thành công!');
    }
}
