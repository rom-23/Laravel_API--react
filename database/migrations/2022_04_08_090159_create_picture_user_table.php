<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('picture_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('picture_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('picture_id')->references('id')->on('pictures')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picture_user');
    }
};
