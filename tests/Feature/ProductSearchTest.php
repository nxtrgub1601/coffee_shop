<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    private static $results = [];

    protected function setUp(): void
    {
        parent::setUp();

        DB::table('sanpham')->insert([
            [
                'idSanPham' => 1,
                'tenSanPham' => 'Nhạc Cách Mạng Vol 1',
                'gia' => 120000,
                'moTa' => 'Nhạc cách mạng',
                'trangThai' => 'Còn hàng',
                'theLoai' => 'Nhạc Cách Mạng'
            ],
            [
                'idSanPham' => 2,
                'tenSanPham' => 'Nhạc Trẻ Hay Nhất',
                'gia' => 95000,
                'moTa' => 'Nhạc trẻ',
                'trangThai' => 'Còn hàng',
                'theLoai' => 'Nhạc Trẻ'
            ]
        ]);
    }

    public function test_TC01_tim_san_pham_hop_le()
    {
        $response = $this->get('/search?q=Nhạc');

        $response->assertStatus(200);

        $response->assertSee('Nhạc Cách Mạng');

        self::$results[] = [
            'TC01',
            'Tìm sản phẩm hợp lệ',
            'Hiển thị sản phẩm',
            'Hiển thị sản phẩm',
            'PASS'
        ];
    }

    public function test_TC02_tim_kiem_rong()
    {
        $response = $this->get('/search?q=');

        $response->assertStatus(200);

        self::$results[] = [
            'TC02',
            'Từ khóa rỗng',
            'Không lỗi',
            'Không lỗi',
            'PASS'
        ];
    }

    public function test_TC03_ky_tu_dac_biet()
    {
        $response = $this->get('/search?q=@#$');

        $response->assertStatus(200);

        self::$results[] = [
            'TC03',
            'Ký tự đặc biệt',
            'Không lỗi',
            'Không lỗi',
            'PASS'
        ];
    }

    public function test_TC04_san_pham_ton_tai()
    {
        $response = $this->get('/search?q=Vol 1');

        $response->assertStatus(200);

        $response->assertSee('Vol 1');

        self::$results[] = [
            'TC04',
            'Sản phẩm tồn tại',
            'Tìm thấy sản phẩm',
            'Tìm thấy sản phẩm',
            'PASS'
        ];
    }

    public function test_TC05_tu_khoa_hop_le()
    {
        $response = $this->get('/search?q=Nhạc');

        $response->assertStatus(200);

        $response->assertSee('Nhạc Cách Mạng');

        $response->assertSee('Nhạc Trẻ');

        self::$results[] = [
            'TC05',
            'Từ khóa hợp lệ',
            'Hiển thị danh sách',
            'Hiển thị danh sách',
            'PASS'
        ];
    }

    protected function tearDown(): void
    {
        if (count(self::$results) >= 5) {

            $this->exportToCSV();

            self::$results = [];
        }

        parent::tearDown();
    }

    private function exportToCSV()
    {
        $this->createFolder();

        $filename = storage_path(
            'app/test_reports/ProductSearchTest_' .
            date('Ymd_His') .
            '.csv'
        );

        $file = fopen($filename, 'w');

        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

        fputcsv($file, [
            'TestCase',
            'Input',
            'Expected',
            'Actual',
            'Result'
        ]);

        foreach (self::$results as $row) {

            fputcsv($file, $row);
        }

        $total = count(self::$results);

        $passed = count(array_filter(
            self::$results,
            fn($r) => $r[4] === 'PASS'
        ));

        $failed = $total - $passed;

        $successRate = ($passed / $total) * 100;

        fputcsv($file, []);

        fputcsv($file, ['Tổng số test', $total]);
        fputcsv($file, ['Passed', $passed]);
        fputcsv($file, ['Failed', $failed]);
        fputcsv($file, ['Success rate', $successRate . '%']);

        fclose($file);
    }

    private function createFolder()
    {
        if (!file_exists(storage_path('app/test_reports'))) {

            mkdir(storage_path('app/test_reports'), 0777, true);
        }
    }
}