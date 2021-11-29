<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id')->default('0');
            $table->string('title');
            $table->string('description');
            $table->string('slug');
            $table->string('url');
            $table->string('image');
            $table->string('status');
            $table->string('position');
            $table->string('metaTitle');
            $table->string('metaDescription');
            $table->string('metaTag');
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
        Schema::dropIfExists('menus');
    }
}
