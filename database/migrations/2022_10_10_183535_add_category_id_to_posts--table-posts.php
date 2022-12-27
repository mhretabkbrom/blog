<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToPostsTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        schema::table('posts', function (Blueprint $table){
            $table->integer('category_id')->nullable()->after('slug')->
            unsigned();
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
        schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('category_id');
       });
    }
}
