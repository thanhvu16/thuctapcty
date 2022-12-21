@extends('admin::layouts.master')
@section('page_title', 'doanh nghiệp')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Công việc giao đã hoàn thành </h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('congViecDaHoanThanh')}}" method="get">

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
                                <th width="11%" class="text-center">Người giao </th>
                                <th width="8%" class="text-center">Sinh viên thực hiện </th>
                                <th width="10%" class="text-center">Trạng thái</th>
                                <th width="10%" class="text-center">Đánh giá điểm</th>
                                <th width="5%" class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($CongViec as $key=>$data)
                                <form action="{{route('capNhatHT',$data->id)}}" id="danh-gia-{{$data->id}}" method="post">
                                    @csrf
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-center" style="vertical-align: middle;color: red">{{formatDMY($data->han_xu_ly)}}</td>
                                    <td class="text-left" style="vertical-align: middle"><a href="">{{$data->noi_dung}}</a></td>
                                    <td class="text-left" style="vertical-align: middle">
                                        @if(count($data->CTcongViec) > 0)
                                            @foreach($data->CTcongViec as $cv)
                                                <a  onclick="layDULieu({{$cv->id}})">- {{$cv->noi_dung}}(<i style="color: red">Hạn xử lý: {{formatDMY($cv->han_xu_ly)}}</i>) </a>    <br> <br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->SinhVien->fullname ?? ''}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{formatDMY($data->created_at)}}</td>
                                    <td class="text-center" style="vertical-align: middle">
                                        @if($data->trang_thai == 1)
                                        <span class="label label-pill label-sm label-success">Mới nhận</span>
                                        @elseif($data->trang_thai == 2)
                                            <span class="label label-pill label-sm label-success">Đang thực hiện</span>
                                        @elseif($data->trang_thai == 3)
                                            <span class="label label-pill label-sm label-success">Chờ duyệt</span>
                                        @elseif($data->trang_thai == 4)
                                            <span class="label label-pill label-sm label-success">Đã hoàn thành</span>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">
                                        <input type="text" name="diem" form="danh-gia-{{$data->id}}" class="form-control" required>
                                    </td>
                                    <td style="vertical-align: middle" class="text-center">
                                        <button form="danh-gia-{{$data->id}}" style="color: white !important;"  class="btn btn-primary"><i class="fa fa-check"></i> Duyệt</button>
                                    </td>

                                </tr>
                                </form>
                            @empty
                                <td class="text-center" colspan="9" style="vertical-align: middle">Không có công việc nào được giao !
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
