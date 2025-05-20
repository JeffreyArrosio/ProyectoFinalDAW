<?php

namespace Database\Seeders;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use function Pest\Laravel\call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@admin.com'], 
            [ 
                'name' => 'Admin',
                'password' => bcrypt('admin1234'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'type' => "writer",
                'admin' => 1,
            ]
        );
        User::factory(20)->create();
        $this->call([
            CategorySeeder::class,
            NewsSeeder::class,
            BlogSeeder::class,
            ColumnSeeder::class,
        ]);
    }
}
