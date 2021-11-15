<?php

namespace Database\Seeders;

use App\Models\Service;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::factory()->count(8)->create();
    }
}
