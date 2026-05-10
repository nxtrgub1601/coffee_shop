@extends('admin.dashboard')

@section('title', 'Quản lý Sản phẩm')

@section('admin-page')

<div class="content-box">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-store"></i> Quản lý Sản phẩm
        </h2>

        <a href="{{ route('admin.sanpham.create') }}" 
           class="btn btn-success shadow-sm">
            <i class="fas fa-plus"></i> Thêm sản phẩm mới
        </a>
    </div>


    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    Danh sách sản phẩm ({{ $sanPhams->total() }} sản phẩm)
                </h5>

                <div class="text-muted small">
                    Trang {{ $sanPhams->currentPage() }} / {{ $sanPhams->lastPage() }}
                </div>
            </div>
        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0 align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-end">Giá</th>
                            <th class="text-center">Tồn kho</th>
                            <th class="text-center">Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($sanPhams as $sp)

                        <tr>

                            <td>{{ $sp->idSanPham }}</td>

                            <td>
                                @if($sp->hinh_anh)
                                    <img src="{{ asset('images/' . $sp->hinh_anh) }}"
                                         width="55"
                                         height="55"
                                         class="rounded"
                                         style="object-fit:cover;">
                                @endif
                            </td>

                            <td>
                                <strong>{{ $sp->tenSanPham }}</strong>
                            </td>

                            <td class="text-end">
                                {{ number_format($sp->gia) }} ₫
                            </td>

                            <td class="text-center">
                                {{ $sp->soLuong }}
                            </td>

                            <td class="text-center">
                                <span class="badge {{ $sp->trangThai == 'Còn hàng' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $sp->trangThai }}
                                </span>
                            </td>

                            <td>

                                <a href="{{ route('admin.sanpham.edit', $sp) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.sanpham.destroy', $sp) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>


        <div class="card-footer">
            {{ $sanPhams->links('vendor.pagination.bootstrap-5') }}
        </div>

    </div>

</div>

@endsection