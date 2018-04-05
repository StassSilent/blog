<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('categoryPages', function (Blueprint $table) {
            $table->increments('id');
        	$table->integer('category');
            $table->integer('language');
            $table->integer('priceMin');
            $table->integer('priceMax');
            $table->integer('complexity');
            $table->date('dateStart')->nullable();
            $table->date('dateFinish')->nullable();
            $table->text('ad');
            $table->text('categoryPages');
            $table->timestamps();
        });
       Schema::table('categorypages', function (Blueprint $table) {
           $table->string('img');
           $table->integer('user');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoryPages');
    }
}
