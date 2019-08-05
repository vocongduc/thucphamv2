<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




    

Route::prefix('gioithieu')->group(function () {

    Route::get('/', function () {
        return view('page.gioithieu');
    })->name('gioi-thieu');

    Route::get('album-Anh', function () {
        return view('page.albumAnh');
    })->name('album-Anh');

    Route::get('video-Clip', function () {
        return view('page.videoClip');
    })->name('video-Clip');

    Route::get('doi-Tac', function () {
        return view('page.doiTac');
    })->name('doi-Tac');

    Route::get('giay-Chung-Nhan', function () {
        return view('page.giayChungNhan');
    })->name('giay-Chung-Nhan');
});

Route::prefix('tintuc')->group(function () {

    Route::get('/', 'ClientController@tintuc')->name('tin-tuc');

    Route::get('am-thuc', function () {
        return view('page.amThuc');
    })->name('am-thuc');

    Route::get('truyen-thong-bao-chi', function () {
        return view('page.truyenThongBaoChi');
    })->name('truyen-thong-bao-chi');

    Route::get('kien-thuc', function () {
        return view('page.kienThuc');
    })->name('kien-thuc');
    Route::get('tin-tuc-chi-tiet', function () {
        return view('page.tintucchitiet');
    })->name('tin-tuc-chi-tiet');


});

Route::prefix('sanpham')->group(function () {

    Route::get('/', function () {
        return view('page.sanPham');
    })->name('san-pham');

    Route::get('dac-san-vung-mien', function () {
        return view('page.dacSan');
    })->name('dac-san-vung-mien');

    Route::get('rau-cu', function () {
        return view('page.rauCu');
    })->name('rau-cu');
    Route::get('hoa-qua', function () {
        return view('page.hoaqua');
    })->name('hoa-qua');
    Route::get('thuc-pham-tuoi-song', function () {
        return view('page.thucphamtuoisong');
    })->name('thuc-pham-tuoi-song');
    Route::get('thuc-pham-khac', function () {
        return view('page.thucphamkhac');
    })->name('thuc-pham-khac');
    Route::get('san-pham-chi-tiet', function () {
        return view('page.sanphamchitiet');
    })->name('san-pham-chi-tiet');


});

Route::prefix('lienhe')->group(function () {

    Route::get('/', 'ContactController@create')->name('lien-he');
    Route::post('/', 'ContactController@store')->name('store');

});
Route::prefix('tuyendung')->group(function () {

    Route::get('/', 'ClientController@tuyendung')->name('tuyen-dung');
    Route::get('Tuyendungchitiet',function(){
        return view('page.Tuyendungchitiet');
        })->name('tuyen-dung-chi-tiet');

});

Route::prefix('khuyenmai')->group(function () {

    Route::get('/', function () {
        return view('page.khuyenMai');
    })->name('khuyen-mai');
    Route::get('khuyen-mai-chi-tiet', function () {
        return view('page.khuyenmaichitiet');
    })->name('khuyen-mai-chi-tiet');

});
Route::prefix('lichhang')->group(function () {

    Route::get('/', function () {
        return view('page.lichHang');
    })->name('lich-hang');

});
Route::prefix('thucdon')->group(function () {

    Route::get('/', 'ClientController@thucdon')->name('thuc-don');

});


Route::prefix('gio-hang')->group(function () {

    Route::get('/', function () {
        return view('page.giohang');
    })->name('gio-hang');

});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/*
 * Route cho admin
 */
Route::group(['prefix' => 'admincp'],function(){
    /*
     * Admin đăng nhập
     */
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login_post');
    /*
     * Admin đăng xuất
     */
    Route::get('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    //Quên Password Admin
    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    //Reset Password Admin
    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');

});

Route::group(['prefix' => 'admincp','middleware' => 'auth:admin'],function(){
    /*
     * Admin dashboard
     */
    Route::get('/','Admin\HomeController@index')->name('admin.dashboard');
    Route::get('/dashboard','Admin\HomeController@index')->name('admin.dashboard');
    /*
     * Manager Account
     */
    Route::prefix('account')->group(function (){
       /*
        * Manager admin
        */
        Route::group(['prefix' => 'admin'],function (){
           Route::get('/','Admin\AdminAccountController@index')->name('admin.account.index');
           Route::get('create','Admin\AdminAccountController@create')->name('admin.account.create');
           Route::post('create','Admin\AdminAccountController@store')->name('admin.account.store');
           Route::get('lock/{id}','Admin\AdminAccountController@lock')->name('admin.account.lock');
           Route::get('unlock/{id}','Admin\AdminAccountController@unlock')->name('admin.account.unlock');
           Route::get('edit/{id}','Admin\AdminAccountController@edit')->name('admin.account.edit');
           Route::post('edit/{id}','Admin\AdminAccountController@update')->name('admin.account.update');
           Route::get('destroy/{id}','Admin\AdminAccountController@destroy')->name('admin.account.delete');
        });
        /*
         * Manager user
         */
        Route::group(['prefix' => 'user'],function (){
            Route::get('/','Admin\UserAccountController@index')->name('user.account.index');
            Route::get('create','Admin\UserAccountController@create')->name('user.account.create');
            Route::post('create','Admin\UserAccountController@store')->name('user.account.store');
            Route::get('lock/{id}','Admin\UserAccountController@lock')->name('user.account.lock');
            Route::get('unlock/{id}','Admin\UserAccountController@unlock')->name('user.account.unlock');
            Route::get('edit/{id}','Admin\UserAccountController@edit')->name('user.account.edit');
            Route::post('edit/{id}','Admin\UserAccountController@update')->name('user.account.update');
        });
    });

    //tuyen dung
    Route::prefix('recruitment')->group(function(){
        //add
        Route::get('add', 'RecruitmentController@add')->name('recruitment.add');
        Route::post('add', 'RecruitmentController@store');
        //list
        Route::get('list', 'RecruitmentController@index')->name('recruitment.index');
        //xoa
        Route::get('delete/{id}', 'RecruitmentController@delete')->name('recruitment.delete');
        //edit
        Route::get('edit/{id}', 'RecruitmentController@edit')->name('recruitment.edit');
        Route::post('edit/{id}', 'RecruitmentController@editStore');
        //action
        Route::get('act/{id}/{status}', 'RecruitmentController@act')->name('recruitment.action');
    });

//    News
    Route::prefix('news')->group(function () {
        Route::get('/list', 'NewsController@index')->name('news.index');

        Route::get('/add', 'NewsController@create')->name('news.create');
        Route::post('/add', 'NewsController@store')->name('news.store');

        Route::get('/add-cate', 'NewsController@createCate')->name('news.createCate');
        Route::post('/add-cate', 'NewsController@storeCate')->name('news.storeCate');

        Route::get('/edit/{id}', 'NewsController@edit')->name('news.edit');
        Route::post('/edit/{id}', 'NewsController@update')->name('news.update');

        Route::get('/destroy/{id}', 'NewsController@destroy')->name('news.destroy');
        Route::get('/destroy-cate/{id}', 'NewsController@destroyCate')->name('news.destroyCate');

        Route::get('/show/{id}', 'NewsController@show')->name('news.show');

        Route::get('/detail/{id}', 'NewsController@detail')->name('news.detail');
        Route::get('/setactive/{id}/{status}', 'NewsController@setactive')->name('news.setactive');


    });
//    Menu
    Route::prefix('menu')->group(function () {
        Route::get('/list', 'MenuController@index')->name('menu.index');

        Route::get('/add', 'MenuController@create')->name('menu.create');
        Route::post('/add', 'MenuController@store')->name('menu.store');

        Route::get('/add-cate', 'MenuController@createCate')->name('menu.createCate');
        Route::post('/add-cate', 'MenuController@storeCate')->name('menu.storeCate');

        Route::get('/edit/{id}', 'MenuController@edit')->name('menu.edit');
        Route::post('/edit/{id}', 'MenuController@update')->name('menu.update');

        Route::get('/destroy/{id}', 'MenuController@destroy')->name('menu.destroy');
        Route::get('/destroy-cate/{id}', 'MenuController@destroyCate')->name('menu.destroyCate');

        Route::get('/show/{id}', 'MenuController@show')->name('menu.show');

        Route::get('/detail/{id}', 'MenuController@detail')->name('menu.detail');
        Route::get('/setactive/{id}/{status}', 'MenuController@setactive')->name('menu.setactive');


    });

    // product

    Route::group(['prefix' => 'product'], function () {
        Route::get('add-category', 'admin\CateProductController@getAddCategory')->name('add.category');
        Route::post('add-category', 'admin\CateProductController@postAddCategory');
        Route::get('edit-category/{cate_id}', 'admin\CateProductController@getEditCategory');
        Route::post('edit-category/{cate_id}', 'admin\CateProductController@postEditCategory');
        Route::get('del-category/{cate_id}', 'admin\CateProductController@DelCategory');

        Route::get('add-product', 'admin\ProductController@getAddProduct')->name('add.product');
        Route::post('add-product', 'admin\ProductController@postAddProduct');
        Route::get('edit-product/{product_id}', 'admin\ProductController@getEditProduct');
        Route::post('edit-product/{product_id}', 'admin\ProductController@postEditProduct');
        Route::get('list-product', 'admin\ProductController@getListProduct')->name('list.product');
        Route::get('del-product/{product_id}', 'admin\ProductController@delProduct');

    });
    //lien he
    Route::prefix('contact')->group(function () {
        //list
        Route::get('list', 'ContactController@index')->name('contact.index');
        //delete
        Route::get('/delete/{id}', 'ContactController@destroy')->name('contact.delete');
        //changer infor
        Route::get('change','ContactController@createChange')->name('contact.change');
        Route::post('change','ContactController@storeChange');
        //delete infor cn
        Route::get('/deleteinfor/{id}', 'ContactController@destroyinfor')->name('contact.deleteinfor');
        // edit
        Route::get('/edit/{id}', 'ContactController@edit')->name('contact.edit');
        Route::post('/edit/{id}','ContactController@editStore');
    });    
    

//    Đối tác

    Route::prefix('partner')->group(function () {
        Route::get('/list', 'PartnerController@index')->name('partner.index');

        Route::get('/add', 'PartnerController@create')->name('partner.create');
        Route::post('/add', 'PartnerController@store')->name('partner.store');


        Route::get('/edit/{id}', 'PartnerController@edit')->name('partner.edit');
        Route::post('/edit/{id}', 'PartnerController@update')->name('partner.update');

        Route::get('/destroy/{id}', 'PartnerController@destroy')->name('partner.destroy');
        Route::get('/destroy-cate/{id}', 'PartnerController@destroyCate')->name('partner.destroyCate');

        Route::get('/show/{id}', 'PartnerController@show')->name('partner.show');

        Route::get('/detail/{id}', 'PartnerController@detail')->name('partner.detail');
        Route::get('/setactive/{id}/{status}', 'PartnerController@setactive')->name('partner.setactive');
    });

    //profile
    Route::group(['prefix' => 'profile'], function () {
        //list
        Route::get('/', 'Admin\AdminProfileController@index')->name('profile');
        //chang status products
        Route::post('change-status-products', 'Admin\AdminProfileController@changeStatusProducts')->name('change-status-products');
        Route::post('delete-products', 'Admin\AdminProfileController@deleteProduct')->name('delete-products');
        Route::post('account-user-list', 'Admin\AdminProfileController@listUser')->name('account-user-list');//add
        Route::post('account-user-add', 'Admin\AdminProfileController@listUserAdd')->name('account-user-add');//add
        Route::post('account-user-edit', 'Admin\AdminProfileController@listUserEdit')->name('account-user-edit');//edit
        Route::post('account-user-delete', 'Admin\AdminProfileController@listUserDelete')->name('account-user-delete');//delete
        //user

    });
});
