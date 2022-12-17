<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
{{--        <div class="user-panel">--}}
{{--            <div class="pull-left image">--}}
{{--                <img src="{{ !empty(auth::user()->anh_dai_dien) ? getUrlFile(auth::user()->anh_dai_dien) : asset('images/default-user.png') }}" class="img-circle" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="pull-left info">--}}
{{--                <p>{{auth::user()->fullname ?? ''}}</p>--}}
{{--                <a href="#"><i class="fa fa-user"></i> </a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU CHỨC NĂNG</li>
            @role(QUAN_TRI_HT)
            @include('admin::layouts.components.sidebar_admin')
            @endrole
            @role(NHA_TRUONG)
            @include('admin::layouts.components.sidebar_nhaTruong')
            @endrole
            @role(SINH_VIEN)
            @include('admin::layouts.components.sidebar_sinhvien')
            @endrole

            @role(DOANH_NGHIEP)
            @include('admin::layouts.components.sidebar_doanhNghiep')
            @endrole

            @role(GIAO_VU_KHOA)
            @include('admin::layouts.components.sidebar_giao_vu')
            @endrole

            @role(TRUONG_KHOA)
            @include('admin::layouts.components.sidebar_truongkhoa')
            @endrole

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

