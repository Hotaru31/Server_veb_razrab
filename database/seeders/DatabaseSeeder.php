<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $moderatorRole = Role::create([
            'name' => 'Модератор',
            'slug' => 'moderator',
        ]);

        Role::create([
            'name' => 'Читатель',
            'slug' => 'reader',
        ]);

        User::create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
            'password' => Hash::make('password'),
            'role_id' => $moderatorRole->id,
        ]);

        Article::factory(10)->create();
    }
}