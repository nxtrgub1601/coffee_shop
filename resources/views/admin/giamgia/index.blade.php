@extends('admin.dashboard')

@section('title', 'Quản lý giảm giá')

@section('admin-page')

<div class="content-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>🔥 Chương trình giảm giá</h2>

        <a href="{{ route('admin.giamgia.create') }}"
           class="btn btn-success">

            Thêm mới

        </a>

    </div>

    @if($ds->isEmpty())

        <div class="alert alert-info">
            Chưa có chương trình giảm giá nào.
        </div>

    @else

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>Tên</th>
                    <th>Thể loại</th>
                    <th>% giảm</th>
                    <th>Thời gian</th>
                    <th>Hành động</th>
                </tr>

            </thead>

            <tbody>

                @foreach($ds as $item)

                <tr>

                    <td>{{ $item->tenChuongTrinh }}</td>

                    <td>{{ $item->theLoai }}</td>

                    <td>{{ $item->phanTramGiam }}%</td>

                    <td>
                        {{ $item->ngayBatDau }}
                        →
                        {{ $item->ngayKetThuc }}
                    </td>

                    <td>

                        <a href="{{ route('admin.giamgia.edit', $item) }}"
                           class="btn btn-warning btn-sm">

                            Sửa

                        </a>

                        <form action="{{ route('admin.giamgia.destroy', $item) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Xóa
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    @endif

</div>

@endsection