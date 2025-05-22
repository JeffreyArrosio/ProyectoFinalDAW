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
                'img' => "https://sdmntprukwest.oaiusercontent.com/files/00000000-3638-6243-92d2-c1636cc372be/raw?se=2025-05-22T13%3A00%3A33Z&sp=r&sv=2024-08-04&sr=b&scid=f949906d-4afe-5506-8102-1bed919ba521&skoid=0a4a0f0c-99ac-4752-9d87-cfac036fa93f&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2025-05-22T05%3A44%3A23Z&ske=2025-05-23T05%3A44%3A23Z&sks=b&skv=2024-08-04&sig=Z1DOoxq60pR2r/TtBkz4t5wV5J9ooroD7h78NW735i0%3D",
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
