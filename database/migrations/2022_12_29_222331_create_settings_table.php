<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("site_name")->default(config("app.name"));
            $table->text("site_desc")->nullable();
            $table->string("site_logo")->nullable();
            $table->string("site_cover")->nullable();
            $table->string("site_icon")->nullable();
            ///////////////////////////////////////////////
            $table->string("sales_programAndService_phone1")->nullable();
            $table->string("sales_programAndService_phone2")->nullable();
            $table->string("sales_marketingService_phone1")->nullable();
            $table->string("sales_marketingService_phone2")->nullable();
            $table->string("sales_it_phone1")->nullable();
            $table->string("sales_it_phone2")->nullable();
            $table->string("technical_programAndService_phone1")->nullable();
            $table->string("technical_programAndService_phone2")->nullable();
            $table->string("technical_marketingService_phone1")->nullable();
            $table->string("technical_marketingService_phone2")->nullable();
            $table->string("technical_it_phone1")->nullable();
            $table->string("technical_it_phone2")->nullable();
            $table->string("manager_phone1")->nullable();
            $table->string("manager_phone2")->nullable();
            ////////////////////////////////////////
            $table->string("whatsapp")->nullable();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("instagram")->nullable();
            $table->string("youtube")->nullable();
            $table->string("telegram")->nullable();
            $table->string("linkedIn")->nullable();
            $table->string("github")->nullable();
            $table->string("link1")->nullable();
            $table->string("link2")->nullable();
            $table->string("link3")->nullable();
            ////////////////////////////////
            $table->string("addressAr")->nullable();
            $table->string("addressEn")->nullable();
            $table->string("email");



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
        Schema::dropIfExists('settings');
    }
};
