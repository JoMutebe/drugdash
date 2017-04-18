<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parishes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('district_id')->unsigned();
            $table->integer('county_id')->unsigned();
            $table->integer('subcounty_id')->unsigned();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcounty_id')->references('id')->on('subcounties')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parishes');
    }
}
