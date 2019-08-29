<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPizzaToppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("pizza_topping", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("pizza_id")->unsigned();
            $table->integer("topping_id")->unsigned();
            $table->foreign("pizza_id")->references("id")->on("pizzas")->onDelete("cascade");
            $table->foreign("topping_id")->references("id")->on("toppings")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop("pizza_topping");
         Schema::drop("toppings");
    }
}
