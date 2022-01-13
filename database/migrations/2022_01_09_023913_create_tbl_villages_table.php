<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_villages', function (Blueprint $table) {
            $table->increments('vill_id');
            $table->string('vill_name');
            $table->unsignedInteger('dist_id');
            $table->foreign('dist_id')->references('dist_id')->on('tbl_districts')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_villages');
    }
}
