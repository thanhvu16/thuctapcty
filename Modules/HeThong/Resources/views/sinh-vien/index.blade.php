@extends('admin::layouts.master')
@section('page_title', 'Quản lý người dùng')
@section('content')
    <section class="content">
{{--        <div class="box">--}}
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="{{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}">
                        <a href="{{ route('DSSV') }}">
                            <i class="fa fa-user"></i> Quản lý sinh viên của khoa
                        </a>
                    </li>
{{--                    @can('thêm người dùng')--}}

{{--                    @endcan--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane {{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}" id="tab_1">
                        <div class="col-md-12 form-group text-right">
                            <button type="button"  onclick="showModal()"
                                    class="btn btn-success waves-effect waves-light btn-sm btn-export-data"><i
                                    class="fa fa-file-excel-o"></i> Import danh sách sinh viên
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <form action="{{route('DSSV')}}" method="get">





                                    <div class="col-md-3 form-group">
                                        <label>Tìm theo họ tên</label>
                                        <input type="text" class="form-control" value="{{Request::get('fullname')}}"
                                               name="ho_ten"
                                               placeholder="Nhập họ tên...">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Tìm theo tài khoản</label>
                                        <input type="text" class="form-control" value="{{Request::get('username')}}"
                                               name="username"
                                               placeholder="Nhập tài khoản...">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Tìm theo trạng thái</label>
                                        <select name="trang_thai" class="form-control select2">
                                            <option value="">-- Tất cả --</option>
                                            <option value="1" {{ Request::get('trang_thai') == 1 ? 'selected' : '' }}>Hoạt động</option>
                                            <option value="2" {{ Request::get('trang_thai') == 2 ? 'selected' : '' }}>Khoá</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="">&nbsp;</label><br>
                                        <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
                                        @if (!empty(Request::get('username')) || !empty(Request::get('fullname')) ||
                                            !empty(Request::get('trang_thai')) ))
                                            <a href="{{ route('nguoi-dung.index') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                                        @endif
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Mã sinh viên</th>
                                        <th class="text-center">Họ tên sinh viên</th>
                                        <th class="text-center">Ngày sinh</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $key=>$user)
                                    <tr>
                                        <td class="text-center">{{ $key++ }}</td>
                                        <td>{{ $user->ma_sv }}</td>
                                        <td>{{ $user->fullname }}</td>
                                        <td  class="text-center">{{ formatDMY($user->birthday) ?? null }}</td>
                                        <td class="text-center">{!! getStatusLabel($user->status) !!}</td>
                                        <td class="text-center">
                                            @can('sửa người dùng')
                                                <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm" href="{{ route('nguoi-dung.edit', $user->id) }}"
                                                   role="button" title="Sửa">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('xoá người dùng')
                                                <form method="POST" action="{{ route('nguoi-dung.destroy', $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button" title="Xóa">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    Tổng số Người dùng: <b>{{ $users->total() }}</b>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="pagination pagination-sm no-margin pull-right">
                                        {!! $users->appends(['username' => Request::get('username'), 'fullname' => Request::get('fullname'),
                                       'trang_thai' => Request::get('trang_thai')])->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('postImPOsst')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" style="font-size: 18px !important; font-weight: bold !important;"><i
                                                    class="fa fa-folder-open-o" style="font-size: 18px !important; font-weight: bold !important;"></i> Tải danh sách sinh viên</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="sokyhieu" class="">Chọn tệp
                                                        tin danh sách sinh viên<br><small><i></i></small>
                                                    </label>

                                                    <input type="file"  name="file"
                                                           accept=".xlsx,.xls"/>
                                                    <input type="text" id="url-file" value="123"
                                                           class="hidden" name="txt_file">
                                                </div>
                                                <div class="form-group col-md-4" >
                                                    <button class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Tải lên</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
    </section>
@endsection
@section('script')
    <script>
        function showModal() {
            console.log(1);
            $("#myModal").modal('show');
        }
        donVi='#don-vi';
        $('.select-don-vi-id').on('change', function () {
            let $this = $(this);
            let id = $this.val();

            if (id) {
                //lấy danh sach cán bộ phối hơp
                console.log(id);
                $.ajax({
                    url: APP_URL + '/get-chuc-vu/' + id,
                    type: 'GET',
                })
                    .done(function (response) {
                        var html = '<option value="">--Tất cả--</option>';
                        if (response.success) {
                            let selectAttributes = response.data.map((function (attribute) {
                                return `<option value="${attribute.id}" >${attribute.ten_chuc_vu}</option>`;
                            }));
                            $('.chuc-vu').html(html+ selectAttributes);
                        }
                        showPhongBan(response.phongBan);

                    })
                    .fail(function (error) {
                        toastr['error'](error.message, 'Thông báo hệ thống');
                    });
            }

        });

        function showPhongBan(data) {
            let html = '<option value="">Chọn phòng ban</option>';
            if (data.length > 0) {
                let selectAttributes = data.map((function (attribute) {
                    return `<option value="${attribute.id}" >${attribute.ten_don_vi}</option>`;
                }));
                $('.show-phong-ban').removeClass('hide');

                $('.select-phong-ban').html(html + selectAttributes);
            } else {
                $('.show-phong-ban').addClass('hide');
                $('.select-phong-ban').html(' ');
            }
        }

    </script>
@endsection
