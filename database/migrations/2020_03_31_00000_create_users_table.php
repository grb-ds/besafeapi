<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('users', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('username', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('last_login_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            /*
                A  - ACTIVE
                I  - INACTIVE
             */
            $table->enum('status', ['A', 'I']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}