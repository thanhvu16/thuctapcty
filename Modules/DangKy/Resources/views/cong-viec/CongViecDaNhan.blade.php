@extends('admin::layouts.master')
@section('page_title', 'doanh nghiệp')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Công việc đã nhận đang thực hiện</h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('congViecDaNhan')}}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo nội dung công việc</label>
                                    <input type="text" class="form-control" value="{{Request::get('noi_dung')}}"
                                           name="noi_dung"
                                           placeholder="Nội dung..">
                                </div>
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">STT</th>
                                <th width="11%" class="text-center">Hạn xử lý</th>
                                <th width="" class="text-center">Nội dung công việc</th>
                                <th width="20%" class="text-center">Công việc chi tiết</th>
                                <th width="11%" class="text-center">Sinh viên thực hiện </th>
                                <th width="11%" class="text-center">Ngày giao </th>
                                <th width="10%" class="text-center">Trạng thái</th>
                                <th width="10%" class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($CongViec as $key=>$data)
                                <tr>
                                    <td class="text-center" >{{$key+1}}</td>
                                    <td class="text-center" >{{formatDMY($data->han_xu_ly)}}</td>
                                    <td class="text-left" ><a href="">{{$data->noi_dung}}</a></td>
                                    <td class="text-left" >
                                        @if(count($data->CTcongViec) > 0)
                                            @foreach($data->CTcongViec as $cv)
                                                <a  onclick="layDULieu({{$cv->id}})">- {{$cv->noi_dung}}(<i style="color: red">Hạn xử lý: {{formatDMY($cv->han_xu_ly)}}</i>) </a>    <br> <br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-left" >{{$data->SinhVien->fullname ?? ''}}</td>
                                    <td class="text-center" >{{formatDMY($data->created_at)}}</td>
                                    <td class="text-center">
                                        @if($data->trang_thai == 1)
                                            <span class="label label-pill label-sm label-success">Mới nhận</span>
                                        @elseif($data->trang_thai == 2)
                                            <span class="label label-pill label-sm label-success">Đang thực hiện</span>
                                        @elseif($data->trang_thai == 3)
                                            <span class="label label-pill label-sm label-success">Chờ duyệt</span>
                                        @elseif($data->trang_thai == 4)
                                            <span class="label label-pill label-sm label-success">Đã hoàn thành</span>
                                        @endif
{{--                                        <form method="POST" action="{{route('xoaDN',$data->id)}}">--}}
{{--                                            @csrf--}}
{{--                                            <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"--}}
{{--                                               href="{{route('doanh-nghiep.edit',$data->id)}}" role="button" title="Sửa">--}}
{{--                                                <i class="fa fa-edit"></i>--}}
{{--                                            </a>--}}
{{--                                            <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button"--}}
{{--                                                    title="Xóa">--}}
{{--                                                <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}

                                    </td>
                                    <td class="text-center">
                                        <a class="btn-action btn  btn-primary btn-icon btn-light btn-sm btn-remove-item-duyet" href="{{route('capNhatCVHT',$data->id)}}" style="color: white !important;" role="button" >
                                            <i class="fa fa-check-square-o"></i> Hoàn thành
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <td class="text-center" colspan="8" style="vertical-align: middle">Không có công việc nào đang xử lý !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số công việc : <b>{{ $CongViec->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $CongViec->appends(['ten' => Request::get('ten'),
                                       'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                                </div>
                            </div>
                        </div>
                        <div id="moda-search" class="modal fade" role="dialog">

                        </div>
{{--                        <div class="modal fade" id="myModal">--}}
{{--                            <div class="modal-dialog">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <form action="" method="POST" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                            <h4 class="modal-title"><i--}}
{{--                                                    class="fa fa-folder-open-o"></i> Tải nhiều tệp tin</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="form-group col-md-12">--}}
{{--                                                    <label for="sokyhieu" class="">Chọn tệp--}}
{{--                                                        tin<br><small><i>(Đặt tên file theo định dạng: số đến (vd:--}}
{{--                                                                1672.pdf))</i></small>--}}
{{--                                                    </label>--}}

{{--                                                    <input type="file" multiple name="ten_file[]"--}}
{{--                                                           accept=".xlsx,.xls,.doc,.docx,.txt,.pdf"/>--}}
{{--                                                    <input type="text" id="url-file" value="123"--}}
{{--                                                           class="hidden" name="txt_file[]">--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group col-md-4" >--}}
{{--                                                    <button class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Tải lên</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
