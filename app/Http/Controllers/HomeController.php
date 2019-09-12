<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
        view()->share('search_cates', DB::table('cate_products_lv1')->orderBy('id', 'desc')->get());
        view()->share('introduces', DB::table('introduces')->orderBy('id', 'desc')->first());

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['cate_parents']= DB::table('cate_products_lv1')->orderBy('id', 'desc')->paginate(4);
        $data['cate_childs']= DB::table('cate_products_lv2')->orderBy('id', 'desc')->get();
        $data['products']= DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->join('cate_products_lv2', 'cate_products_lv2.id','=', 'products.cate_product')
            ->where('status',1)->orderBy('id', 'desc')->get();
        $data['sliders'] = DB::table('sliders')->orderBy('id', 'desc')->get();
        $data['services'] = DB::table('services')->limit(6)->get();
        //dd($data);


        return view('page.home', $data);
    }

    public function catelv1($slug){
        if($slug=='all'){
            $data['products'] = DB::table('products')
                ->select('products.*', 'units.name as unit')
                ->join('units', 'units.id', '=', 'products.unit_id')
                ->where('status', 1)->orderBy('id', 'desc')->get();
        }
        else {
            $data['cate_parents'] = DB::table('cate_products_lv1')->where('slug', $slug)->first();
            $data['cate_childs'] = DB::table('cate_products_lv2')->where('cate_lv1_id', $data['cate_parents']->id)->get();
            $data['products'] = DB::table('products')
                ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
                ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
                ->join('units', 'units.id', '=', 'products.unit_id')
                ->where('cate_products_lv2.cate_lv1_id', $data['cate_parents']->id)
                ->where('status', 1)->orderBy('id', 'desc')->get();
        }

        return view('page.sanPham', $data);
    }
    public function sanpham($slug){
        $data['product'] = DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit', DB::raw('(select count(*) from wholesale where wholesale.unit_id = units.id) as si'))
            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->where('products.slug', $slug)->first();
        $data['images']= explode(',', $data['product']->image);
        return view('page.sanphamchitiet', $data);
    }
    public function giohang(){
     $data['carts'] =\Cart::getContent();
     $tong=0;
     foreach($data['carts'] as $key => $item){
         $tong+=($item->quantity*$item->price);
     }
     $data['tong']=$tong;

     return view('page.giohangchitiet', $data);
    }

    /*
    * thanh toán
    * */
    public function thanhtoan(){
        $carts =\Cart::getContent();
        $tong=0;
        foreach($carts as $key => $item){
            $tong+=($item->quantity*$item->price);
        }
        $data['tong']=$tong;

        return view('page.diachigiaohang', $data);
    }

    public function postthanhtoan(Request $request){
        //dd($request->all());
        $carts =\Cart::getContent();
        $tong=0;
        foreach($carts as $key => $item){
            $tong+=($item->quantity*$item->price);
        }
        if($request->address==0){
            $address = $request->diachi;
        }
        else{
            $address = 'Lấy tại cửa hàng';
        }
        DB::table('bills')->insert([
           'name' => $request->name,
           'phone' => $request->phone,
           'email' => $request->email,
           'date' => $request->date,
           'address' =>$address,
            'content' => $request->content,
            'total' => $tong,
            'created_at' => now()
        ]);
        $bill = DB::table('bills')->orderBy('id', 'desc')->first();


        foreach($carts as $key => $item){

            DB::table('bill_items')->insert([
                'bill_id' => $bill->id,
                'product_name' => $item->name,
                'quantity' => $item->quantity,
                'money' => $item->quantity*$item->price
            ]);


        }

        return redirect('/')->with('thongbao', 'Bạn đã đật hàng thành công! xin cảm ơn!');

    }
    public function search(Request $request){
        //dd($request->all());
        $data['keyword'] = $request->product;
        $data['products'] = DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->where([
                ['cate_products_lv2.cate_lv1_id', $request->cate],
                ['products.name', 'like', '%'.$request->product.'%']
            ])
            ->where('status', 1)->orderBy('id', 'desc')->get();
        $data['count'] = DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
            ->join('cate_products_lv2', 'cate_products_lv2.id', '=', 'products.cate_product')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->where([
                ['cate_products_lv2.cate_lv1_id', $request->cate],
                ['products.name', 'like', '%'.$request->product.'%']
            ])
            ->where('status', 1)->orderBy('id', 'desc')->count();

        return view('page.sanPham', $data);
    }
    public function gioithieu(){
        return view('page.gioithieu');
    }
}
