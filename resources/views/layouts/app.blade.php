<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('material/assets/img/favicon.png') }}">
    <title>
        WATCHAN : MEDICAL SUPPLIES
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('material/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('material/assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('datepicker/jquery.datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('jquery/jquery-ui.css') }}">
</head>

<body class="g-sidenav-show  bg-gray-200">
    @php 
        $pass = '1234'; 
        $id = base64_encode(Auth::user()->id);
    @endphp
    @if (password_verify($pass,Auth::user()->password))
        @include('layouts.side_dis')
    @else
        @include('layouts.side')
    @endif
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.nav')
        <div class="container-fluid py-4">
            @yield('content')
            @include('layouts.foot')
        </div>
    </main>
</body>

<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('jquery/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('material/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('material/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('material/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('material/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('material/assets/js/plugins/chartjs.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('material/assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('datepicker') }}/jquery.datetimepicker.full.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

 // DATATABLES
 $(document).ready(function () {
    $('#tableBasic').dataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        // scrollX: true,
            oLanguage: {
            oPaginate: {
                sFirst: '<small>หน้าแรก</small>',
                sLast: '<small>หน้าสุดท้าย</small>',
                sNext: '<small>ถัดไป</small>',
                sPrevious: '<small>กลับ</small>'
            },
                sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
                sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
                sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
                sInfoEmpty: '<small>ไม่มีข้อมูล</small>'
            },
        });
    });

 // SELECT2
$(document).ready(function() {
    $('.basic-select2').select2({ 
        width: '100%',
        placeholder: 'กรุณาเลือก',
    });
});

// DATATIME_PICKER 
$(function() {
    $.datetimepicker.setLocale('th');
        $(".basicDate").datetimepicker({
            format: 'Y-m-d',
            timepicker: false,
            lang: 'th',
        });
    });

window.setTimeout(function() {
    $("#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
        });
    }, 5000);
</script>
@section('script')
@show

</html>
