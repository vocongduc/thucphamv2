<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BillUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('bills', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->string('name');
           $table->string('phone');
           $table->string('email')->nullable();
           $table->date('date');
           $table->string('address');
           $table->text('content')->nullable();
           $table->integer('total');
           $table->tinyInteger('status')->default(0);
           $table->timestamps();
        });
        Schema::create('bill_items', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->bigInteger('bill_id')->unsigned();
           $table->foreign('bill_id')
               ->references('id')
               ->on('bills')
               ->onDelete('cascade');
           $table->string('product_name');
           $table->integer('quantity');
           $table->integer('money');
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
