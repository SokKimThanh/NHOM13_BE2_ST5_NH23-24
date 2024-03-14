<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Trang Chu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('name', ['name' => 'gioithieu']) }}">Gioi Thieu</a>
            </li>
            <li class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    San pham
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('name', ['name' => 'sanpham.ban']) }}">Ban</a></li>
                    <li><a class="dropdown-item" href="{{ route('name', ['name' => 'sanpham.ghe']) }}">Ghe</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('name', [ 'name' => 'lienhe' ]) }}">Lien He</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('name', ['name' => 'login']) }}">Đăng nhập</a>
            </li>
        </ul>
    </div>
</nav>