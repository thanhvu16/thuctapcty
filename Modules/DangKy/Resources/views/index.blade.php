
@extends('admin::layouts.master')
@section('page_title', 'Danh sách văn bản đi')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Đăng ký thực tập tại công ty HHVH Store</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12 mt-1 ">

                        <div class="col-md-6">
                            <div class="row">

                            </div>

                        </div>



                    </div>




                    <div class="box-body" >
                        <form action="{{route('nguoi-dung.index')}}" method="get">
                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Họ tên sinh viên <span style="color: red">(*)</span> :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <input name="noi_gui" type="text" id="noi_gui" placeholder="Vũ Văn A" class="form-control" required>

                                </div>

                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Mã sinh viên <span style="color: red">(*)</span> :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <input name="noi_gui" placeholder="Mã sinh viên .." type="text" id="noi_gui" class="form-control" required>

                                </div>

                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Ngày sinh <span style="color: red">(*)</span> :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <div class="input-group date">
                                        <input type="text" class="form-control  datepicker"
                                               name="start_date" id="start_date" value=""
                                               placeholder="dd/mm/yyyy" >
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Lớp <span style="color: red">(*)</span> :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <input name="noi_gui" type="text" placeholder="Lớp" id="noi_gui" class="form-control" required>

                                </div>

                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Khoa <span style="color: red">(*)</span> :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <input name="noi_gui" type="text" id="noi_gui" placeholder="Khoa" class="form-control" required>
                                </div>

                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Địa chỉ liên hệ <span style="color: red">(*)</span> :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <input name="noi_gui" type="text" id="noi_gui" placeholder="Địa chỉ liên hệ" class="form-control" required>
                                </div>

                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Số điện thoại <span style="color: red">(*)</span> :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <input name="noi_gui" type="text" placeholder="Số điện thoại" id="noi_gui" class="form-control" required>
                                </div>

                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                    <label class="form-label">Ý kiến  :</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                    <input name="noi_gui" type="text" placeholder="Ý kiến" id="noi_gui" class="form-control" required>
                                </div>

                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-maggin-bot text-right">
                                    <i style="color: red"> <span >*</span> ( Lưu ý:Bạn cần nhập đúng thông tin để cấp tài khoản ! )</i>
                                </div>


                            </div>
                            <div class="row form-group mt-2">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-maggin-bot text-center">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> Gửi thông tin</button>
                                </div>


                            </div>






                        </form>
                    </div>
                    <!-- /.box-body -->




                </div>
            </div>
        </div>
    </section>

@endsection


@section('script')
    <script src="{{ asset('modules/quanlyvanban/js/app.js') }}"></script>
    <script type="text/javascript">
        function showModal() {
            $("#myModal").modal('show');
        }
    </script>
@endsection
