@if($data->ket_qua == null)
<div class="modal-dialog modal-lg" >
    <!-- Modal content-->
    <div class="modal-content" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-weight: bold;font-size: 18px !important;">Xử lý công việc</h4>
        </div>
        <div class="modal-body" >
            <div class="card">
                <div class="body main-data" >
                    <form method="POST" id="abc"  action="{{route('capNhatKetQua',$data->id)}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Nội dung công việc:</label>
                            <div>
                                {{$data->noi_dung}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Hạn xử lý:</label>
                            <div>
                                {{formatDMY($data->han_xu_ly)}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kết quả:</label>
                            <div>
                                <textarea class="form-control" rows="4"   id="demo" required name="y_kien" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">File kết quả:</label>
                            <div>
                                <input type="file" class="form-control input-lg" name="file_kq">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="modal-footer" style="text-align: right; ">
            <button type="submit" class="btn btn-lg btn-danger btn-sm " form="abc" ><i class="fa fa-check"></i> Lưu lại</button>
        </div>
    </div>
</div>
@else
    <div class="modal-dialog modal-lg" >
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;font-size: 18px !important;">Xử lý công việc</h4>
            </div>
            <div class="modal-body" >
                <div class="card">
                    <div class="body main-data" >
                        <form method="POST" id="abc"  action="{{route('capNhatKetQua',$data->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Nội dung công việc:</label>
                                <div>
                                    {{$data->noi_dung}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Hạn xử lý:</label>
                                <div>
                                    {{formatDMY($data->han_xu_ly)}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kết quả:</label>
                                <div>
                                    <textarea class="form-control" rows="4"   id="demo" required name="y_kien" >{{$data->ket_qua}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">File kết quả:</label>
                                <div>
                                    <a href="{{$data->getUrlFile()}}" target="popup" class="seen-new-window">[Tệp tin]    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Thời gian hoàn thành:</label>
                                <div>
                                    {{formatDMY($data->thoi_gian_ht)}}
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: right; ">
            </div>
        </div>
    </div>
@endif
