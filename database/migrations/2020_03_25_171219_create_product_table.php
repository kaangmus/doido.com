<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('describe')->nullable();
            $table->text('tag')->nullable();
            $table->integer('price')->nullable();
            $table->text('style')->nullable();
            $table->integer('status')->nullable();
            $table->integer('statustype')->nullable();
            $table->text('contents')->nullable();
            $table->text('coverimg')->nullable();
            $table->text('desiredproducts')->nullable();
            $table->integer('iduser')->nullable();
            $table->integer('toggle')->nullable();
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
        Schema::dropIfExists('product');
    }
}
