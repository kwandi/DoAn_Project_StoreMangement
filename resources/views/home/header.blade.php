<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span>
                SHOP QUẦN ÁO
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        Sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        Cửa hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        Giới thiệu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('myorders') }}">Đơn hàng</a>
                </li>
            </ul>
            <div class="user_option">
                <a href="{{ url('mycart') }}">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    {{ "[$count]" }}
                </a>

                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input style="margin-right: 10px" type="submit" value="Đăng xuất">
                        </form>
                    @else
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Đăng nhập</span>
                        </a>
                        <a href="{{ url('/register') }}">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>Đăng kí</span>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
