<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostStatsTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('post_stats', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('postId')->unsigned()->unique(); 
            $table->bigInteger('sharedCount'); 
            $table->bigInteger('commentedCount');
        });

        schema::connection('mysql')->table('post_stats', function (Blueprint $table) {
            $table->foreign('postId')->references('id')->on('posts');            
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_stats');
    }
}