<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name',100);
            $table->foreign('district')->references('id')->on('DistrictsTable');
            $table->foreign('county')->references('id')->on('CountiesTable');
            $table->foreign('subcounty')->references('id')->on('SubcountiesTable');
            $table->foreign('parish')->references('id')->on('ParishesTable');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
    }
}
