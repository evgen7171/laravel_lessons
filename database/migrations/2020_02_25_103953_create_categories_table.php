<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id')->unsigned();
            $table->text('name')->comment('Псевдоним');
            $table->text('caption')->comment('Название');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
<<<<<<< HEAD
=======

        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')->on('categories');
        });
>>>>>>> master
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
=======
        Schema::table('news', function(Blueprint $table){
            $table->dropForeign('news_category_id_foreign');
        });

>>>>>>> master
        Schema::dropIfExists('categories');
    }
}
