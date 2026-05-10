@extends('admin.dashboard')

@section('title', 'Báo cáo Doanh thu')

@section('admin-page')

<div class="content-box">

    <h2 class="mb-4">📊 Báo cáo Doanh thu</h2>


    <div class="card mb-4">

        <div class="card-body">

            <form method="GET" class="row g-3">

                <div class="col-md-3">

                    <label>Từ ngày</label>

                    <input type="date"
                           name="start_date"
                           class="form-control"
                           value="{{ $startDate }}">

                </div>


                <div class="col-md-3">

                    <label>Đến ngày</label>

                    <input type="date"
                           name="end_date"
                           class="form-control"
                           value="{{ $endDate }}">

                </div>


                <div class="col-md-3 d-flex align-items-end">

                    <button class="btn btn-primary w-100">
                        Xem báo cáo
                    </button>

                </div>

            </form>

        </div>

    </div>


    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card p-3">
                <h6>Tổng doanh thu</h6>
                <h4>{{ number_format($totalRevenue) }} ₫</h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h6>Tổng đơn hàng</h6>
                <h4>{{ $totalOrders }}</h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h6>Trung bình / đơn</h6>
                <h4>{{ number_format($avgOrderValue) }} ₫</h4>
            </div>
        </div>

    </div>


    <table class="table table-striped">

        <thead class="table-light">

            <tr>
                <th>Ngày</th>
                <th class="text-end">Doanh thu</th>
                <th class="text-end">Số đơn</th>
            </tr>

        </thead>


        <tbody>

            @forelse($revenueByDate as $date => $data)

            <tr>

                <td>
                    {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}
                </td>

                <td class="text-end">
                    {{ number_format($data['doanh_thu']) }} ₫
                </td>

                <td class="text-end">
                    {{ $data['so_don'] }}
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="3" class="text-center">
                    Không có dữ liệu
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection