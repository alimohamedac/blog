<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Facades\DB;

class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->truncate();
		for($i=0;$i<11;$i++)
    {
        Post::create([
        	'title' => 'the '.rand(0,9).' Post',
        	'body'=> 'This Post is very important because i love alahly ',
        	'featured'=>'uploads/posts/index.jpg'
        ]);


}

    }
}
