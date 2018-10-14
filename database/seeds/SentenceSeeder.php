<?php

use Illuminate\Database\Seeder;

class SentenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Sentence',10)->create();
    }
}
