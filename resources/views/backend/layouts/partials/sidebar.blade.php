<div class="col-md-4" id="sidebar">
    <ul>
        <li><a href="{{ route('danhsachsanpham.index') }}">Danh sách sản phẩm</a></li>
        <li><a href="{{ route('danhsachmau.index') }}">Danh sách màu sản phẩm</a></li>
        <li><a href="{{ route('danhsachloai.index') }}">Danh sách loại sản phẩm</a></li>
        <li><a href="{{ route('danhsachmodel.index') }}">Danh sách size sản phẩm</a></li>
    </ul>
</div>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('theme/adminlte/img/floral-2622309_960_720.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>ARMY FASHION Shop</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree" data-api="tree">
        <li class="header">Danh mục</li>
        
        <!-- Danh mục Sản phẩm -->
        <li class="treeview {{ Request::is('admin/danhsachsanpham*') ? 'menu-open' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" style="display: {{ Request::is('admin/danhsachsanpham*') ? 'block' : 'none' }};">
            <li class="{{ Request::is('admin/danhsachsanpham') ? 'active' : '' }}"><a href="{{ route('danhsachsanpham.index') }}">Danh sách sản phẩm</a></li>
            <li class="{{ Request::is('admin/danhsachloai') ? 'active' : '' }}"><a href="{{ route('danhsachloai.index') }}">Danh sách loại sản phẩm</a></li>
            <li class="{{ Request::is('admin/danhsachmau') ? 'active' : '' }}"><a href="{{ route('danhsachmau.index') }}">Danh sách màu sản phẩm</a></li>
            <li class="{{ Request::is('admin/danhsachmodel') ? 'active' : '' }}"><a href="{{ route('danhsachmodel.index') }}">Danh sách size sản phẩm</a></li>
           
          </ul>
        </li>
        <!-- /.Danh mục Sản phẩm -->

        <hr>
        <ul>
           <!-- Supporter -->
        <li class="{{ Request::is('admin/danhsachnhacungcap') ? 'active' : '' }}"><a href="{{ route('danhsachnhacungcap.index') }}">Danh sách nhà cung cấp </a> ></li>
        <br>
        <!-- User -->
        <li class="{{ Request::is('admin/danhsachuser') ? 'active' : '' }}"><a href="{{ route('danhsachuser.index') }}">Danh sách khách hàng </a> ></li>
        <br>
        <!-- Nhan vien -->
        <li class="{{ Request::is('admin/danhsachnhanvien') ? 'active' : '' }}"><a href="{{ route('danhsachnhanvien.index') }}">Danh sách nhân viên </a> ></li>
        <br>
        <!-- quản lý phiếu nhập -->
        <li class="{{ Request::is('admin/danhsachphieunhap') ? 'active' : '' }}"><a href="{{ route('danhsachphieunhap.index') }}">Quản lý phiếu nhập</a> ></li>
       <br>
        <!-- quản lý xuất xứ sp -->
        <li class="{{ Request::is('admin/danhsachxuatxu') ? 'active' : '' }}"><a href="{{ route('danhsachxuatxu.index') }}">Quản lý xuất xứ sản phẩm</a> ></li>
        </ul>
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>