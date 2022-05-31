<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('email_signatures', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('department');
            $table->string('direct');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('image')->default('GF.png');
            $table->string('first_no')->default('(573) 761-5038 Direct');
            $table->string('second_no')->default('(573) 893-3000 Main');
            $table->string('website_link')->default('gravesfoods.com');
            $table->string('youtube')->default('https://youtube.com/v/gravesfoods');
            $table->string('linkedin')->default('https://linkedin.com/gravesfoods');
            $table->string('twitter')->default('https://twitter.com/gravesfoods');
            $table->string('facebook')->default('https://facebook.com/gravesfoods');
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
        Schema::dropIfExists('email_signatures');
    }
};
