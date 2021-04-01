<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('userId')->unsigned()->unique(); 
            $table->string('firstname', 255)->nullable(false);
            $table->string('lastname', 255)->nullable(false); 
            $table->string('nationality', 255)->nullable(false);         
            /*
                F  - FEMALE
                M  - MALE
             */
            $table->enum('gender', ['F', 'M']);
            $table->integer('locationId')->unsigned()->nullable();
            $table->string('policeNumber', 255)->default('');
            $table->string('telephone', 255)->default('');
            /*
                -
                G  - GOOD
                I  - BAD
             */
            $table->enum('status', ['-','G', 'B']);
        });        

        schema::connection('mysql')->table('user_profiles', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('locationId')->references('id')->on('locations');
        });        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}