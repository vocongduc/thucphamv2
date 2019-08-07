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
            ->select('products.*', 'cate_products_lv2.cate_lv1_id')
            ->join('cate_products_lv2', 'cate_products_lv2.id','=', 'products.cate_product')
            ->where('status',1)->orderBy('id', 'desc')->get();
        //dd($data);


        return view('page.home', $data);
    }
}
