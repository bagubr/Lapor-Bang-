<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InspektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Inspektor 1',
            'email' => 'inspektor1@gmail.com',
            'password' => Hash::make('password'),
            'tipe_user' => 'INSPEK',
        ]);
        User::create([
            'name' => 'Inspektor 2',
            'email' => 'inspektor2@gmail.com',
            'password' => Hash::make('password'),
            'tipe_user' => 'INSPEK',
        ]);
    }
}
