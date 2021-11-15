<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->create();
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@lightbp.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'is_admin' => TRUE,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'User Test',
            'email' => 'user@light.com',
            'email_verified_at' => now(),
            'password' => Hash::make('abcdef'),
            'is_admin' => FALSE,
            'created_at' => now(),
            'updated_at' => now(),            
        ]
    );
    }
}
