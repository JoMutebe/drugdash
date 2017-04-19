<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockitems', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('common_name');
            $table->string('brand_name');
            $table->string('code');
            $table->string('category');
            $table->string('unit_of_measure');
            $table->double('unit_price',12,4);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->increments('id');
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
        Schema::dropIfExists('stockitems');
    }
}
