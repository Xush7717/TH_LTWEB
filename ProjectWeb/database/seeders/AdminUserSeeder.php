<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'full_name' => 'Administrator',
            'email' => 'admin@tbshop.com',
            'phone_number' => '0364518019',
            'address' => '180 Cao Lỗ, Phường 4, Quận 8, TP Hồ Chí Minh',
            'role' => 'admin',
        ]);
    }
}
