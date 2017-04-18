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
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('county')->references('id')->on('counties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcounty')->references('id')->on('subcounties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parish')->references('id')->on('parishes')->onDelete('cascade')->onUpdate('cascade');  
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
