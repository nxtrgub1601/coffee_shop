<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HangTonKho;
use App\Models\NhaKho;

class SanPham extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'idSanPham';
    public $timestamps = false;

    protected $fillable = [
        'tenSanPham',
        'moTa',
        'theLoai',
        'gia',
        'hinh_anh',
        'trangThai',
        'soLuong'
    ];

    // Relationship
    public function tonKho()
    {
        return $this->hasOne(
            HangTonKho::class,
            'idSanPham',
            'idSanPham'
        );
    }

    public function donTrongGioHangs()
    {
        return $this->hasMany(
            DonTrongGioHang::class,
            'idSanPham',
            'idSanPham'
        );
    }

    public function danhGias()
    {
        return $this->hasMany(
            DanhGiaSanPham::class,
            'idSanPham',
            'idSanPham'
        );
    }


    // Tự động tạo tồn kho khi thêm sản phẩm
    protected static function booted()
    {
        static::created(function ($sanPham) {

            // Lấy kho đầu tiên
            $kho = NhaKho::first();

            // Nếu chưa có kho thì bỏ qua
            if (!$kho) {
                return;
            }

            HangTonKho::firstOrCreate(
                [
                    'idSanPham' => $sanPham->idSanPham,
                    'idNhaKho' => $kho->idNhaKho
                ],
                [
                    'soLuong' => $sanPham->soLuong ?? 0
                ]
            );

        });
    }


    // Lấy tồn kho thực tế
    public function getSoLuongThucTeAttribute()
    {
        return $this->tonKho?->soLuong ?? 0;
    }
}