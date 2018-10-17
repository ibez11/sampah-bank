<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('identity_no');
            $table->string('fullname', 100);
            $table->string('birthplace', 100);
            $table->date('birthdate');
            $table->string('address', 255);
            $table->string('city');
            $table->integer('subinstitution_id')->unsigned()->nullable();
            $table->enum('customer_type', ['individual', 'organization']);
            $table->integer('religion_id')->unsigned();
            $table->enum('sex', ['F', 'M']);
            $table->string('phone_number');
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
        Schema::dropIfExists('customers');
    }
}
