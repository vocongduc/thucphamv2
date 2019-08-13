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
                            $html.='<img src="'. asset('images/img/'.$value->image) .'">';
                            $html.='<p style="text-align: center;" class="mt-2">';
            if ($value->quantity > 0) {
                $html.='<span > còn hàng </span >';
            }else {
                $html.='<span > hết hàng </span >';
            }
            $html.='<br>';
            $html.='<span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>';
            $html.='<br>';
            $html.='<a href="'. route('san-pham-chi-tiet') .'">'.$value->name .'</a><br>';
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
        }
        $this->html($products);
    }
    public function sapxep(Request $request){
        //dd($request->all())
             if($request->cate_id != null){
                 $products = DB::table('products')
                     ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                     ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                     ->join('units', 'units.id', '=', 'products.unit_id')
                     ->where('cate_products_lv2.cate_lv1_id', $request->cate_id)
                     ->where('products.status', 1)
                     ->orderBy($request->value, $request->method)
                     ->get();


             }
             else {
                 $products = DB::table('products')
                     ->select('products.*', 'units.name as unit')
                     ->join('units', 'units.id', '=', 'products.unit_id')
                     ->where('products.status', 1)
                     ->orderBy($request->value, $request->method)->orderBy('id', 'desc')
                     ->limit($request->number)->get();
             }
        $this->html($products);
    }
    public function gia(Request $request){
        //dd($request->cate_id);
             if($request->cate_id != null){
               if ($request->max != null) {
                     $products = DB::table('products')
                              ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                              ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                              ->join('units', 'units.id', '=', 'products.unit_id')
                         ->where([
                             ['sale', '>', $request->min],
                             ['sale', '<', $request->max],
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
                             ['sale', '>', $request->min],
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
                                    ['sale', '>', $request->min],
                                    ['sale', '<', $request->max],
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
                                ['sale', '>', $request->min],
                                ['products.status', 1],
                            ])->orderBy('id', 'desc')
                            ->get();
                    }
             }
             //dd($products);
        $this->html($products);
    }
}
