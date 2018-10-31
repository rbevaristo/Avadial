<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $category = new \App\Category;
        $category->name = 'Response';
        $category->save();
        $category = new \App\Category;
        $category->name = 'Introduction';
        $category->save();
        $category = new \App\Category;
        $category->name = 'Qualifiers';
        $category->save();
        $category = new \App\Category;
        $category->name = 'After Qualify';
        $category->save();
        $category = new \App\Category;
        $category->name = 'Common Rebuttals';
        $category->save();
        $category = new \App\Category;
        $category->name = 'Unique Rebuttals';
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
