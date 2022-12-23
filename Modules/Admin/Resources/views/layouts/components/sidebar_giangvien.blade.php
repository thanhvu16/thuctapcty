
<li class="treeview  {{  Route::is('nhapDiemCuoiKy') ||  Route::is('danhapDiemCuoiKy')   ? 'active menu-open' : '' }}  ">
    <a href="#">
        <i class="fa fa-user-plus"></i> <span>Nhập điểm sinh viên</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('nhapDiemCuoiKy') ? 'active' : '' }}"><a href="{{route('nhapDiemCuoiKy')}}"><i class="fa fa-circle-o"></i> Đánh giá</a></li>
        <li class="{{ Route::is('danhapDiemCuoiKy') ? 'active' : '' }}"><a href="{{route('danhapDiemCuoiKy')}}"><i class="fa fa-circle-o"></i>Đã đánh giá </a></li>
    </ul>
</li>

