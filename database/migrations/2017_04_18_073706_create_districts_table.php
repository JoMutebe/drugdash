<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('region',100);
            $table->integer('dho_office_tel',12);
            $table->integer('dho_mobile_tel',12);
            $table->string('dho_name', 100);
            $table->string('zone',100);
            $table->integer('medicines_manager_tel',12);
            $table->string('medicines_manager_name',100);
            $table->string('address',100);
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
        Schema::dropIfExists('districts');
    }
}
