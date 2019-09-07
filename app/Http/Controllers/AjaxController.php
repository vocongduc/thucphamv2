<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Cart;

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
        //dd($request->all());
        $product = DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit', 'units.id as unit_id')
            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->where('products.id', $request->product_id)
            ->first();

        $html="";

        if($request->value==0){
            $html.='<h4>Giá lẻ: '.number_format($product->price_sale).'đ/kg</h4>';
            $quantity=0;
        }
        else{
            $wholesale = DB::table('wholesale')
                ->where('unit_id', $product->unit_id)->first();
            $sale = $product->price_sale-($product->price_sale * $wholesale->percent)/100;

            $html.='<h4>Giá sỉ: '.number_format($sale).'đ/kg</h4>';
            $quantity=$wholesale->quantity;
        }

        $html.="<span>Số lượng</span>"
            .'<input type="number" id="quantity-cart-'.$request->product_id.'" class="form-control" style="width: 100px" value="'.$quantity.'" min="'.$quantity.'">'
            .'<button class="btn btn-outline-primary" id="cart-'.$request->product_id.'" onclick="addcart(this, '.$request->product_id.','.$request->value.')">Đặt Hàng</button>';
        echo $html;
    }
    public function addcart(Request $request){
        //dd($request->all());
        $product = DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit', 'units.id as unit_id')
            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->where('products.id', $request->id)
            ->first();
        if($request->mua==0){
            //dd('mua lẻ');
            $price=$product->price_sale;
//            dd($price);
        }else{
            //dd('mua sỉ');
            $wholesale = DB::table('wholesale')
                ->where('unit_id', $product->unit_id)->first();
            $price = $product->price_sale-($product->price_sale * $wholesale->percent)/100;

        }
        \Cart::add(array(
            array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'conlai' => $product->quantity,
                    'image' => $product->main_image,
                    'mua'   => $request->mua
                )

            ),
        ));

        $html='<div class="alert alert-success">'
            .'<h3>Thêm vào giỏ hàng thành công!</h3>'
              .'<a href="'. url('').'" class="btn btn-success">Tiếp tục mua hàng</a>'
              .'<a href="'. route('giohang') .'" class="btn btn-primary">Tới xem giỏ hàng</a>'
            .'</div>';
        echo $html;
    }
}
