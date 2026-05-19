@extends('admin.dashboard')

@section('title', 'Quản lý Khuyến mãi')

@section('admin-page')

<div class="content-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Quản lý Khuyến mãi</h2>

        <a href="{{ route('admin.khuyenmai.create') }}"
           class="btn btn-success">

            Thêm khuyến mãi mới

        </a>

    </div>


    @if($khuyenMais->isEmpty())

        <div class="alert alert-info">
            Chưa có khuyến mãi nào.
        </div>

    @else

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Mô tả</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Thao tác</th>
                </tr>

            </thead>


            <tbody>

                @foreach($khuyenMais as $km)

                <tr>

                    <td>{{ $km->idKhuyenMai }}</td>

                    <td>{{ $km->moTaKhuyenMai }}</td>

                    <td>{{ $km->ngayBatDau }}</td>

                    <td>{{ $km->ngayKetThuc }}</td>

                    <td>

                        <a href="{{ route('admin.khuyenmai.edit', $km) }}"
                           class="btn btn-warning btn-sm">

                            Sửa

                        </a>


                        <form action="{{ route('admin.khuyenmai.destroy', $km) }}"
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

        {{ $khuyenMais->links() }}

    @endif

</div>

@endsection