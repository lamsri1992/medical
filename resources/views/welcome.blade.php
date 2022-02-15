@extends('layouts.app')
@section('content')
<div class="row min-vh-80 h-100">
    <div class="col-12">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-comment-dollar opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">มูลค่าคงคลัง</p>
                            <h4 class="mb-0">{{ number_format($med->total,2) }} บาท</h4>
                        </div>
                    </div>
                    <div class="card-footer p-1"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-box-open opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">รายการทั้งหมด</p>
                            <h4 class="mb-0">{{ number_format($list) }} รายการ</h4>
                        </div>
                    </div>
                    <div class="card-footer p-1"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-file-download opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">รายการเวชภัณฑ์รับเข้า</p>
                            <h4 class="mb-0">{{ number_format($list) }} รายการ</h4>
                        </div>
                    </div>
                    <div class="card-footer p-1"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-file-upload opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">รายการเวชภัณฑ์เบิกจ่าย</p>
                            <h4 class="mb-0">{{ number_format($draw) }} รายการ</h4>
                        </div>
                    </div>
                    <div class="card-footer p-1"></div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0"><i class="fa fa-history"></i> คลังเวชภัณฑ์</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                                เดือน{{ MonthThai(date('d-m-y',strtotime("-1 month"))) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fa fa-arrow-down text-xs"></i></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">มูลค่ารับเข้า</h6>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + {{ number_format($cura->total,2) }} ฿
                                </div>
                            </li>
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fa fa-arrow-up text-xs"></i></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">มูลค่าเบิกจ่าย</h6>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - {{ number_format($orda->total,2) }} ฿
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0"><i class="far fa-calendar-check"></i> คลังเวชภัณฑ์</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                                เดือน{{ MonthThai(date('d-m-y')) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fa fa-arrow-down text-xs"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">มูลค่ารับเข้า</h6>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + {{ number_format($curm->total,2) }} ฿
                                </div>
                            </li>
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fa fa-arrow-up text-xs"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">มูลค่าจ่ายออก</h6>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - {{ number_format($ordm->total,2) }} ฿
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0"><i class="fa fa-file-download"></i> รายการรับเข้า</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/store" class="text-xs font-weight-bold text-muted"><i class="fa fa-angle-double-right"></i> ดูทั้งหมด</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            @foreach ($invs as $inv)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ DateThai($inv->bill_date_in) }}</h6>
                                    <span class="text-xs">{{ "# ".$inv->bill_no }}</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    {{ "฿ ".number_format($inv->bill_cost,2) }}
                                    <a href="{{ route('store.show',$inv->bill_id) }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                        <i class="far fa-file-alt text-lg position-relative me-1"></i>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0"><i class="fa fa-file-upload"></i> รายการเบิกจ่าย</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/store/order" class="text-xs font-weight-bold text-muted"><i class="fa fa-angle-double-right"></i> ดูทั้งหมด</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            @foreach ($order as $orders)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ DateThai($orders->order_date) }}</h6>
                                    <span class="text-xs">{{ "# ".$orders->order_no }}</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    {{ "฿ ".number_format($orders->order_cost,2) }}
                                    <a href="{{ route('store.order_show',$orders->order_id) }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                        <i class="far fa-file-alt text-lg position-relative me-1"></i>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@php 
    $pass = '1234'; 
    $id = base64_encode(Auth::user()->id);
@endphp
@section('script')
@if (password_verify($pass,Auth::user()->password))
<script>
    Swal.fire({
       position: 'top-center',
       icon: 'error',
       title: 'รหัสผ่านเริ่มต้น',
       text: 'กรุณาตั้งรหัสผ่านใหม่',
       showConfirmButton: true,
       confirmButtonText: '<a href="{{ route("user.change",$id) }}" class="text-white">เปลี่ยนรหัสผ่าน</a>',
       allowEscapeKey : false,
       allowOutsideClick: false
       })
</script>
@endif
<script>
    Swal.fire({
       position: 'top-center',
       icon: 'success',
       title: '{{ (session("database")=="mysql" ? "กุล่มการพยาบาล":"กลุ่มงานเภสัชกรรม") }}',
       text: 'Database Name',
       showConfirmButton: true,
       confirmButtonText: 'เริ่มใช้งานระบบ',
       allowEscapeKey : false,
       allowOutsideClick: false
       })
</script>
@endsection
