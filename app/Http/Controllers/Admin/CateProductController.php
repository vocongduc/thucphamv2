<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CateProduct;
use Illuminate\Support\Facades\View;
use DB;

class CateProductController extends Controller
{
    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $this->middleware('auth:admin');
    }
    function getAddCategory() {
        $data['cate'] = CateProduct::all();
        return view('admin.pages.product.addcategory',$data);
    }

    function postAddCategory(request $r) {
        $cate = new CateProduct;
        $cate->name = $r->name;
        $cate->slug = str_slug($r->name);
        $cate->save();
        return redirect()->back()->with('thongbao','Thêm danh mục thành công');
    } 

    function getEditCategory($cate_id) {
        $data['cate_id'] = CateProduct::find($cate_id);
        $data['cate'] = CateProduct::all();
        // dd($data);
        return view('admin.pages.product.editcategory',$data);
    }

    function postEditCategory(request $r, $cate_id) {
        $cate = CateProduct::find($cate_id);
        $cate->name = $r->name;
        $cate->slug = str_slug($r->name);
        $cate->save(); 
        return redirect()->route('add.category')->with('thongbao','Sửa thành công danh mục'); 
    }

    function DelCategory($cate_id) {
        $cate = CateProduct::find($cate_id);
        CateProduct::destroy($cate_id);
        return redirect()->back()->With('thongbao','Đã xóa danh mục thành công!');
    }
}
