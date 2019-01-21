<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastName', 50); // maxlength 50 characters
            $table->string('firstName', 50); // maxlength 50 characters
            $table->string('email', 100)->unique();
            $table->string('phone', 11);
            $table->unsignedTinyInteger('age');// max value 255
            $table->string('address');
            $table->integer('lastLogin');
            $table->string('password');
            $table->unsignedTinyInteger('countFailPass');// max value 255
            $table->string('tokenCreate')->default('create new token');
            $table->boolean('disabled')->default(0);
            $table->timestamps();

            //$table->index('phone'); // co nen
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
