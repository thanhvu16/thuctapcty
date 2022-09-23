@extends('admin::layouts.master')
@section('page_title', 'Xuất bản báo in')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                @if( auth::user()->hasRole([PHONG_VIEN]))
                    @include('admin::dashboard.phong_vien')
                @endif

                @if(auth::user()->hasRole([BAN_BIEN_TAP]))
                    @include('admin::dashboard.bien_tap')
                @endif

                @if(auth::user()->hasRole([ THU_KY_TOA_SOAN ]))
                    @include('admin::dashboard.thu_ky')
                @endif

                @if(auth::user()->hasRole([LANH_DAO_TOA_SOAN]))
                    @include('admin::dashboard.lanh_dao')
                @endif


            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChartHoSoCoViec);
        // google.charts.setOnLoadCallback(drawChartDuThaoVanBan);
        // google.charts.setOnLoadCallback(drawChartNhapVanBanDen);
        // google.charts.setOnLoadCallback(drawChartNhapVanBanDi);
        // google.charts.setOnLoadCallback(drawChartCongViecPhongBan);


        function drawChartHoSoCoViec() {
            let data = google.visualization.arrayToDataTable(<?php echo json_encode($baiVietPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($baiVietCoLors); ?>
            };

            if (document.getElementById('pie-chart-ho-so-cong-viec') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-ho-so-cong-viec'));
                chart.draw(data, options);
            }
        };

        {{--function drawChartCongViecPhongBan() {--}}
        {{--    let data = google.visualization.arrayToDataTable(<?php echo json_encode($congViecPhongBanPiceCharts,--}}
        {{--        JSON_NUMERIC_CHECK); ?>);--}}

        {{--    // Optional; add a title and set the width and height of the chart--}}
        {{--    let options = {--}}
        {{--        'title': '',--}}
        {{--        titleTextStyle: {--}}
        {{--            bold: true,--}}
        {{--            fontSize: 14,--}}
        {{--        },--}}
        {{--        legend: {position: 'none'},--}}
        {{--        colors: <?php echo json_encode($congViecPhongBanCoLors); ?>--}}
        {{--    };--}}

        {{--    if (document.getElementById('pie-chart-cong-viec-phong-ban') != undefined) {--}}
        {{--        let chart = new google.visualization.PieChart(document.getElementById('pie-chart-cong-viec-phong-ban'));--}}
        {{--        chart.draw(data, options);--}}
        {{--    }--}}
        {{--};--}}


        {{--function drawChartDuThaoVanBan() {--}}

        {{--    let data = google.visualization.arrayToDataTable(<?php echo json_encode($duThaoPiceCharts,--}}
        {{--        JSON_NUMERIC_CHECK); ?>);--}}

        {{--    // Optional; add a title and set the width and height of the chart--}}
        {{--    let options = {--}}
        {{--        'title': '',--}}
        {{--        titleTextStyle: {--}}
        {{--            bold: true,--}}
        {{--            fontSize: 14,--}}
        {{--        },--}}
        {{--        legend: {position: 'none'},--}}
        {{--        colors: <?php echo json_encode($duThaoCoLors); ?>--}}
        {{--    };--}}

        {{--    if (document.getElementById('pie-chart-du-thao-van-ban') != undefined) {--}}
        {{--        let chart = new google.visualization.PieChart(document.getElementById('pie-chart-du-thao-van-ban'));--}}
        {{--        chart.draw(data, options);--}}
        {{--    }--}}
        {{--};--}}

        {{--function drawChartNhapVanBanDen() {--}}

        {{--    let data = google.visualization.arrayToDataTable(<?php echo json_encode($vanThuVanBanDenPiceCharts,--}}
        {{--        JSON_NUMERIC_CHECK); ?>);--}}

        {{--    // Optional; add a title and set the width and height of the chart--}}
        {{--    let options = {--}}
        {{--        'title': '',--}}
        {{--        titleTextStyle: {--}}
        {{--            bold: true,--}}
        {{--            fontSize: 14,--}}
        {{--        },--}}
        {{--        legend: {position: 'none'},--}}
        {{--        colors: <?php echo json_encode($vanThuVanBanDenCoLors); ?>--}}
        {{--    };--}}

        {{--    if (document.getElementById('pie-chart-van-thu-nhap-van-ban-den') != undefined) {--}}
        {{--        let chart = new google.visualization.PieChart(document.getElementById('pie-chart-van-thu-nhap-van-ban-den'));--}}
        {{--        chart.draw(data, options);--}}
        {{--    }--}}
        {{--}--}}

        {{--function drawChartNhapVanBanDi() {--}}

        {{--    let data = google.visualization.arrayToDataTable(<?php echo json_encode($vanThuVanBanDiPiceCharts,--}}
        {{--        JSON_NUMERIC_CHECK); ?>);--}}

        {{--    // Optional; add a title and set the width and height of the chart--}}
        {{--    let options = {--}}
        {{--        'title': '',--}}
        {{--        titleTextStyle: {--}}
        {{--            bold: true,--}}
        {{--            fontSize: 14,--}}
        {{--        },--}}
        {{--        legend: {position: 'none'},--}}
        {{--        colors: <?php echo json_encode($vanThuVanBanDiCoLors); ?>--}}
        {{--    };--}}

        {{--    if (document.getElementById('pie-chart-van-thu-nhap-van-ban-di') != undefined) {--}}
        {{--        let chart = new google.visualization.PieChart(document.getElementById('pie-chart-van-thu-nhap-van-ban-di'));--}}
        {{--        chart.draw(data, options);--}}
        {{--    }--}}
        {{--}--}}


    </script>
@endsection
