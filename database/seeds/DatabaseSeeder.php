<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create fake user & admin
        $this->call('UserSeeder');

        // Create fake categories
        // Create fake appreciations
        Artisan::call('appreciation:store');
        
        // Create fake sentences
        $this->call('SentenceSeeder');
        
    }
}
