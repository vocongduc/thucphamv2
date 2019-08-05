<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use CKSource\CKFinder\Filesystem\File\File;
use function GuzzleHttp\Psr7\str;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MenuController extends Controller
{
    /**
     * Danh sách tin tức
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $mess = DB::table('contacts')->count();
        view()->share('mess', $mess);
        $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
        view()->share('contact', $contact);
        $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
        view()->share('contacts', $contacts);
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data['menu'] = DB::table('menu')
            ->select('menu.*', 'cate_menu.name as cate_menu')
            ->join('cate_menu', 'menu.cate_id', '=', 'cate_menu.id')
            ->orderByDesc('id')
            ->get();

        return view('admin.pages.menu.list', $data);
    }

    /**
     * Tạo tin tức
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cate_menu'] = DB::table('cate_menu')->get();
        return view('admin.pages.menu.add', $data);
    }

    /**
     * Tạo thể loại tin tức và danh sách thể loại
     *
     * @return \Illuminate\Http\Response
     */
    public function createCate()
    {
        $data['cate_menu'] = DB::table('cate_menu')->get();
        return view('admin.pages.menu.addcate', $data);
    }

    /**
     * Phương thức POST tạo tin tức
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// Bắt lỗi validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'contentt' => 'required',
            'summary' => 'required',
            'tags' => 'required',


        ], [
            'name.required' => 'Tên không được xác định',
            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'summary' => 'Tóm tắt chưa được xác định',
            'contentt.required' => 'Nội dung không được xác định',
            'tags.required' => 'Thể loại không được xác định',

        ]);
//Kiểm tra định dạng ảnh
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_menu/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_menu/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }

        DB::table('menu')->insert([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'summary' => $request->summary,
            'content' => $request->contentt,
            'image' => $file_name,
            'cate_id' => $request->cate_menu,
            'focus' => $request->focus,
            'view' => 10,
            'status' => 1,
            'created_at' => now()
        ]);
        $new_id = DB::table('menu')->where('name', $request->name)->orderBy('id', 'desc')->first();
//Tách chuỗi
        $explode = explode(';', $request->tags);
        foreach ($explode as $ex) {
            if ($ex != "") {
                DB::table('menu_tags')->insert([
                    'name' => $ex,
                    'menu_id' => $new_id->id,
                    'searchs' => 0
                ]);
            }

        }

        return redirect()->route('menu.index')->with('thongbao', 'Add Success');
    }

    /**
     * Phương thức POST thêm thể loại
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeCate(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|unique:cate_menu',

        ], [
            'name.required' => 'Tên không được xác định',
            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'name.unique' => 'Tên đã tồn tại',
        ]);


        DB::table('cate_menu')->insert([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'created_at' => now()
        ]);


        return redirect()->route('menu.createCate')->with('thongbao', 'Add Success');
    }

    /**
     * In ra tin tức
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['menu'] = DB::table('menu')->find($id);
        return view('admin.pages.menu.show', $data);
    }

    /**
     * In ra chi tiết sản phẩm
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $data['menu_tags'] = DB::table('menu_tags')->where('menu_id', '=', $id)->get();
        $data['menu'] = DB::table('menu')->find($id);
        return view('admin.pages.menu.detail', $data);
    }

    /**
     * Thay đổi status ẩn hay hiển thị sản phẩm
     * @param $id
     * @param $status - trạng thái sản phẩm
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setactive($id, $status)
    {
        DB::table('menu')->where('id', '=', $id)->update([
            'status' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

    /**
     * Chỉnh sủa tin tức
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cate_menu'] = DB::table('cate_menu')->get();
        $data['menu'] = DB::table('menu')->find($id);
        $tags = DB::table('menu_tags')->where('menu_id', $id)->pluck('name');
        $array = [];
        foreach ($tags as $value) {
            array_push($array, $value);
        }
        $data['str_tags'] = implode(";", $array);
        return view('admin.pages.menu.edit', $data);
    }

    /**
     * Update tin tưc
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_update = DB::table('menu')->where('id', '=', $id)->pluck('image');

        $this->validate($request, [
            'name' => 'required|min:3',
            'contentt' => 'required',
            'summary' => 'required',
            'tags' => 'required',


        ], [
            'name.required' => 'Tên không được xác định',
            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'summary' => 'Tóm tắt chưa được xác định',
            'contentt.required' => 'Nội dung không được xác định',

            'tags.required' => 'Thể loại không được xác định',

        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_menu/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_menu/', $image);
            $file_name = $image;
            if (file_exists('assets/img_menu/' . $image_update[0]) && $image_update[0] != '') {
                unlink('assets/img_menu/' . $image_update[0]);
            }


        } else {
            $file_name = DB::table('menu')->where('id', '=', $id)->pluck('image')->first();

        }

        DB::table('menu')->where('id', '=', $id)->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'summary' => $request->summary,
            'content' => $request->contentt,
            'image' => $file_name,
            'cate_id' => $request->cate_menu,
            'focus' => $request->focus,
            'view' => 10,
            'status' => 1,
            'created_at' => now()
        ]);

        $new_id = DB::table('menu')->where('name', $request->name)->orderBy('id', 'desc')->first();
        $explode = explode(';', $request->tags);

        foreach ($explode as $ex) {
            if ($ex != "") {
                DB::table('menu_tags')->insert([
                    'name' => $ex,
                    'menu_id' => $new_id->id,
                    'searchs' => 0
                ]);
            }

        }
        return redirect()->route('menu.index')->with('thongbao', 'Add Success');
    }

    /**
     *  Xóa tin tức
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $image = DB::table('menu')->where('id', '=', $id)->pluck('image');
        foreach ($image as $im) {
            if (file_exists('assets/img_menu/' . $im) && $im != '') {
                unlink('assets/img_menu/' . $im);
            }
        }
        DB::table('menu')->where('id', '=', $id)->delete();


        return redirect()->route('menu.index')->with('thongbao', 'Add Success');
    }

    public function destroyCate($id)
    {
        DB::table('cate_menu')->where('id', '=', $id)->delete();
        return redirect()->route('menu.createCate')->with('thongbao', 'Add Success');
    }
}
