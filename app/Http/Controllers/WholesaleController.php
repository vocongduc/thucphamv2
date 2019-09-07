<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WholesaleController extends Controller
{
    //

    public function index(){
        $data['wholesales'] = DB::table('wholesale')
            ->select('wholesale.id','wholesale.quantity', 'wholesale.percent', 'units.name')
            ->join('units', 'units.id','=','wholesale.unit_id')
            ->orderBy('wholesale.id', 'desc')->get();
        $data['units'] = DB::table('units')
            ->where(DB::raw('(Select count(*) from wholesale where wholesale.unit_id = units.id)'), 0)
            ->orderBy('id', 'desc')->get();
        //dd($data['units']);

        return view('admin.pages.wholesale.index', $data);
    }

    /*
     * thêm
     * */
    public function store(Request $request){
        //dd($request->all());

        DB::table('wholesale')->insert([
            'unit_id' => $request->unit,
            'quantity' => $request->quantity,
            'percent' => $request->percent,
        ]);

        return redirect()->back()->with('thongbao', 'Thêm giá sỉ thành công!');
    }
    public function edit(Request $request, $id){
        DB::table('wholesale')->where('id',$id)->update([
            'quantity' => $request->quantity,
            'percent' => $request->percent,
        ]);

        return redirect()->back()->with('thongbao', 'Sửa giá sỉ thành công!');
    }
    public function delete($id){
        DB::table('wholesale')->where('id',$id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa giá sỉ thành công!');
    }
}
