<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    // =========================
    // Danh sách khách hàng
    // =========================
    public function index(Request $request)
    {
        $query = NguoiDung::where('vaiTro', 'Customer');

        // Tìm kiếm
        if ($request->q) {
            $query->where('tenNguoiDung', 'like', '%' . $request->q . '%');
        }

        $khachHangs = $query->paginate(10);

        return view('admin.khachhang.index', compact('khachHangs'));
    }

    // =========================
    // Form thêm khách hàng
    // =========================
    public function create()
    {
        return view('admin.khachhang.create');
    }

    // =========================
    // Lưu khách hàng
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'tenNguoiDung' => 'required',
            'email' => 'required|email|unique:nguoidung,email',
            'matKhau' => 'required|min:6'
        ]);

        NguoiDung::create([
            'tenNguoiDung' => $request->tenNguoiDung,
            'email' => $request->email,
            'matKhau' => bcrypt($request->matKhau),
            'vaiTro' => 'Customer'
        ]);

        return redirect()
            ->route('admin.khachhang.index')
            ->with('success', 'Thêm khách hàng thành công');
    }

    // =========================
    // Form sửa khách hàng
    // =========================
    public function edit($id)
    {
        $kh = NguoiDung::findOrFail($id);

        return view('admin.khachhang.edit', compact('kh'));
    }

    // =========================
    // Cập nhật khách hàng
    // =========================
    public function update(Request $request, $id)
    {
        // Tìm khách hàng
        $kh = NguoiDung::findOrFail($id);

        // Validate
        $request->validate([
            'tenNguoiDung' => 'required',
            'email' => 'required|email|unique:nguoidung,email,' . $id . ',id'
        ]);

        // Gán dữ liệu
        $kh->tenNguoiDung = $request->tenNguoiDung;
        $kh->email = $request->email;

        // Nếu có nhập mật khẩu mới
        if ($request->filled('matKhau')) {
            $kh->matKhau = bcrypt($request->matKhau);
        }

        // Lưu
        $kh->save();

        return redirect()
            ->route('admin.khachhang.index')
            ->with('success', 'Cập nhật khách hàng thành công');
    }

    // =========================
    // Xóa khách hàng
    // =========================
    public function destroy($id)
    {
        $kh = NguoiDung::findOrFail($id);

        $kh->delete();

        return redirect()
            ->route('admin.khachhang.index')
            ->with('success', 'Xóa khách hàng thành công');
    }
}