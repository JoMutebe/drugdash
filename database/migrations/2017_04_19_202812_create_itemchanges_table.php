<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockitemchanges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('stockitem_id')->unsigned();
            $table->integer('healthfacility_id')->unsigned();
            $table->string('type'); //whether it is an increment or a decreament
            $table->date('occured_at'); //date when increment or decrement happened
            $table->decimal('value',10,4); //the value by which the item was incremented or decremented....stored as string so we can retrieve and manipulate accordigl
            $table->decimal('balance',10,4);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();
            $table->foreign('stockitem_id')->references('id')->on('stockitems')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('healthfacility_id')->references('id')->on('healthfacilities')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemchanges');
    }
}
