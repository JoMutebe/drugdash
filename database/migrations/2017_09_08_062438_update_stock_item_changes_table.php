<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStockItemChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stockitemchanges', function(Blueprint $table){
            $table->string('sync_time',100)->nullable();
            $table->integer('offline_id')->unsigned()->nullable();
        });


        Schema::table('issues', function(Blueprint $table){
            $table->string('sync_time',100)->nullable();
            $table->integer('offline_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
