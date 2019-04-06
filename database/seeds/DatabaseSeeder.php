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
        \App\Pregunta::query()->delete();
        \App\Quiz::query()->delete();
        
        $this->call(Quiz1Seeder::class);
        $this->call(Quiz2Seeder::class);
    }

}
