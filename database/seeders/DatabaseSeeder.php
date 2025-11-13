<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(), // Xác nhận email tại thời điểm seed
            'password' => Hash::make('123456'), // Mã hóa mật khẩu
            'remember_token' => Str::random(10), // Token ngẫu nhiên dài 10 ký tự
            'trang_thai_hd' => '1'
        ]);
    }
}
