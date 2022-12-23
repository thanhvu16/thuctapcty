
<li class="treeview  {{  Route::is('cong-viec.create') || Route::is('cong-viec.create')|| Route::is('congViecDaGiao')
|| Route::is('congViecDaHoanThanh')|| Route::is('congViecDaHoanThanhChoDuyet')  ? 'active menu-open' : '' }}  ">


    <a href="#">
        <i class="fa fa-briefcase"></i> <span>Quản lý công việc</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('cong-viec.create') ? 'active' : '' }}"><a href="{{route('cong-viec.create')}}"><i class="fa fa-circle-o"></i> Giao việc</a></li>
        <li class="{{ Route::is('congViecDaGiao') ? 'active' : '' }}"><a href="{{route('congViecDaGiao')}}"><i class="fa fa-circle-o"></i>Công việc đang xử lý </a></li>
        <li class="{{ Route::is('congViecDaHoanThanhChoDuyet') ? 'active' : '' }}"><a href="{{route('congViecDaHoanThanhChoDuyet')}}"><i class="fa fa-circle-o"></i>Công việc sv hoàn thành </a></li>
        <li class="{{ Route::is('congViecDaHoanThanh') ? 'active' : '' }}"><a href="{{route('congViecDaHoanThanh')}}"><i class="fa fa-circle-o"></i>Công việc đã hoàn thành</a></li>
    </ul>
</li>
<li class="treeview  {{  Route::is('danhGiaCuoiKy') ||  Route::is('daDanhGiaCuoiKy')   ? 'active menu-open' : '' }}  ">
    <a href="#">
        <i class="fa fa-user-plus"></i> <span>Đánh giá cuối kỳ</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('danhGiaCuoiKy') ? 'active' : '' }}"><a href="{{route('danhGiaCuoiKy')}}"><i class="fa fa-circle-o"></i> Đánh giá</a></li>
        <li class="{{ Route::is('daDanhGiaCuoiKy') ? 'active' : '' }}"><a href="{{route('daDanhGiaCuoiKy')}}"><i class="fa fa-circle-o"></i>Đã đánh giá </a></li>
    </ul>
</li>

