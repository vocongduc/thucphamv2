<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    //
    public function index(){
        $data['services'] = DB::table('services')->orderBy('id', 'desc')->get();

        return view('admin.pages.services.index', $data);
    }
}
