<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="{{ route('home') }}">Beranda</a>
            </li>
            <li>
                <a href="{{ route('obat.index') }}">Data Obat</a>
            </li>
            <li>
                <a href="{{ route('pembeli.index') }}">Data Pembeli </a>
            </li>
             <li>
                <a href="{{ route('order.index') }}">Data Order </a>

            </li>
             <li>
                <a href="{{ route('transaksi.index') }}">Transaksi </a>

            </li>
             <li>
                <a href="{{ route('karyawan.index') }}">Data Karyawan </a>

            </li>
            </li>
        </ul>

    </div>
</div>