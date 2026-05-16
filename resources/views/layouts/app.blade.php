<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Highlands Coffee')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/laravel.css') }}">

    <style>

        .alert {
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {

            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold text-white brand-logo d-flex align-items-center"
        href="{{ route('home') }}">

            <img src="{{ asset('images/logo.png') }}"
                alt="Logo"
                width="70"
                height="70"
                class="me-2">

            Highlands Coffee
        </a>

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <!-- SEARCH -->
                <li class="nav-item mx-3">

                    <form class="d-flex"
                          action="{{ route('search') }}"
                          method="GET">

                        <input class="form-control me-2"
                               type="search"
                               name="q"
                               placeholder="Tìm đồ uống..."
                               value="{{ request('q') }}">

                        <button class="btn btn-outline-warning">
                            🔍
                        </button>

                    </form>

                </li>

                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Trang chủ
                        </a>
                    </li>

                    @if(auth()->user()->vaiTro === 'Customer')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                Giỏ hàng
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('order.history') }}">
                                Đơn hàng
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trahang.index') }}">
                                Hoàn món
                            </a>
                        </li>

                    @endif

                    @if(auth()->user()->vaiTro === 'Admin')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                Quản lý quán
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bao-cao-doanh-thu') }}">
                                Doanh thu
                            </a>
                        </li>

                    @endif

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           data-bs-toggle="dropdown">

                            {{ auth()->user()->tenNguoiDung }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>

                                <form method="POST"
                                      action="{{ route('logout') }}">

                                    @csrf

                                    <button class="dropdown-item text-danger">
                                        Đăng xuất
                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                @endauth

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Đăng nhập
                        </a>
                    </li>

                @endguest

            </ul>

        </div>

    </div>

</nav>

<!-- ALERT -->
@if(session('success'))

<div class="alert alert-success alert-dismissible fade show m-3">

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

@if(session('error'))

<div class="alert alert-danger alert-dismissible fade show m-3">

    {{ session('error') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

<!-- CONTENT -->
<div class="container mt-3">
    @yield('content')
</div>

<!-- CHAT -->
<div id="chat-toggle" onclick="toggleChat()">
    💬
</div>

<div id="chat-box">

    <div class="chat-header">
        Hỗ trợ Highlands Coffee
        <span onclick="toggleChat()">✖</span>
    </div>

    <div class="chat-body" id="chat-body">

        <div class="bot">
            Xin chào Bạn muốn thưởng thức gì hôm nay?
        </div>

    </div>

    <div class="chat-footer">

        <input type="text"
               id="chat-input"
               placeholder="Nhập tin nhắn..."
               onkeypress="handleEnter(event)">

        <button onclick="sendMessage()">
            Gửi
        </button>

    </div>

</div>

<!-- HOTLINE -->
<div id="hotline-btn" onclick="togglePhone()">
    ☏
</div>

<div id="phone-popup">
    ☎ Hotline: 0901 234 567
</div>



<!-- POPUP -->
@if(isset($khuyenMai) && $khuyenMai->count() > 0)

<div id="welcomePopup"
     class="modal fade"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-warning text-dark">

                <h5 class="modal-title">
                    Chào mừng đến Highlands Coffee
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p class="fw-bold text-success">
                    Ưu đãi tại Highlands Coffee:
                </p>

                @foreach($khuyenMai as $km)

                <div class="mb-3 border p-2 rounded">

                    <strong>
                        {{ $km->moTa ?? 'Ưu đãi đặc biệt dành cho bạn' }}
                    </strong>

                    <br>

                    Giảm:

                    <span class="text-danger fw-bold">
                        {{ $km->phanTramGiam }}%
                    </span>

                    <br>

                    <small class="text-muted">

                        {{ \Carbon\Carbon::parse($km->ngayBatDau)->format('d/m/Y') }}

                        →

                        {{ \Carbon\Carbon::parse($km->ngayKetThuc)->format('d/m/Y') }}

                    </small>

                </div>

                @endforeach

            </div>

            <div class="modal-footer">

                <button class="btn btn-warning"
                        data-bs-dismiss="modal">

                    Thưởng thức ngay 

                </button>

            </div>

        </div>

    </div>

</div>

@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

// CHAT
function toggleChat() {
    document.getElementById("chat-box").classList.toggle("active");
}

function sendMessage() {

    let input = document.getElementById("chat-input");
    let body = document.getElementById("chat-body");

    if (!input.value.trim()) return;

    body.innerHTML += `<div class="user">${input.value}</div>`;

    body.scrollTop = body.scrollHeight;

    setTimeout(() => {

        body.innerHTML += `
            <div class="bot">
                Highlands Coffee sẽ phản hồi bạn sớm nhất!
            </div>
        `;

        body.scrollTop = body.scrollHeight;

    }, 500);

    input.value = "";
}

function handleEnter(e) {

    if(e.key === "Enter") {
        sendMessage();
    }

}

// HOTLINE
function togglePhone() {
    document.getElementById("phone-popup").classList.toggle("show");
}

// AUTO ALERT
setTimeout(() => {

    const alerts = document.querySelectorAll('.alert');

    alerts.forEach(alert => {

        let bsAlert = new bootstrap.Alert(alert);

        bsAlert.close();

    });

}, 3000);

// POPUP
document.addEventListener('DOMContentLoaded', function () {

    let popupEl = document.getElementById('welcomePopup');

    if (popupEl && !sessionStorage.getItem('shownPopup')) {

        let popup = new bootstrap.Modal(popupEl);

        popup.show();

        sessionStorage.setItem('shownPopup', 'true');
    }

});

</script>

@stack('scripts')
@yield('scripts')

</body>
</html>