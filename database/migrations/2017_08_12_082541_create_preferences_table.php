<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('preferences', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('collection_id', false, true);
        //     $table->integer('item_id', false, true);
        //     $table->boolean('fav')->default(false);
        //     $table->integer('rate', false, true);
            
        //     $table->string('comment')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
