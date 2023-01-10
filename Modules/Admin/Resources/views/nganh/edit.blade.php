@extends('admin::layouts.master')
@section('page_title', 'kỷ luật')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;font-weight: bold">Cập nhật ngành</h3>
                    </div>
                    <form action="{{route('nganh.update',$data->id)}}" method="post" enctype="multipart/form-data"
                          id="myform">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên ngành</label>
                                    <input type="text" class="form-control" value="{{$data->ten}}" name="ten" id="exampleInputEmail1"
                                           placeholder="Tên  ngành" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Giáo vụ khoa</label>
                                    <select class="form-control select2" name="giao_vu" >
                                        <option value="">--Chọn giáo vụ khoa-</option>
                                        @foreach($giangVien as $dsGV)
                                            <option value="{{$dsGV->id}}"  {{ isset($data) && $data->giao_vu == $dsGV->id ? 'selected' : '' }} >{{$dsGV->fullname}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Khoa</label>
                                    <select class="form-control select2" name="khoa" required>
                                        @foreach($khoa as $dsKHoa)
                                            <option value="{{$dsKHoa->id}}" {{ isset($data) && $data->khoa_id == $dsKHoa->id ? 'selected' : '' }}>{{$dsKHoa->ten_khoa}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Mô tả</label>
                                    <input type="text" class="form-control" value="{{$data->mo_ta}}" name="mo_ta" id="exampleInputEmail2"
                                           placeholder="Tên viết tắt" >
                                </div>
                            </div>

                            <div class="col-md-3 text-left" style="margin-top: 20px">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
