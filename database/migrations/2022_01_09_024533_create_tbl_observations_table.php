<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_observations', function (Blueprint $table) {
            $table->increments('obs_id');
            $table->unsignedInteger('vill_id');
            $table->unsignedInteger('spec_id');
            $table->unsignedInteger('dis_id');
            $table->string('obs_date');
            $table->integer('obs_cases');
            $table->integer('obs_death');
            $table->integer('obs_not_risked');
            $table->integer('obs_treated');
            $table->integer('obs_destroyed');
            $table->integer('obs_slaughter');
            $table->integer('obs_vaccinated');
            $table->string('obs_lng')->nullable(true);
            $table->string('obs_lat')->nullable(true);
            $table->foreign('vill_id')->references('vill_id')->on('tbl_villages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('spec_id')->references('spec_id')->on('tbl_specimens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dis_id')->references('dist_id')->on('tbl_districts')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_observations');
    }
}
