<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthfacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthfacilities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('general_tel');
            $table->string('general_email');
            $table->string('code');
            $table->string('incharge_name');
            $table->string('incharge_tel');
            $table->string('store_manager_name');
            $table->string('store_manager_tel');
            $table->string('bio_stat_name');
            $table->string('bio_stat_tel');
            $table->string('number_of_staff');
            $table->string('level');
            $table->string('x_cord');
            $table->string('y_cord');
            $table->integer('district_id')->unsigned();
            $table->integer('county_id')->unsigned();
            $table->integer('subcounty_id')->unsigned();
            $table->integer('parish_id')->unsigned();
            $table->integer('village_id')->unsigned();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcounty_id')->references('id')->on('subcounties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parish_id')->references('id')->on('parishes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healthfacilities');
    }
}
