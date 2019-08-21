<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // san pham
        Schema::create('cate_products_lv1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('cate_products_lv2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('cate_lv1_id')->unsigned();
            $table->foreign('cate_lv1_id')
                ->references('id')
                ->on('cate_products_lv1')
                ->onDelete('casdae');
            $table->timestamps();
        });
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->text('description');
            $table->string('slug');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('pay');
            $table->bigInteger('sale');
            $table->bigInteger('price');
            $table->bigInteger('price_sale');
            $table->bigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('cate_product')->unsigned()->nullable();
            $table->foreign('cate_product')
            ->references('id')
            ->on('cate_products_lv2')
            ->onDelete('cascade');
            $table->timestamps();
        });

        // tin tuc
        Schema::create('cate_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
//
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('summary');
            $table->text('content');
            $table->integer('focus');
            $table->integer('view')->default(0);
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
            ->references('id')
            ->on('cate_news')
            ->onDelete('cascade');
            $table->timestamps();
            $table->integer('status');
        });
        Schema::create('news_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')
            ->references('id')
            ->on('news')
            ->onDelete('cascade');
            $table->timestamps();
            $table->integer('searchs');
        });

        // thuc don
        Schema::create('cate_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
//
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('summary');
            $table->text('content');
            $table->integer('focus');
            $table->integer('view')->default(0);
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
                ->references('id')
                ->on('cate_menu')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('status');
        });
        Schema::create('menu_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('menu_id')->unsigned();
            $table->foreign('menu_id')
                ->references('id')
                ->on('menu')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('searchs');
        });

        //tuyen dung
        Schema::create('recruitments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('vitri')->nullable();
            $table->string('dotuoi')->nullable();
            $table->string('kinhnghiem')->nullable();
            $table->string('hocvan')->nullable();
            $table->string('nguoilienhe')->nullable();
            $table->string('sdt')->nullable();
            $table->string('soluong')->nullable();
            $table->string('email')->nullable();
            $table->integer('salaryMin');
            $table->integer('salaryMax');
            $table->string('address');
            $table->string('slug');
            $table->string('image');
            $table->integer('status');
            $table->text('content');
            $table->timestamps();
        });
        Schema::create('recruitment_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('recruitment_id')->unsigned();
            $table->foreign('recruitment_id')
            ->references('id')
            ->on('recruitments')
            ->onDelete('cascade');
            $table->timestamps();
            $table->integer('searchs');
        });
        //lien he
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('email');
            $table->string('title');
            $table->string('phone');
            $table->text('content');
            $table->timestamps();
        });
        //change contactinfor
        Schema::create('change_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('certificate');
            $table->string('email');
            $table->string('fblink');
            $table->string('website');
            $table->timestamps();
        });
        // vai tro
        Schema::create('role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('describe')->nullable();
        });

//        Đối tác
        Schema::create('partner',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('logo');
            $table->string('link');
            $table->string('address');
            $table->string('phone');
            $table->text('summary');
            $table->text('content');
            $table->string('fax');
            $table->integer('status');
            $table->timestamps();
        });
//      Theo dõi
        Schema::create('follow',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('logo');
            $table->string('link');
            $table->integer('status');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
