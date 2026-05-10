@extends('layouts.app')

@section('title', 'Quản trị hệ thống')

@section('content')

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="sidebar-logo">
            <h3>Highlands Coffee</h3>
            <p>Trang quản trị</p>
        </div>

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('admin.sanpham.index') }}">
                    Quản lý Sản phẩm 
                </a>
            </li>

            <li>
                <a href="{{ route('admin.donhang.index') }}">
                    Quản lý Đơn hàng
                </a>
            </li>

            <li>
                <a href="{{ route('admin.kho.index') }}">
                    Quản lý Kho
                </a>
            </li>

            <li>
                <a href="{{ route('admin.khachhang.index') }}">
                    Quản lý Khách hàng
                </a>
            </li>

            <li>
                <a href="{{ route('admin.giamgia.index') }}">
                    Chương trình Giảm giá
                </a>
            </li>

            <li>
                <a href="{{ route('admin.khuyenmai.index') }}">
                    Quản lý Khuyến mãi
                </a>
            </li>

            <li>
                <a href="{{ route('admin.bao-cao-doanh-thu') }}">
                    Báo cáo Doanh thu
                </a>
            </li>

        </ul>

    </div>

    <!-- CONTENT -->
    <div class="admin-content">

        @yield('admin-page')

    </div>

</div>

@endsection