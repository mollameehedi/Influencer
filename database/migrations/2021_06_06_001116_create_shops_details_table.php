<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_details', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->string('name');
            $table->string('time_sidule')->nullable();
            $table->longText('details');
            $table->longText('rules');
            $table->string('soldout_or_not')->nullable();
            $table->string('thumbnail')->default('default.jpg');
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
        Schema::dropIfExists('shops_details');
    }
}
