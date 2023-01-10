@extends('admin::layouts.master')
@section('page_title', 'Quản lý người dùng')
@section('content')
    <section class="content">
    {{--        <div class="box">--}}
    <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="">
                        <i class="fa fa-plus"></i> Thêm mới sinh viên</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_2">
                    @include('hethong::truong-bo-mon._form')
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->

    {{--            <div class="box-header with-border">--}}
    {{--                <h3 class="box-title">Quản lý người dùng</h3>--}}
    {{--            </div>--}}
    <!-- /.box-header -->

        {{--        </div>--}}
    </section>
@endsection
