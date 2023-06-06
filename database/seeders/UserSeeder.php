<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
            'name' => 'yudiya',
            'email' => 'yudiya@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'classroom_id' => 2,
            ],
            [
                'name' => 'yudiyateacher',
                'email' => 'yudiyateacher@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 'teacher',
                'classroom_id' => 2,
            ],
            [
                'name' => 'yudiyastudent',
                'email' => 'yudiyastudent@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 'student',
                'classroom_id' => 2,
            ],
        ];

        foreach ($data as $item) {
                User::insert([
                    'name' => $item['name'],
                    'email' => $item['email'],
                    'email_verified_at' => $item['email_verified_at'],
                    'password' => $item['password'],
                    'remember_token' => $item['remember_token'],
                    'role' => $item['role'],
                    'classroom_id' => $item['classroom_id'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
        }
    }
}
