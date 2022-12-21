@extends('admin::layouts.master')
@section('page_title', 'doanh nghiệp')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Danh sách sinh viên chờ đánh giá </h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('danhGiaCuoiKy')}}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo họ tên</label>
                                    <input type="text" class="form-control" value="{{Request::get('noi_dung')}}"
                                           name="noi_dung"
                                           placeholder="họ tên..">
                                </div>
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover data-row">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">
                                    <input id="check-all" type="checkbox" name="check_all" value="">
                                </th>
                                <th width="" class="text-center">Họ và tên sinh viên</th>
                                <th width="8%" class="text-center">Mã sinh viên</th>
                                <th width="8%" class="text-center">Ngày sinh</th>
                                <th width="10%" class="text-center">Khoa</th>
                                <th width="10%" class="text-center">Ý kiến </th>
                                <th width="10%" class="text-center">Đánh giá </th>
                                <th width="10%" class="text-center">Điểm </th>
                                <th width="5%" class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danh_sach as $key=>$data)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">
                                        <input id="checkbox{{ $data->id }}" type="checkbox" form="dangky" name="duyet[{{ $data->id }}]" value="{{ $data->id }}" class="duyet sub-check">
                                        <label for="checkbox{{ $data->id }}"></label></td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->fullname}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ma_sv}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{formatDMY($data->birthday)}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->Khoa->ten_khoa ?? ''}}</td>
                                    <td class="text-left" style="vertical-align: middle">
                                        <textarea cols="4" class="form-control" name="y_kien_doanh_nghiep"></textarea>
                                    </td>
                                    <td class="text-left" style="vertical-align: middle">
                                        <select class="form-control " name="danh_gia_doanh_nghiep" id="">
                                            <option value="">Lựa chọn</option>
                                            <option value="1">Hoàn thành xuất sắc</option>
                                            <option value="2">Hoàn thành</option>
                                            <option value="3">Không hoàn thành</option>
                                        </select>
                                    </td>
                                    <td class="text-left" style="vertical-align: middle">
                                        <input type="text"  class="form-control" name="diem_doanh_nghiep">
                                    </td>
                                    <td class="text-center">
                                        <form method="POST" action="{{route('xoaSV',$data->id)}}">
                                            @csrf
                                            <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button"
                                                    title="Xóa sinh viên">
                                                <i class="fa fa-close" style="color: red"></i>
                                            </button>
                                        </form>


                                    </td>

                                </tr>
                            @empty
                                <td class="text-center" colspan="11" style="vertical-align: middle">Không có dữ liệu !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số sinh viên : <b>{{ $danh_sach->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $danh_sach->appends(['ten' => Request::get('ten'),
                                       'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div id="moda-search" class="modal fade" role="dialog">

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">

        function showModal() {
            console.log(1);
            $("#myModal").modal('show');
        }
        function layDULieu($id)
        {
            $.ajax({
                url: APP_URL + '/lay-bai-viet?id='+$id,
                type: 'GET',
                beforeSend: showLoading(),
                dataType: 'json',
            }).done(function (res) {
                hideLoading();
                $('#moda-search').html(res.html);
                $('#moda-search').modal('show');
            });
        }
    </script>
@endsection
