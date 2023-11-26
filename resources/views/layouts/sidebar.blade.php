<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{route('home')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Inventory</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown {{ request()->is('barang*','supplier*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Data Master</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-book"></i><a href="{{route('barang.index')}}">Data Barang</a></li>
                        <li><i class="fa fa-truck"></i><a href="{{route('supplier.index')}}">Data Supplier</a></li>
                        <li><i class="fa fa-reply"></i><a href="#">Data Barang Masuk</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Transaksi</h3><!-- /.menu-title -->
                <li>
                    <a href="{{route('kasir')}}"> <i class="menu-icon ti-money"></i>Kasir </a>
                </li>
                @if (Auth::user()->role == 3)
                @else
                <h3 class="menu-title">Menu Admin</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Data Pengguna</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="{{ request()->is('register*') ? 'active' : '' }}">
                            <i class="menu-icon fa fa-sign-in"></i><a href="{{route ('register.index')}}">Register</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->