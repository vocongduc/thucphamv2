<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroduceController extends Controller
{
    //
    public function index(){


        return view('admin.pages.introduce.index');
    }
}
