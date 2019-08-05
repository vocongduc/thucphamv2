<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{CateProduct,Product};
use App\Http\Requests\{ProductRequest,editProductRequest};
use Illuminate\Support\Facades\View;
use DB;

class ProductController extends Controller
{
    public function __construct(){
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $this->middleware('auth:admin');
    }
   function getAddProduct() {
       $data['cate'] = CateProduct::all();
       return view('admin.pages.product.addproduct',$data);
   }

   function postAddProduct(ProductRequest $r) {
       //dd($r->all());
        $prd = new Product;
        $prd->name = $r->name;
        $prd->code = $r->code;
        $prd->description = $r->description;
        $prd->slug = str_slug($r->name);
        $prd->quantity = $r->quantity;
        $prd->pay = 0;
        $prd->sale = $r->sale;
        $prd->price = $r->price;
        $prd->price_sale = ($r->price*(100-$r->sale))/100;
        $prd->cate_product = $r->cate_product;
        if ($r->has('image')) {
            $file = $r->image;
            $file_name = str_slug($r->name).'.'.$file->getClientOriginalExtension();
            $file->move('images\img',$file_name);
            $prd->image = $file_name;
        }else
        {
            $prd->image = 'no-img.jpg';
        }
        //dd($prd->image);
        $prd->save();
        return redirect()->route('list.product')->with('thongbao','Thêm sản phẩm thành công');
}

    function getListProduct() {
        $data['prd'] = Product::all();
        return view('admin.pages.product.listproduct',$data);
    }

    function getEditProduct($product_id){
        $data['cate'] = CateProduct::all();
        $data['prd'] = Product::find($product_id);
        return view('admin.pages.product.editproduct',$data);
    }

    function postEditProduct(editProductRequest $r, $product_id) {
        $product = Product::find($product_id);
        $product->name = $r->name;
        $product->code = $r->code;
        $product->description = $r->description;
        $product->slug = str_slug($r->name);
        $product->quantity = $r->quantity;
        $product->pay = 0;
        $product->sale = $r->sale;
        $product->price = $r->price;
        $product->price_sale = ($r->price*(100-$r->sale))/100;
        $product->cate_product = $r->cate_product;
        if ($r->has('image')) {
            $file = $r->image;
            $file_name = str_slug($r->name).'.'.$file->getClientOriginalExtension();
            $file->move('images\img',$file_name);
            $product->image = $file_name;
        }else
        {
            $product->image = $r->old_image;
        }
        $product->save();
        return redirect()->route('list.product')->with('thongbao','Sửa sản phẩm thành công');
    }
    function delProduct($product_id) {
        product::destroy($product_id);
        return redirect()->back()->with('thongbao','Đã xóa sản phẩm thành công')->withInput();
    }
}
