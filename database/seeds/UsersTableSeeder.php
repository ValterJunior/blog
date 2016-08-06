<?php
 
use Illuminate\Database\Seeder;
 
class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $posts = array(
            ['name' => 'Administrator', 'login' => 'admin', 'email' => 'test@test.com', 'password' => bcrypt('admin')],
        );
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($posts);
    }
 
}