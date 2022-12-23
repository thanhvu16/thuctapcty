@extends('admin::layouts.master')
@section('page_title', 'doanh nghiệp')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Danh sách sinh viên đã đánh giá </h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('daDanhGiaCuoiKy')}}" method="get">

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
                                    STT
                                </th>
                                <th width="" class="text-center">Họ và tên sinh viên</th>
                                <th width="8%" class="text-center">Mã sinh viên</th>
                                <th width="8%" class="text-center">Ngày sinh</th>
                                <th width="10%" class="text-center">Khoa</th>
                                <th width="10%" class="text-center">Ý kiến </th>
                                <th width="10%" class="text-center">Đánh giá </th>
                                <th width="10%" class="text-center">Điểm </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danh_sach as $key=>$data)
                                <form action="{{route('postDanhGiaCuoiKy',$data->id)}}" method="post">
                                    @csrf
                                    <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->fullname}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ma_sv}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{formatDMY($data->birthday)}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->Khoa->ten_khoa ?? ''}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->y_kien_doanh_nghiep ?? ''}}</td>
                                    <td class="text-left" style="vertical-align: middle">
                                        @if($data->danh_gia_doanh_nghiep == 1)
                                            Hoàn thành xuất sắc
                                        @elseif($data->danh_gia_doanh_nghiep == 2)
                                            Hoàn thành
                                        @elseif($data->danh_gia_doanh_nghiep == 3)
                                            Không hoàn thành
                                        @endif
                                        </td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->diem_doanh_nghiep ?? ''}}</td>


                                </tr>
                                </form>
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
