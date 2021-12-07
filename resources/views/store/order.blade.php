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
                        <table id="tableBasic" class="table table-borderless text-xs nowrap display text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>เลขที่ใบเบิก</th>
                                    <th>วันที่ใบเบิก</th>
                                    <th>ฝ่าย/หน่วยงาน</th>
                                    <th>มูลค่า</th>
                                    <th>สถานะ</th>
                                    <th><i class="fa fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $orders)
                                <tr>
                                    <td>{{ $orders->order_id }}</td>
                                    <td>{{ $orders->order_no }}</td>
                                    <td>{{ DateThai($orders->order_date) }}</td>
                                    <td>{{ $orders->dept_name }}</td>
                                    <td>{{ $orders->order_cost }}</td>
                                    <td>
                                        <span class="badge bg-{{ $orders->status_color }}">
                                            <i class="fa fa-{{ $orders->status_icon }}"></i>
                                            {{ $orders->status_text }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('store.order_show',$orders->order_id) }}" class="badge bg-warning">
                                            <i class="fa fa-search"></i> รายละเอียด
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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
