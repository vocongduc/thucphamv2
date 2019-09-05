<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //
    public function html($product){
        //dd($product);
        $html="";
        foreach ($product as $value){
            $html.="<div>";
                            $html.='<img src="'. asset('images/img/'.$value->main_image) .'">';
                            $html.='<p style="text-align: center;" class="mt-2">';
            if ($value->quantity > 0) {
                $html.='<span > còn hàng </span >';
            }else {
                $html.='<span > hết hàng </span >';
            }
            $html.='<br>';
            $html.='<span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>';
            $html.='<br>';
            $html.='<a href="'. url('product/'.$value->slug) .'">'.$value->name .'</a><br>';
            $html.='<span style="color: red ; font-weight: bold;">'. number_format($value->price_sale) .'VNĐ/'. $value->unit .'</span>';
            $html.='</p>';
            $html.="</div>";
        }
        echo $html;
    }

    public function hienthi(Request $request){
        //dd($request->all());
        if($request->cate_id != null){
            $products = DB::table('products')
                ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                ->join('units', 'units.id', '=', 'products.unit_id')
                ->where('cate_products_lv2.cate_lv1_id', $request->cate_id)
                ->where('products.status', 1)->orderBy('id', 'desc')
                ->limit($request->number)->get();

        }
        else {
            $products = DB::table('products')
                ->select('products.*', 'units.name as unit')
                ->join('units', 'units.id', '=', 'products.unit_id')
                ->where('products.status', 1)->orderBy('id', 'desc')
                ->limit($request->number)->get();
            //dd('hihi');
        }
        $this->html($products);
    }
    public function sapxep(Request $request){
        //dd($request->all());
             if($request->cate_id != null){
                 $products = DB::table('products')
                     ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                     ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                     ->join('units', 'units.id', '=', 'products.unit_id')
                     ->where('cate_products_lv2.cate_lv1_id', $request->cate_id)
                     ->where('products.status', 1)
                     ->orderBy('products.'.$request->value, $request->method)
                     ->get();
                 //dd('hihi');
             }
             else {
                 $products = DB::table('products')
                     ->select('products.*', 'units.name as unit')
                     ->join('units', 'units.id', '=', 'products.unit_id')
                     ->where('products.status', 1)
                     ->orderBy($request->value, $request->method)->orderBy('id', 'desc')
                     ->limit($request->number)->get();
                 //dd('hihi');

             }
        $this->html($products);
    }
    public function gia(Request $request){
        //dd($request->all());
             if($request->cate_id != null){
               if ($request->max != null) {
                     $products = DB::table('products')
                              ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                              ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                              ->join('units', 'units.id', '=', 'products.unit_id')
                         ->where([
                             ['price_sale', '>', $request->min],
                             ['price_sale', '<', $request->max],
                             ['products.status', 1],
                             ['cate_products_lv2.cate_lv1_id', $request->cate_id],
                         ])->orderBy('id', 'desc')
                         ->get();
                 }
                 else{
                     $products = DB::table('products')
                         ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                         ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                         ->join('units', 'units.id', '=', 'products.unit_id')
                         ->where([
                             ['price_sale', '>', $request->min],
                             ['products.status', 1],
                             ['cate_products_lv2.cate_lv1_id', $request->cate_id],
                         ])->orderBy('id', 'desc')
                         ->get();
                 }
             }
             else {
                   if ($request->max != null) {
                        $products = DB::table('products')
                            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                            ->join('units', 'units.id', '=', 'products.unit_id')
                            ->where([
                                    ['price_sale', '>', $request->min],
                                    ['price_sale', '<', $request->max],
                                    ['products.status', 1],
                            ])->orderBy('id', 'desc')
                            ->get();
                    }
                    else{
                        $products = DB::table('products')
                            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                            ->join('units', 'units.id', '=', 'products.unit_id')
                            ->where([
                                ['price_sale', '>', $request->min],
                                ['products.status', 1],
                            ])->orderBy('id', 'desc')
                            ->get();
                    }
             }
             //dd($products);
        $this->html($products);
    }
    public function xoaanh(Request $request){
        // dd($request->image);
        if($request->image!='no-img.jpg' && file_exists('images/img/'.$request->image)){
            unlink('images/img/'.$request->image);
            echo 'ok';
        }

    }
    public function muaxi(Request $request){
        dd($request->all());
        $product = DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit', 'wholesale.percent', 'wholesale.quantity')
            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->join('wholesale', 'wholesale.unit_id', '=', 'units.id')
            ->where('products.id', $request->product_id)
            ->first();
        $sale = $product->price_sale-($product->price_sale * $product->percent)/100;
        $html='';

        <h4>Giá sỉ: 1000000/kg</h4>
                <span>Số lượng</span>
                <input type="number" id="quantity" class="form-control" style="width: 100px" value="0">
                <button class="btn btn-outline-primary">Đặt Hàng</button>
    }
}
