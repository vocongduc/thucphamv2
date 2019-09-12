<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IntroduceController extends Controller
{
    //
    public function index()
    {
        $data['introduces'] = DB::table('introduces')->first();

        return view('admin.pages.introduce.index', $data);
    }

    public function update(Request $request)
    {
        //dd($request->all());

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_logo_" . $name;
            while (file_exists('images/logo/' . $avatar)) {
                $avatar = time() . "_logo_" . $name;
            }
            $file->move('images/logo/', $avatar);
            if($request->oldlogo !='' && file_exists('images/logo/'.$request->oldlogo)){
                unlink('images/logo/'. $request->oldlogo);
            }
            $image = $avatar;
        } else {
            $image = $request->oldlogo;
        }

        DB::table('introduces')->where('id', $request->id)->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'logo' => $image,
            'content' => $request->content
        ]);

        return redirect()->back()->with('thongbao', 'Sửa thông tin giới thiệu thành công!');
    }
}