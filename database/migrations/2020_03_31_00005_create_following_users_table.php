<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowingUsersTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('following_users', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('userId')->unsigned(); 
            $table->integer('followingUserId')->unsigned();
             $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));            
        });

        schema::connection('mysql')->table('following_users', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('followingUserId')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('following_users');
    }
}