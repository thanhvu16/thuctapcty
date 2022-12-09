<li class="treeview active menu-open ">


    <a href="#">
        <i class="fa fa-briefcase"></i> <span>Quản lý công việc</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('cong-viec.index') ? 'active' : '' }}"><a href="{{route('cong-viec.index')}}"><i class="fa fa-circle-o"></i> Công việc mới</a></li>
        <li class="{{ Route::is('congViecDaNhan') ? 'active' : '' }}"><a href="{{route('congViecDaNhan')}}"><i class="fa fa-circle-o"></i>Công việc đã nhận  </a></li>
        <li class="{{ Route::is('congViecDaNhanHT') ? 'active' : '' }}"><a href="{{route('congViecDaNhanHT')}}"><i class="fa fa-circle-o"></i>Công việc đã hoàn thành</a></li>
    </ul>
</li>
