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
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
    }

    public function index(){
        $data['cate_parents']= DB::table('cate_products_lv1')->orderBy('id', 'desc')->get();


        return view('admin.pages.product.cate_products.index',$data);
    }

    public function create(Request $request){
        dd($request->all());
        $this->validate($request,[
                'cate-parent' => 'unique:cate_products_lv1,name',
        ],[
            'cate-parent.unique' => 'loại sản phẩm đa tồn tại',
        ]);
        //dd($request->all());
        $input= $request->all();

        DB::table('cate_products_lv1')->insert([
            'name' => $input['cate-parent'],
            'slug' => str_slug($input['cate-parent']).'-'.time().'.html'
        ]);

        $parent = DB::table('cate_products_lv1')->orderBy('id', 'desc')->first();
        if($input['num-child']!=0){
            for( $i=1; $i<=$input['num-child']; $i++){
                DB::table('cate_products_lv2')->insert([
                    'name' => $input['cate-child-'.$i],
                    'slug' => str_slug($input['cate-child-'.$i]).'-'.time().'.html',
                    'cate_lv1_id' => $parent->id,
                ]);
            }
        }
        return redirect()->back()->with('thongbao','Thêm Loại hàng Thành Công!');

    }
    public function update(Request $request, $id){
        $input= $request->all();
        DB::table('cate_products_lv1')->where('id', $id)->update([
            'name' => $input['cate-parent-edit'],
            'slug' => str_slug($input['cate-parent-edit']).'-'.time().'.html'
        ]);
        return redirect()->back()->with('thongbao','Thêm Loại hàng Thành Công!');
    }
    public function delete($id){
        //dd($request->all());
        DB::table('cate_products_lv1')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao','Xóa Loại hàng Thành Công!');
    }


    /*
     * danh mục con
     * */
    public function child($id){
        $data['cate_parents']= DB::table('cate_products_lv1')->find($id);
        $data['cate_childs']= DB::table('cate_products_lv2')
            ->where('cate_lv1_id',$id)
            ->orderBy('id', 'desc')->get();
        return view('admin.pages.product.cate_products.child',$data);
    }
    public function createchild(Request $request){
        //dd($request->all());
        DB::table('cate_products_lv2')->insert([
            'name' => $request->name,
            'slug' => str_slug($request->name).'-'.time().'.html',
            'cate_lv1_id' => $request->cate_id,
        ]);
        return redirect()->back()->with('thongbao','Thêm Loại hàng Thành Công!');
    }
    public function updatechild(Request $request, $id){
        //dd($request->all());
        DB::table('cate_products_lv2')->where('id', $id)->update([
            'name' => $request->name,
            'slug' => str_slug($request->name).'-'.time().'.html',
        ]);
        return redirect()->back()->with('thongbao','Sửa Loại hàng Thành Công!');
    }
    public function deletechild($id){
        //dd($request->all());
        DB::table('cate_products_lv2')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao','Xóa Loại hàng Thành Công!');
    }
}
