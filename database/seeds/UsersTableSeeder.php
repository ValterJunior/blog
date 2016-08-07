<?php
 
use Illuminate\Database\Seeder;
use App\Models\{User, Post, Comment, Tag};
 
class UsersTableSeeder extends Seeder {

    public function run()
    {

        DB::table('comments')->truncate();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();

        $user = new User( ['name' => 'Administrator', 'login' => 'admin', 'email' => 'test@test.com', 'password' => bcrypt('admin')] );
        $user->save();

        User::all()->each( function($user) {

            // Saving random posts!
            $user->posts()->saveMany( factory( Post::class, rand(3,8) )->make() );

            $tags = Tag::lists('_id');
            $last = count($tags) - 1;

            $user->posts()->each( function($post) use($tags, $last) {

               $post->tags()->attach( array( $tags[ rand(0, $last ) ] ) );

                // For each user post will exist n comments attached
               factory( Comment::class, rand(0,3) )->make()->each( function($comment) use ($post) {
                    $comment->post()->associate($post);
                    $comment->save();
              });

            });

        });


    }
 
}