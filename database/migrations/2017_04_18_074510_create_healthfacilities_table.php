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
            $table->increments('id');
            $table->String('name',100);
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('county')->references('id')->on('counties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcounty')->references('id')->on('subcounties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parish')->references('id')->on('parishes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('village')->references('id')->on('villages')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('address',100);
            $table->integer('general_tel',12);
            $table->string('general_email',100);
            $table->string('code',100);
            $table->string('incharge_name',100);
            $table->integer('incharge_tel',12);
            $table->string('number_of_staff',100);
            $table->string('level',100);
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
        Schema::dropIfExists('healthfacilities');
    }
}
