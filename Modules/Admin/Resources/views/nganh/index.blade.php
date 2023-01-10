@extends('admin::layouts.master')
@section('page_title', 'ngành')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;font-weight: bold">Danh sách ngành</h3>
                    </div>
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            THÊM NGÀNH</button>
                    </div>

                    <!-- /.box-header -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse " id="collapseExample">
                                    <form role="form" action="{{route('nganh.store')}}" method="post" enctype="multipart/form-data"
                                          id="myform">
                                        @csrf
                                        <div class="box-body">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên ngành</label>
                                                    <input type="text" class="form-control" name="ten" id="exampleInputEmail1"
                                                           placeholder="Tên ngành" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Giáo vụ khoa</label>
                                                    <select class="form-control select2" name="giao_vu" >
                                                        <option value="">--Chọn giáo vụ khoa-</option>
                                                        @foreach($giangVien as $dsGV)
                                                            <option value="{{$dsGV->id}}" >{{$dsGV->fullname}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Khoa</label>
                                                    <select class="form-control select2" name="khoa" required>
                                                        @foreach($khoa as $dsKHoa)
                                                            <option value="{{$dsKHoa->id}}" {{ isset($user) && $user->khoa_id == $dsKHoa->id ? 'selected' : '' }}>{{$dsKHoa->ten_khoa}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Mô tả</label>
                                                    <input type="text" class="form-control" name="mo_ta" id="exampleInputEmail2"
                                                           placeholder="Tên viết tắt" >
                                                </div>
                                            </div>


                                            <div class="col-md-3 text-left" style="margin-top: 20px">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('nganh.index')}}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên ngành</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten')}}"
                                           name="ten"
                                           placeholder="Tên..">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo mô tả</label>
                                        <input type="text" class="form-control" value="{{Request::get('mo_ta')}}"
                                           name="mo_ta"
                                           placeholder="Mô tả">
                                </div>
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">STT</th>
                                <th width="" class="text-center">Tên ngành</th>
                                <th width="" class="text-center">khoa</th>
                                <th width="" class="text-center">Giáo vụ</th>
                                <th width="20%" class="text-center">Mô tả</th>
                                <th width="10%" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danh_sach as $key=>$data)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ten}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->khoaID->ten_khoa}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->giaoVu->fullname ?? ''}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->mo_ta}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{route('xoaNganh',$data->id)}}">
                                            @csrf
                                            <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"
                                               href="{{route('nganh.edit',$data->id)}}" role="button" title="Sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button"
                                                    title="Xóa">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @empty
                                <td class="text-center" colspan="5" style="vertical-align: middle">Không có dữ liệu !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số : <b>{{ $danh_sach->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $danh_sach->appends(['ten' => Request::get('ten'),
                                       'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
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
