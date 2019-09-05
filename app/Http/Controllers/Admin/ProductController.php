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
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
    }
    function getAddProduct() {
        $data['cate'] =  DB::table('cate_products_lv2')->get();
        $data['units'] =  DB::table('units')->get();
        return view('admin.pages.product.addproduct',$data);
    }

    function postAddProduct(Request $request) {
        //dd($request->all());
        $request->validate([
            'code' => 'unique:products,code',
        ],[
            'code.unique' => 'mã sản phẩm này đã tồn tại!',
        ]);
        $input = $request->all();
        $product = new Product();
        $sale = $input['price'] - ($input['price'] * $input['sale'])/100;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_product_" . $name;
            while (file_exists('images/img/' . $avatar)) {
                $avatar = time() . "_product_" . $name;
            }
            $file->move('images/img/', $avatar);
            $main_image = $avatar;
        }
        else{
            $main_image= 'no-img.jpg';
        }
        $image="";
        if($input['image-number'] != 0) {

            for($i = 1; $i<= $input['image-number']; $i++) {
                if(isset($input['file-'.$i])) {
                    if ($request->hasFile('file-'.$i)) {
                        $file = $request->file('file-'.$i);
                        $name = $this->imagename($file->getClientOriginalName());
                        $avatar = time() . "_product_" . $name;
                        while (file_exists('images/img/' . $avatar)) {
                            $avatar = time() . "_product_" . $name;
                        }
                        $file->move('images/img/', $avatar);
                        $image .= $avatar.",";
                    }
                }
            }
        }

        $product->name = $input['name'];
        $product->code = $input['code'];
        $product->summary = $input['summary'];
        $product->description = $input['content'];
        $product->slug = str_slug($input['name']).'-'.time().'.html';
        $product->main_image = $main_image;
        $product->image = $image;
        $product->quantity = $input['quantity'];
        $product->sale = $input['sale'];
        $product->price = $input['price'];
        $product->price_sale = $sale;
        $product->unit_id = $input['unit'];
        $product->cate_product = $input['cate_product'];

        $product->save();
        return redirect()->route('list.product')->with('thongbao','Thêm sản phẩm thành công');
    }

    function getListProduct() {
        $data['products'] = DB::table('products')
            ->select('products.*', 'cate_products_lv2.name as cate')
            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.id')
            ->get();
//        dd($data);
        return view('admin.pages.product.index',$data);
    }

    function getEditProduct($product_id){
        $data['cate'] = CateProduct::all();
        $data['units'] =  DB::table('units')->get();
        $data['product'] = Product::find($product_id);
        $data['images'] = explode(',', $data['product']->image);
        return view('admin.pages.product.editproduct',$data);
    }

    function postEditProduct(Request $request, $product_id) {
        $product = Product::find($product_id);
        //dd($request->all());

        $input = $request->all();
        $sale = $input['price'] - ($input['price'] * $input['sale'])/100;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $this->imagename($file->getClientOriginalName());
            $avatar = time() . "_product_" . $name;
            while (file_exists('images/img/' . $avatar)) {
                $avatar = time() . "_product_" . $name;
            }
            $file->move('images/img/', $avatar);
            $main_image = $avatar;
        }
        else{
            $main_image= $input['old-main-image'];
        }
        $image = "";
        if($input['image-number'] != 0) {

            for($i = 1; $i<= $input['image-number']; $i++) {
                if(isset($input['file-'.$i] )) {
                    if ($request->hasFile('file-'.$i)) {
                        $file = $request->file('file-'.$i);
                        $name = $this->imagename($file->getClientOriginalName());
                        $avatar = time() . "_product_" . $name;
                        while (file_exists('images/img/' . $avatar)) {
                            $avatar = time() . "_product_" . $name;
                        }
                        $file->move('images/img/', $avatar);
                        if(isset($input['old-image-'.$i])) {
                            if ($input['old-image-' . $i] != 'no-img.jpg' && file_exists('images/img/' . $input['old-image-' . $i])) {
                                unlink('images/img/' . $input['old-image-' . $i]);
                            }
                        }
                        $image .= $avatar.",";
                    }
                }
                elseif(isset($input['old-image-'.$i])){
                    $image .=$input['old-image-'.$i].',';
                }
            }
        }

        $product->name = $input['name'];
        $product->summary = $input['summary'];
        $product->description = $input['content'];
        $product->slug = str_slug($input['name']).'-'.time().'.html';
        $product->main_image = $main_image;
        $product->image = $image;
        $product->quantity = $input['quantity'];
        $product->sale = $input['sale'];
        $product->price = $input['price'];
        $product->price_sale = $sale;
        $product->unit_id = $input['unit'];
        $product->cate_product = $input['cate_product'];

        $product->save();
        return redirect()->route('list.product')->with('thongbao','Sửa sản phẩm thành công');
    }
    function delProduct($product_id) {
        $product = Product::find($product_id);
        if($product->main_image!='no-img.jpg' && file_exists('images/img/' . $product->main_image)){
            unlink('images/img/' .  $product->main_image);
        }

        $images = explode(',', $product->image);
        foreach ($images as $image){
            if($image!='' && file_exists('images/img/' . $image)){
                unlink('images/img/' .  $image);
            }
        }
        $product->delete();
        return redirect()->back()->with('thongbao','Đã xóa sản phẩm thành công')->withInput();
    }
}
