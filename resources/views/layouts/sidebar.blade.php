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
                @canany(['owner-only', 'staff-only', 'pembeli-only'])    
                    <li>
                        <a href="/" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Beranda</span>
                        </a>
                    </li>
                @endcan

                {{-- Produk --}}
                {{-- Owner, Staff, Pembeli --}}
                @canany(['owner-only', 'staff-only', 'pembeli-only'])    
                    <li>
                        <a href="{{ route('produk.index') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-plus-square-o"></span><span class="mtext">Produk</span>
                        </a>
                    </li>
                @endcan
                {{-- Kategori --}}
                {{-- Owner, Staff --}}
                @canany(['owner-only', 'staff-only'])    
                    <li>
                        <a href="{{ route('kategori.index') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-plus-square-o"></span><span class="mtext">Kategori</span>
                        </a>
                    </li>
                @endcan

                {{-- Jenis --}}
                {{-- Owner, Staff --}}
                @canany(['owner-only', 'staff-only'])       
                    <li>
                        <a href="{{ route('jenis.index') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-plus-square-o"></span><span class="mtext">Jenis</span>
                        </a>
                    </li>
                @endcan
                {{-- Member --}}
                {{-- Owner, Staff --}}
                @canany(['owner-only', 'staff-only'])       
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-plus-square-o"></span><span class="mtext">Member</span>
                        </a>
                        <ul class="submenu">
                            {{-- Owner, Staff --}}
                            @canany(['owner-only', 'staff-only'])    
                                <li><a href="{{ route('member.index') }}">List Member</a></li>
                            @endcan
                            {{-- Owner --}}
                            @can('owner-only')
                                <li><a href="{{ route('member.create') }}">Tambah Member</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                {{-- Owner, Staff --}}
                @canany(['owner-only', 'staff-only'])    
                    <li>
                        <a href="{{ route('order.alltransaksi') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-plus-square-o"></span><span class="mtext">Detail Order</span>
                        </a>
                    </li>
                @endcan
                {{-- Pembeli --}}
                @can('pembeli-only')
                <li>
                    <a href="{{ route('order.transaksi') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-plus-square-o"></span><span class="mtext">Riwayat Transaksi</span>
                    </a>
                </li>
                @endcan

                {{-- Pembeli --}}
                @can('pembeli-only')
                    <li>
                        <a href="{{ route('order.keranjang') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-plus-square-o"></span><span class="mtext">Keranjang</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>