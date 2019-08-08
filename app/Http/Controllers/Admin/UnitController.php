<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    //
    public function index(){
        $data['units'] = DB::table('units')->orderBy('id', 'desc')->get();

        return view('admin.pages.product.unit_products.index', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
           'name' => 'unique:units,name',
        ]);
        DB::table('units')->insert([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('thongbao', 'Thêm Đơn Vị thành công');
    }
    public function update(Request $request, $id){

        DB::table('units')->where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('thongbao', 'Thêm Đơn Vị thành công');
    }
    public function delete($id){

        DB::table('units')->where('id', $id)->delete();

        return redirect()->back()->with('thongbao', 'Thêm Đơn Vị thành công');
    }
}
