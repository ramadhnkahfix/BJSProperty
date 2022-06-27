<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="{{ asset('asset/dist/img/default-user-imge.jpeg') }}" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

    
      
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
                @if($submenu == 'pemesanan')
                  <a href="{{url('/pemesanan')}}" class="nav-link active">
                @else
                  <a href="{{url('/pemesanan')}}" class="nav-link">
                @endif
                <i class="fas fa-archive nav-icon"></i>
                  <p>Data Pemesanan</p>
                </a>
              </li>

              <li class="nav-item">
                @if($submenu == 'penerimaan')
                  <a href="{{url('/penerimaan')}}" class="nav-link active">
                @else
                  <a href="{{url('/penerimaan')}}" class="nav-link">
                @endif
                <i class="fas fa-archive nav-icon"></i>
                  <p>Data Penerimaan</p>
                </a>
              </li>

          <li class="nav-item">
                @if($submenu == 'pembayaran')
                  <a href="{{url('/pembayaran')}}" class="nav-link active">
                @else
                  <a href="{{url('/pembayaran')}}" class="nav-link">
                @endif
                <i class="fas fa-archive nav-icon"></i>
                  <p>Data Pembayaran</p>
                </a>
              </li>


          <li class="nav-item has-treeview menu-open">
            @if($menu == 'barang')
              <a href="#" class="nav-link active">
            @else
              <a href="#" class="nav-link">
            @endif  
            <i class="fas fa-bars nav-icon"></i>
              <p>
                Data Master  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                @if($submenu == 'barang') 
                  <a href="{{url('/barang')}}" class="nav-link active">
                @else
                  <a href="{{url('/barang')}}" class="nav-link">
                @endif
                <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                @if($submenu == 'pegawai') 
                  <a href="{{url('/pegawai')}}" class="nav-link active">
                @else
                  <a href="{{url('/pegawai')}}" class="nav-link">
                @endif
                <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                @if($submenu == 'suplier') 
                  <a href="{{url('/suplier')}}" class="nav-link active">
                @else
                  <a href="{{url('/suplier')}}" class="nav-link">
                @endif
                <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Suplier</p>
                </a>
              </li>
            </ul>
          </li>


              <li class="nav-item has-treeview menu-open">
            @if($menu == 'pemesanan')
              <a href="#" class="nav-link active">
            @else
              <a href="#" class="nav-link">
            @endif  
            <i class="fas fa-bars nav-icon"></i>
              <p>
                Data Laporan  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                @if($submenu == 'pemesanan') 
                  <a href="{{url('/pemesanan/cetak-pemesanan-form')}}" class="nav-link active">
                @else
                  <a href="{{url('/pemesanan/cetak-pemesanan-form')}}" class="nav-link">
                @endif
                <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pemesanan</p>
                </a>
              </li>
              <li class="nav-item">
                @if($submenu == 'penerimaan') 
                  <a href="{{url('/penerimaan/cetak-penerimaan-form')}}" class="nav-link active">
                @else
                  <a href="{{url('/penerimaan/cetak-penerimaan-form')}}" class="nav-link">
                @endif
                <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Penerimaan</p>
                </a>
              </li>
              <li class="nav-item">
                @if($submenu == 'pembayaran') 
                  <a href="{{url('/pembayaran/cetak-pembayaran-form')}}" class="nav-link active">
                @else
                  <a href="{{url('/pembayaran/cetak-pembayaran-form')}}" class="nav-link">
                @endif
                <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>   
    </div>