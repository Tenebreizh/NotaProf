<?php

use Illuminate\Database\Seeder;

class AppreciationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Appreciation', 12)->create();
    }
}
