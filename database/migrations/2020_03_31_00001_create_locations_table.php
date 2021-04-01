<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('locations', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('city', 255)->default('');
            $table->string('state', 255)->default('');
            $table->string('zipcode', 255)->default('');
            $table->string('country', 255)->default('');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}