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
                                    <a href="/store" class="btn btn-dark btn-lg">
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
                                    <a href="/store/order" class="btn btn-light btn-lg">
                                        <i class="fa fa-clipboard-list"></i> รายการเบิก
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-top: -2.5rem;">
                        <table id="tableBasic" class="table table-borderless text-xs nowrap display">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>เลขที่ใบรับ</th>
                                    <th class="text-center">วันที่รับของ</th>
                                    <th>งบประมาน</th>
                                    <th>วิธีจัดซื้อ</th>
                                    <th>บริษัท</th>
                                    <th>มูลค่า</th>
                                    <th class="text-center"><i class="fa fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($list as $res)
                                @php $total += $res->bill_cost; @endphp
                                <tr>
                                    <td class="text-center">{{ $res->bill_id }}</td>
                                    <td>{{ $res->bill_order_no }}</td>
                                    <td class="text-center">{{ DateThai($res->bill_date_in) }}</td>
                                    <td>{{ $res->bud_name }}</td>
                                    <td>{{ $res->pur_name }}</td>
                                    <td>{{ $res->comp_name }}</td>
                                    <td>{{ '฿ '.number_format($res->bill_cost,2) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('store.show',$res->bill_id) }}" class="badge bg-warning">
                                            <i class="fa fa-search"></i> รายละเอียด
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-weight-bold">
                                    <td colspan="8" class="text-center">มูลค่ารวม :: {{ '฿ '.number_format($total,2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
