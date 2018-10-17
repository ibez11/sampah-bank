<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('path');
            $table->integer('uploaded_employee_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('galleries', function(Blueprint $table){
            $table->foreign('uploaded_employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function(Blueprint $table){
            $table->dropForeign(['uploaded_employee_id']);
        });
        Schema::dropIfExists('galleries');
    }
}
