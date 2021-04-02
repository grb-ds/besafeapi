<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('posts', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('userId')->unsigned(); 
            $table->string('title', 255)->nullable(false);
            $table->string('content', 255)->nullable(false);
            $table->enum('type', ['Alert', 'Message']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        schema::connection('mysql')->table('posts', function (Blueprint $table) {
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
        Schema::dropIfExists('posts');
    }
}