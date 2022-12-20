


<li class="treeview {{ Route::is('taoGiaoVuAdmin') || Route::is('DSGiaoVuAdmin')  ? 'active menu-open' : '' }} }} ">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Quản lý giáo vụ</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('DSGiaoVuAdmin') ? 'active' : '' }}"><a href="{{ route('DSGiaoVuAdmin') }}"><i class="fa fa-circle-o"></i> Danh sách giáo vụ</a></li>
        <li class="{{ Route::is('taoGiaoVuAdmin') ? 'active' : '' }}"><a href="{{ route('taoGiaoVuAdmin') }}"><i class="fa fa-circle-o"></i> Tạo giáo vụ</a></li>
    </ul>
</li>


<li class="{{  Route::is('khoa.index') ? 'active' : '' }} ">
    <a href="{{route('khoa.index')}}">
        <i class="fa fa-cogs" ></i> <span>Quản lý khoa</span>
        <span class="pull-right-container">
            </span>
    </a>
</li>


