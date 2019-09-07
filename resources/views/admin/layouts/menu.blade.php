

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Admin Accounts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ Route('admin.account.index') }}"><i class="fa fa-circle-o"></i> Quản lý Admin</a></li>
                    <li><a href="{{ Route('user.account.index') }}"><i class="fa fa-circle-o"></i> Quản lý User</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Tin tức</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('news.index')}}"><i class="fa fa-list"></i> Danhh sách</a></li>
                    <li><a href="{{route('news.create')}}"><i class="fa fa-plus"></i> Thêm tin</a></li>
                    <li><a href="{{route('news.createCate')}}"><i class="fa fa-plus"></i> Thêm thể loại</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('catelv1.list') }}"><i class="fa fa-plus"></i>danh mục sản phẩm</a></li>
                    <li><a href="{{ route('unit.list') }}"><i class="fa fa-plus"></i>Đơn vị</a></li>
                    <li><a href="{{ route('wholesale.list') }}"><i  class="fa fa-list" ></i> Giá Sỉ</a></li>
                    <li><a href="{{ route('list.product') }}"><i  class="fa fa-list" ></i> Danh sách sản phẩm</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>
                        Thực đơn
                    </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('menu.index')}}"><i class="fa fa-list"></i> Dánh sách</a></li>
                    <li><a href="{{route('menu.create')}}"><i class="fa fa-plus"></i> Thêm thực đơn</a></li>
                    <li><a href="{{route('menu.createCate')}}"><i class="fa fa-circle-o"></i> Thêm thể loại</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('slider.list') }}">
                    <i class="glyphicon glyphicon-picture"></i>
                    <span>Slider</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-road"></i>
                    <span>Đối tác</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('partner.create')}}"><i class="fa fa-plus"></i> Thêm đối tác </a></li>
                    <li><a href="{{route('partner.index')}}"><i class="fa fa-list"></i> Danh sách đối tác</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book"></i>
                    <span>Theo dõi</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('follow.create')}}"><i class="fa fa-plus"></i> Thêm theo dõi </a></li>
                    <li><a href="{{route('follow.index')}}"><i class="fa fa-list"></i> Danh sách theo dõi</a></li>
                </ul>
            </li>
            <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-comment"></i>
                        <span>Liên hệ</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('contact.index')}}"><i class="fa fa-list"></i> Danh sách liên hệ </a></li>
                        <li><a href="{{route('contact.change')}}"><i class="fa fa-plus"></i> Thay đổi liên hệ công ty </a></li>
                    </ul>
                </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-card"></i>
                    <span>Địa chỉ</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.address.index')}}"><i class="fa fa-list"></i> Danh sách địa chỉ hệ thống </a></li>
                    <!-- <li><a href="route('contact.change')"><i class="fa fa-plus"></i> Thay đổi liên hệ công ty </a></li> -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="angle-right"></i>
                    <span>Albums</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.album.index')}}"><i class="fa fa-list"></i> Danh sách album ảnh </a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
