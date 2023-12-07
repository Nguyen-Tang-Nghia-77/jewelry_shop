<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Menus extends Migration
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
            $table->string('name');
            $table->string('link')->nullable();
            $table->enum('type', ['link', 'category', 'product'])->default('link');
            $table->integer('model_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->integer('_lft')->nullable();
            $table->integer('_rgt')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        //
    }
}
