<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Post::truncate(); // apaga todos os registros da tabela posts
        factory('App\Post', 15)->create(); // cria 15 registros fakes no bd
    }
}
