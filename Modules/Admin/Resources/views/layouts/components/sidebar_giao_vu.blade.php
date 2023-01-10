
<li class="treeview {{ Route::is('taoGiaoVienHD') || Route::is('DSGiaoVienHD')  ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản lý giảng viên HD</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSGiaoVienHD') ? 'active' : '' }}"><a href="{{ route('DSGiaoVienHD') }}"><i class="fa fa-circle-o"></i> Giảng viên hướng dẫn</a></li>
        <li class="{{ Route::is('taoGiaoVienHD') ? 'active' : '' }}"><a href="{{ route('taoGiaoVienHD') }}"><i class="fa fa-circle-o"></i> Tạo giảng viên hướng dẫn</a></li>
    </ul>
</li>
<li class="treeview {{ Route::is('taoSV') || Route::is('DSSV')  ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản lý sinh viên</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSSV') ? 'active' : '' }}"><a href="{{ route('DSSV') }}"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
        <li class="{{ Route::is('taoSV') ? 'active' : '' }}"><a href="{{ route('taoSV') }}"><i class="fa fa-circle-o"></i> Tạo sinh viên</a></li>
    </ul>
</li>
<li class="treeview {{ Route::is('taoTruongBoMon') || Route::is('DSTruongBoMon')  ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản lý trưởng bộ môn</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSTruongBoMon') ? 'active' : '' }}"><a href="{{ route('DSTruongBoMon') }}"><i class="fa fa-circle-o"></i> Danh sách trưởng bộ môn</a></li>
        <li class="{{ Route::is('taoTruongBoMon') ? 'active' : '' }}"><a href="{{ route('taoTruongBoMon') }}"><i class="fa fa-circle-o"></i> Tạo trưởng bộ môn</a></li>
    </ul>
</li>
<li class="treeview {{ Route::is('nganh.create') || Route::is('nganh.index')  ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản lý ngành</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('nganh.index') ? 'active' : '' }}"><a href="{{ route('nganh.index') }}"><i class="fa fa-circle-o"></i> Danh sách ngành</a></li>
        <li class="{{ Route::is('nganh.create') ? 'active' : '' }}"><a href="{{ route('nganh.create') }}"><i class="fa fa-circle-o"></i> Tạo ngành</a></li>
    </ul>
</li>
<li class="treeview {{ Route::is('taoDoanhNghiep') || Route::is('DSDoanhNghiep')|| Route::is('doanh-nghiep.index')  ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản lý doanh nghiệp</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('doanh-nghiep.index') ? 'active' : '' }}"><a href="{{ route('doanh-nghiep.index') }}"><i class="fa fa-circle-o"></i> Danh sách doanh nghiệp</a></li>
        <li class="{{ Route::is('DSDoanhNghiep') ? 'active' : '' }}"><a href="{{ route('DSDoanhNghiep') }}"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
        <li class="{{ Route::is('taoDoanhNghiep') ? 'active' : '' }}"><a href="{{ route('taoDoanhNghiep') }}"><i class="fa fa-circle-o"></i> Tạo nhân viên</a></li>
    </ul>
</li>

{{--<li class="{{  Route::is('doanh-nghiep.index') ? 'active' : '' }} ">--}}
{{--    <a href="{{route('doanh-nghiep.index')}}">--}}
{{--        <i class="fa fa-user-plus" ></i> <span>Doanh nghiệp</span>--}}
{{--        <span class="pull-right-container">--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}
<li class="{{  Route::is('thongKeXepLoai') ? 'active' : '' }} ">
    <a href="{{route('thongKeXepLoai')}}">
        <i class="fa  fa-recycle" ></i> <span>Thông kê</span>
        <span class="pull-right-container">
            </span>
    </a>
</li>

