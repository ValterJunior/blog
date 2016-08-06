<?php

use Illuminate\DataBase\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsAndTagsTables extends Migration
{

    /**
     * The name of the database connection to use.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       Schema::create('posts', function (Blueprint $table) {

            $table->string('title');
            $table->string('content');

            $table->unique('id');
            $table->index('user_id');

            $table->timestamps();

        });

       Schema::create('tags', function (Blueprint $table) {

            $table->unique('_id');
            $table->string('name');
            $table->index('post_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
        Schema::drop('posts');
    }
}
