<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('contacts', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('userId')->unsigned(); 
            $table->string('firstname', 255)->nullable(false);
            $table->string('lastname', 255)->nullable(false); 
            $table->string('nationality', 255)->nullable(false);         
            /*
                F  - FEMALE
                M  - MALE
             */
            $table->enum('gender', ['F', 'M']);
            $table->string('telephone', 255)->default('');
            $table->string('email', 255)->default('');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));            
        });

        schema::connection('mysql')->table('contacts', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}