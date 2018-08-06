<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('CASCADE');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE');
            $table->unsignedInteger('sub_district_id');
            $table->foreign('sub_district_id')->references('id')->on('sub_districts')->onDelete('CASCADE');
            $table->string('first_name');
            $table->string('last_name');            
            $table->integer('charges');            
            $table->text('address');            
            $table->string('phone_number');            
            $table->string('email');            
            $table->smallInteger('status')->default(0);            
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
        Schema::dropIfExists('purchasings');
    }
}
