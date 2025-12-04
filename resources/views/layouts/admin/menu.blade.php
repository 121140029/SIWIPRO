<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
                <i class="nav-icon fas fa-home"></i>  
                <p>
                    Kelola Homepage
                    <i class="right fas fa-angle-left"></i> 
                </p>
            </a>
            <!-- Submenu -->
            <ul class="nav nav-treeview" style="background-color: white; padding: 10px; border-radius: 5px;">
                <li class="nav-item">
                    <a href="{{route('admin.tentang.index')}}" class="nav-link text-dark {{(Request::routeIs('admin.tentang.index') ? 'active':'')}}">
                        <i class="fas fa-info-circle nav-icon"></i> 
                        <p>Tentang Kami</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.visi.index')}}" class="nav-link text-dark {{(Request::routeIs('admin.visi.index') ? 'active':'')}}">
                        <i class="fas fa-eye nav-icon"></i> 
                        <p>Visi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.misi.index')}}" class="nav-link text-dark {{(Request::routeIs('admin.misi.index') ? 'active':'')}}">
                        <i class="fas fa-bullseye nav-icon"></i> 
                        <p>Misi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.galeri.index')}}" class="nav-link text-dark {{(Request::routeIs('admin.galeri.index') ? 'active':'')}}">
                        <i class="fas fa-photo-video nav-icon"></i> 
                        <p>Galeri</p>
                    </a>
                </li>
                
                
            </ul>
        </li>
        
        
        <li class="nav-item">
            <a href="{{route('admin.produk.index')}}" class="nav-link text-white {{(Request::routeIs('admin.produk.index') ? 'active':'')}}">
                <i class="nav-icon fas fa-box-open"></i> 
                <p>Kelola Produk</p>
            </a>
        </li>
                               
        <li class="nav-item">
            <a href="{{route('admin.pesanan.index')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-shopping-cart"></i> 
                <p>Kelola Pesanan</p>
            </a>
        </li>
        
        
                                                          
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                @csrf
            </form>
            <a href="#" class="nav-link text-white @yield('')"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>          
    </ul>
</nav>