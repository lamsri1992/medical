@extends('layouts.app')
@section('content')
<div class="row min-vh-80 h-100">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card-body" style="margin-top: -3rem;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/store">ระบบคลังเวชภัณฑ์</a></li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">BILL_NO : {{ $bill->bill_no }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-secondary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                <i class="fa fa-file-invoice"></i> เลขที่รับ {{ $bill->bill_no }}
                            </h6>
                        </div>
                    </div>
                    <div class="card card-plain">
                        <div class="card-body">
                            <form id="frmReceive">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label text-secondary">เลขที่รับ</label>
                                            <input type="text" name="billno" class="form-control text-secondary text-xxs font-weight-bolder" value="{{ $bill->bill_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label text-secondary">วันที่รับของ</label>
                                            <input type="text" name="datein" class="form-control text-secondary text-xxs font-weight-bolder basicDate" readonly value="{{ DateThai($bill->bill_date_in) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label text-secondary">เลขที่ใบส่งของ</label>
                                            <input type="text" name="sendno" class="form-control text-secondary text-xxs font-weight-bolder" value="{{ $bill->bill_send_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label text-secondary">เลขที่ใบสั่ง</label>
                                            <input type="text" name="orderno" class="form-control text-secondary text-xxs font-weight-bolder" value="{{ $bill->bill_order_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label text-secondary">วันที่สั่งของ</label>
                                            <input type="text" name="dateorder" class="form-control text-secondary text-xxs font-weight-bolder basicDate" readonly value="{{ DateThai($bill->bill_order_date) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label text-secondary">วันที่อนุมัติ</label>
                                            <input type="text" name="dateapprove" class="form-control text-secondary text-xxs font-weight-bolder basicDate" readonly value="{{ DateThai($bill->bill_date_approve) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group input-group-static mb-4">
                                                <label class="ms-0">ประเภทงบประมาณ</label>
                                                <select name="budget" class="basic-select2">
                                                    <option></option>
                                                    @foreach($budget as $bud)
                                                        <option value="{{ $bud->bud_id }}" {{ ($bill->bill_budget_id == $bud->bud_id) ? 'SELECTED' : ''}}>
                                                            {{ $bud->bud_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group input-group-static mb-4">
                                                <label class="ms-0">วิธีจัดซื้อ</label>
                                                <select name="purchase" class="basic-select2">
                                                    <option></option>
                                                    @foreach($purchase as $pur)
                                                        <option value="{{ $pur->pur_id }}" {{ ($bill->bill_purchase_id == $pur->pur_id) ? 'SELECTED' : ''}}>
                                                            {{ $pur->pur_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group input-group-static mb-4">
                                                <label class="ms-0">บริษัท</label>
                                                <select name="company" class="basic-select2">
                                                    <option></option>
                                                    @foreach($company as $com)
                                                        <option value="{{ $com->comp_id }}" {{ ($bill->bill_company_id == $com->comp_id) ? 'SELECTED' : ''}}>
                                                            {{ $com->comp_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive p-0">
                                    <table id="tableBasic" class="table table-striped">
                                        <thead class="text-light text-xs font-weight-bolder bg-dark">
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>CODE</th>
                                                <th width="20%">รายการเวชภัณฑ์</th>
                                                <th class="text-center">หน่วยนับ</th>
                                                <th class="text-center">จำนวน</th>
                                                <th>ราคา</th>
                                                <th>มูลค่า</th>
                                                <th class="text-center">วันหมดอายุ</th>
                                                <th class="text-center">LOT_NO</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-secondary text-xs">
                                            @foreach ($list as $res)
                                                <tr>
                                                    <td class="text-center">{{ $res->store_id }}</td>
                                                    <td>{{ $res->med_code }}</td>
                                                    <td>{{ $res->med_name }}</td>
                                                    <td class="text-center">{{ $res->med_unit }}</td>
                                                    <td class="text-center">
                                                        {{ ($res->amount == '') ? $res->store_amount : $res->amount }}
                                                    </td>
                                                    <td class="">{{ '฿ '.number_format($res->store_price,2) }}</td>
                                                    <td class="">{{ '฿ '.number_format($res->store_price * $res->amount,2) }}</td>
                                                    <td class="text-center">{{ DateThai($res->store_expire) }}</td>
                                                    <td class="text-center">{{ $res->store_lot_no }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="font-weight-bolder text-dark">
                                                <td colspan="9" class=""><i class="fa fa-comments-dollar"></i> มูลค่ารวม : ฿ {{ number_format($bill->bill_cost,2) }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection
