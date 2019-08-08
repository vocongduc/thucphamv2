<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;

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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['cate_parents']= DB::table('cate_products_lv1')->orderBy('id', 'desc')->get();
        $data['cate_childs']= DB::table('cate_products_lv2')->orderBy('id', 'desc')->get();
        $data['products']= DB::table('products')
            ->select('products.*', 'cate_products_lv2.cate_lv1_id', 'units.name as unit')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->join('cate_products_lv2', 'cate_products_lv2.id','=', 'products.cate_product')
            ->where('status',1)->orderBy('id', 'desc')->get();
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
}
