<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/" class="d-flex justify-content-center align-items-center">
            <h3 style="color: white">Fashion Brand</h3>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                {{-- Owner, Staff, Pembeli --}}
                <li>
                    <a href="/" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Beranda</span>
                    </a>
                </li>

                {{-- Produk --}}
                {{-- Owner, Staff, Pembeli --}}
                <li>
                    <a href="{{ route('produk.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">Produk</span>
                    </a>
                </li>

                {{-- Kategori --}}
                {{-- Owner, Staff --}}
                <li>
                    <a href="{{ route('kategori.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">Kategori</span>
                    </a>
                </li>

                {{-- Jenis --}}
                {{-- Owner, Staff --}}
                <li>
                    <a href="{{ route('jenis.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">Jenis</span>
                    </a>
                </li>

                {{-- Member --}}
                {{-- Owner, Staff --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">Member</span>
                    </a>
                    <ul class="submenu">
                        {{-- Owner, Staff --}}
                        <li><a href="{{ route('member.index') }}">Detail</a></li>
                        {{-- Owner --}}
                        <li><a href="{{ route('member.create') }}">Tambah</a></li>
                    </ul>
                </li>

                {{-- Owner, Staff --}}
                <li>
                    <a href="{{ route('order.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">Detail Order</span>
                    </a>
                </li>

                {{-- Pembeli --}}
                <li>
                    <a href="{{ route('order.transaksi') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">History Transaksi</span>
                    </a>
                </li>

                {{-- Pembeli --}}
                <li>
                    <a href="{{ route('order.keranjang') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">Keranjang</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>