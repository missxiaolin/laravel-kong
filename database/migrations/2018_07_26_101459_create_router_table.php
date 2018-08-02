<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('router', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('pid');
            $table->bigInteger('level');
            $table->string('name', 32);
            $table->string('code', 64);
            $table->string('route', 300);
            $table->string('res_uri', 300);
            $table->string('icon', 32);
            $table->bigInteger('is_hidden',2)->default(0);
            $table->bigInteger('noDropdown', 2)->default(0);
            $table->string('route', 64);
            $table->tinyInteger('type', 4);
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
        Schema::dropIfExists('router');
    }
}
