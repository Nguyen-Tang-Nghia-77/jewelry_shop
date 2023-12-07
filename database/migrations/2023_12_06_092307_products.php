<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->integer('category_id')->unsigned();
                $table->string('name');
                $table->string('slug');
                $table->text('content')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('inactive');
                $table->string('thumb')->nullable();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->timestamps();
                $table->date('publish_at');
                $table->decimal('price', 10, 2);
                $table->integer('size'); 
                $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('no action');
            });
            
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
