<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('patch');
            $table->string('patch_cover');
            $table->unsignedInteger('size');
            $table->string('extension');
            $table->unsignedBigInteger('work_id');
            $table->timestamps();
        });

        Schema::table('images',function (Blueprint $table) {
            $table->foreign('work_id')
                ->references('id')
                ->on('works')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
