<?php

namespace Database\Seeders;

use App\Models\Diary;
use Illuminate\Database\Seeder;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diary::factory()->count(rand(5, 20))->create();
    }
}
