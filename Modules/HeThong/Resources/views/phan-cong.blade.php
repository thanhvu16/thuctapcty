@extends('admin::layouts.master')
@section('page_title', 'Khoa')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 18px !important;">Phân công</h3>
                    </div>
                    @role(NHA_TRUONG)
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            {{ isset($ngayNghi) ? 'CẬP NHẬT' : 'THÊM' }} KHOA
                        </button>
                    </div>
                    @endrole

                    <!-- /.box-header -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse {{ isset($ngayNghi) ? 'in' : null }} " id="collapseExample">
                                <div class="row">
                                    @include('admin::khoa._form')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <form action="{{ route('khoa.index') }}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten')}}"
                                           name="ten"
                                           placeholder="Tên khoa">
                                </div>
                                {{--                                <div class="col-md-3 form-group">--}}
                                {{--                                    <label for="exampleInputEmail1">Tìm theo tên viết tắt</label>--}}
                                {{--                                    <input type="text" class="form-control" value="{{Request::get('ten_viet_tat')}}"--}}
                                {{--                                           name="ten_viet_tat"--}}
                                {{--                                           placeholder="Tên viết tắt">--}}
                                {{--                                </div>--}}
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="2%" class="text-center">STT</th>
                                <th width="" class="text-center">Tên khoa</th>
                                <th width="15%" class="text-center">Giảng viên hướng dẫn</th>
                                <th width="15%" class="text-center">Giáo vụ khoa</th>
                                <th width="8%" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($listNgayNghi as $key => $ngayNghi)
                                <form action="{{route('postphanCong',$ngayNghi->id)}}" id="pc-{{$ngayNghi->id}}" method="post">
                                    @csrf
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{ $key+1 }}</td>
                                    <td class="text-left"
                                        style="vertical-align: middle">{{ $ngayNghi->ten_khoa }}</td>
                                    <td>
                                        <select class="form-control select2" form="pc-{{$ngayNghi->id}}" name="giang_vien" >
                                                <option value="" >Lựa chọn</option>
                                                @foreach($giangVien as $ic)
                                                    <option value="{{ $ic->id }}" {{$ngayNghi->giang_vien_hd == $ic->id ? 'selected' : ''}} >{{$ic->fullname }}</option>
                                                @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control select2" form="pc-{{$ngayNghi->id}}" name="giao_vu" >
                                                <option value="" >Lựa chọn </option>
                                                @foreach($giaoVu as $ic2)
                                                    <option value="{{ $ic2->id }}"  {{$ngayNghi->giao_vu == $ic2->id ? 'selected' : ''}} >{{$ic2->fullname }}</option>
                                                @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" form="pc-{{$ngayNghi->id}}" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Phân công</button>
                                    </td>

                                </tr>
                                </form>
                            @empty
                                <td class="text-center" colspan="6" style="vertical-align: middle">Không có dữ liệu !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số khoa: <b>{{ $listNgayNghi->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $listNgayNghi->appends(['ten' => Request::get('ten')])->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>

@endsection
