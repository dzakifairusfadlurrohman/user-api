<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User; // Tambahkan ini

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => Str::uuid(),
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'age' => 30,
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'age' => 28,
        ]);
    }
}
