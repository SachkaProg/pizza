<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("status")->default("active"); // active, completed, rejected
            $table->json("order");
            $table->decimal("total");
            $table->string("name");
            $table->string("phone");
            $table->string("city");
            $table->string("house");
            $table->string("apartment")->nullable();
            $table->string("floor")->nullable();
            $table->string("intercom")->nullable();
            $table->string("korpus")->nullable();
            $table->string("entrance")->nullable();
            $table->text("comment")->nullable();
            $table->boolean("callback")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
