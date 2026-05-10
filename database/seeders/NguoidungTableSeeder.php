<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class NguoidungTableSeeder extends Seeder
{
    public function run()
    {
        // ===== TÀI KHOẢN ADMIN =====
        NguoiDung::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'tenNguoiDung' => 'admin',
                'matKhau'      => Hash::make('123456'),
                'vaiTro'       => 'Admin',
            ]
        );

        // ===== TÀI KHOẢN NGƯỜI DÙNG (Customer) =====
        NguoiDung::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'tenNguoiDung' => 'truong',
                'matKhau'      => Hash::make('123456'),
                'vaiTro'       => 'Customer',
            ]
        );

        // ===== TÀI KHOẢN NHÂN VIÊN (Employee) =====
        NguoiDung::updateOrCreate(
            ['email' => 'nhanvien@gmail.com'],
            [
                'tenNguoiDung' => 'cuong',
                'matKhau'      => Hash::make('123456'),
                'vaiTro'       => 'Employee',
            ]
        );
    }
}