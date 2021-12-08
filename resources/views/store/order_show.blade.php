@extends('layouts.app')
@section('content')
<div class="row min-vh-80 h-100">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-secondary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                <i class="fa fa-boxes"></i> ระบบคลังเวชภัณฑ์
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="d-grid gap-2">
                                    <a href="/store" class="btn btn-light btn-lg">
                                        <i class="fa fa-clipboard-check"></i> บิลเวชภัณฑ์
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="d-grid gap-2">
                                    <a href="/store/receive" class="btn btn-light btn-lg">
                                        <i class="fa fa-cart-plus"></i> รับเข้าเวชภัณฑ์
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="d-grid gap-2">
                                    <a href="/store/withdraw" class="btn btn-light btn-lg">
                                        <i class="fa fa-cart-arrow-down"></i> เบิกจ่ายเวชภัณฑ์
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="d-grid gap-2">
                                    <a href="/store/order" class="btn btn-dark btn-lg">
                                        <i class="fa fa-clipboard-list"></i> รายการเบิก
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-top: -2.5rem;">
                        @if($message = Session::get('success'))
                        <div id="alert" class="alert alert-success text-white" role="alert">
                            <small><i class="fa fa-check-circle"></i> {{ $message }}</small>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group input-group-outline my-3 is-filled">
                                    <label class="form-label text-secondary text-xs">เลขที่ใบเบิก</label>
                                    <input type="text" class="form-control text-secondary font-weight-bolder" value="{{ $order->order_no }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-outline my-3 is-filled">
                                    <label class="form-label text-secondary text-xs">วันที่ใบเบิก</label>
                                    <input type="text" class="form-control text-secondary font-weight-bolder" value="{{ DateThai($order->order_date) }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-outline my-3 is-filled">
                                    <label class="form-label text-secondary text-xs">ชื่อหน่วยงาน</label>
                                    <input type="text" class="form-control text-secondary font-weight-bolder" value="{{ $order->dept_name }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" style="margin-top: -1.5rem;">
                        <h6>
                            <i class="fa fa-list-ol"></i> รายละเอียดรายการเบิกเวชภัณฑ์
                            <span class="badge bg-{{ $order->status_color }}">
                                <i class="fa fa-{{ $order->status_icon }}"></i>
                                {{ $order->status_text }}
                            </span>
                        </h6>
                        <div class="table-responsive p-0">
                            <table class="table table-sm table-striped table-borderless">
                                <thead class="text-secondary text-xs font-weight-bolder bg-dark text-white">
                                    @if ($order->order_status == 1)
                                    @php $hide = ''; @endphp
                                    @else
                                    @php $hide = 'hidden'; @endphp
                                    @endif
                                    <tr>
                                        <th class="text-center">รหัส</th>
                                        <th width="30%">รายการเวชภัณฑ์</th>
                                        <th class="text-center">จำนวนเบิก</th>
                                        <th class="text-center">ราคา</th>
                                        <th class="text-center">รวม</th>
                                        <th class="text-center">คงเหลือ</th>
                                        <th class="text-center">LOT_NO</th>
                                        <th class="text-center" {{ $hide }}>จำนวนคงเหลือ (หลังเบิกจ่าย)</th>
                                    </tr>
                                </thead>
                                <form id="frmEdit">
                                <tbody class="text-sm">
                                    @php $total = 0; $i = 0; @endphp
                                    @foreach ($list as $lists)
                                    @php $total += $lists->store_price * $lists->list_amount; $i++; @endphp
                                    <tr>
                                        <td class="text-center">{{ $lists->med_code }}</td>
                                        <td>{{ $lists->med_name." / ".$lists->med_unit }}</td>
                                        <td class="text-center">
                                            <input type="hidden" name="addField[{{ $i }}][id]" class="text-center font-weight-bold text-info" 
                                            value="{{ $lists->list_id }}" style="width: 5rem;">
                                            <input type="text" name="addField[{{ $i }}][list_amount]" class="text-center font-weight-bold text-info" 
                                            value="{{ $lists->list_amount }}" style="width: 5rem;">
                                        </td>
                                        <td class="text-center">{{ number_format($lists->store_price,2) }}</td>
                                        <td class="text-center">{{ number_format($lists->store_price * $lists->list_amount,2) }}</td>
                                        <td class="text-center font-weight-bold text-danger">{{ number_format($lists->store_amount) }}</td>
                                        <td class="text-center">{{ $lists->store_lot_no }}</td>
                                        <td class="text-center text-danger font-weight-bold" {{ $hide }}>
                                            {{ $lists->store_amount - $lists->list_amount }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </form>
                                <tfoot>
                                    <tr class="text-xxs font-weight-bolder bg-dark text-white">
                                        <td colspan="8" class=""> มูลค่ารวม :
                                            <input type="text" class="form-control text-white font-weight-bold bg-dark" value="{{ number_format($total,2)." บาท" }}" disabled>
                                        </td>
                                    </tr>
                                  </tfoot>
                            </table>
                            @if ($order->order_status == 1)
                                <div class="text-center">
                                    <a href="#" class="btn btn-success"
                                        onclick=
                                        "Swal.fire({
                                            title: 'ยืนยันรายการเบิกจ่าย',
                                            text: 'เลขที่ใบเบิก {{ $order->order_no }}',
                                            showCancelButton: true,
                                            confirmButtonText: `<i class='far fa-check-circle'></i> ยืนยัน`,
                                            cancelButtonText: `<i class='far fa-times-circle'></i> ยกเลิก`,
                                            icon: 'success',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '{{ route('store.confirm',$order->order_id) }}';
                                            }
                                        })">
                                        <i class="far fa-check-circle"></i> ยืนยันรายการเบิกจ่าย
                                    </a>
                                    <button id="btn_edit" class="btn btn-warning">
                                        <i class="far fa-edit"></i> แก้ไขรายการเบิกจ่าย
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="far fa-times-circle"></i> ยกเลิกรายการเบิกจ่าย
                                    </button>
                                </div>
                            @else
                                <div class="text-center">
                                    <div class="alert alert-primary text-white" role="alert">
                                        <p>รายการใบเบิก : {{ $order->order_no }} ถูกดำเนินการแล้ว</p>
                                        <small>เมื่อวันที่ {{ DateThai($order->order_confirm) }}</small>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
     $('#btn_edit').on("click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'แก้ไขใบรายการเบิก',
            text: 'เลขที่ใบเบิก {{ $order->order_no }}',
            showCancelButton: true,
            confirmButtonText: `<i class='far fa-check-circle'></i> ยืนยัน`,
            cancelButtonText: `<i class='far fa-times-circle'></i> ยกเลิก`,
            icon: 'warning',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('store.edit') }}",
                    data: $('#frmEdit').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'แก้ไขข้อมูลเบิกจ่ายเวชภัณฑ์สำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        window.setTimeout(function () {
                            location.reload()
                        }, 2500);
                    }
                });
            }
        })
    });
</script>
@endsection
