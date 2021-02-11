<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('place')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('airport')->nullable();
            $table->string('airport_code')->nullable();
            $table->integer('days')->nullable();
            $table->integer('nights')->nullable();
            $table->string('package_name')->nullable();
            $table->string('package_Style');
            $table->string('description')->nullable();
            $table->integer('price')->nullable();
            $table->string('status');
            $table->string('edited_by');
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
        Schema::dropIfExists('locations');
    }
}
