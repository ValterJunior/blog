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
            $table->integer('month');
            $table->integer('year');

            $table->unique('_id');
            $table->index('user_id');

            $table->timestamps();

        });

       Schema::create('tags', function (Blueprint $table) {

            $table->unique('_id');
            $table->string('name')->unique();
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
