<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tag::truncate();  // apaga todos os registros da tabela tag
        factory(Tag::class, 10)->create(); // cria 10 registros fakes no bd
    }
}
