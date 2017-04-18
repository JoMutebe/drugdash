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
            $table->foreign('district')->references('id')->on('DistrictsTable');
            $table->foreign('county')->references('id')->on('CountiesTable');
            $table->foreign('subcounty')->references('id')->on('SubcountiesTable');
            $table->foreign('parish')->references('id')->on('ParishesTable');
            $table->foreign('village')->references('id')->on('VillagesTable');
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
