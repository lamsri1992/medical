@extends('layouts.app')
@section('content')
<div class="row min-vh-80 h-100">
    <div class="col-12">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-secondary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">
                                        <i class="fa fa-folder-open"></i> รายงานคลังเวชภัณฑ์
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="container">
                                    <div class="table-responsive p-0" style=" border-radius: 5px;">
                                        <table class="table align-items-center mb-0">
                                            <thead class="bg-dark">
                                                <tr>
                                                    <th width="30%"
                                                        class="text-uppercase text-white text-xs font-weight-bolder">
                                                        <i class="fa fa-file-alt"></i> ชื่อรายงาน
                                                    </th>
                                                    <th width="15%"
                                                        class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                        <i class="fa fa-calendar-day"></i> เลือกวันที่เริ่มต้น
                                                    </th>
                                                    <th width="15%"
                                                        class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                        <i class="fa fa-calendar-day"></i> เลือกวันที่สิ้นสุด
                                                    </th>
                                                    <th width="1%" class="text-white"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <form action="{{ route('report.month') }}" target="_blank">
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <p class="text-secondary mb-0">
                                                                        สรุปข้อมูลคลังเวชภัณฑ์มิใช่ยา
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center text-sm" colspan="2">
                                                            <select name="emonth" class="basic-select2" required>
                                                                <option value=""></option>
                                                                <option value="01">มกราคม</option>
                                                                <option value="02">กุมภาพันธ์</option>
                                                                <option value="03">มีนาคม</option>
                                                                <option value="04">เมษายน</option>
                                                                <option value="05">พฤษภาคม</option>
                                                                <option value="06">มิถุนายน</option>
                                                                <option value="07">กรกฏาคม</option>
                                                                <option value="08">สิงหาคม</option>
                                                                <option value="09">กันยายน</option>
                                                                <option value="10">ตุลาคม</option>
                                                                <option value="11">พฤศจิกายน</option>
                                                                <option value="12">ธันวาคม</option>
                                                            </select>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="submit" class="badge btn-success text-white text-xxs">
                                                                <i class="fa fa-print"></i> รายงาน
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{ route('report.summary') }}" target="_blank">
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <p class="text-secondary mb-0">
                                                                        รายงานสรุปการเบิกจ่าย
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <input type="text" name="date_start"
                                                                class="text-center form-control text-dark basicDate text-xs bg-light"
                                                                placeholder="เลือกวันที่" required>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <input type="text" name="date_end"
                                                                class="text-center form-control text-dark basicDate text-xs bg-light"
                                                                placeholder="เลือกวันที่" required>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="submit" class="badge btn-success text-white text-xxs">
                                                                <i class="fa fa-print"></i> รายงาน
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{ route('report.history') }}" target="_blank">
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <p class="text-secondary mb-0">
                                                                        รายงานสรุปการรับจ่ายเวชภัณฑ์
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <input type="text" name="date_start"
                                                                class="text-center form-control text-dark basicDate text-xs bg-light"
                                                                placeholder="เลือกวันที่" required>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <input type="text" name="date_end"
                                                                class="text-center form-control text-dark basicDate text-xs bg-light"
                                                                placeholder="เลือกวันที่" required>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="submit" class="badge btn-success text-white text-xxs">
                                                                <i class="fa fa-print"></i> รายงาน
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{ route('report.stockcard') }}" target="_blank">
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <p class="text-secondary mb-0">
                                                                        รายงานปริมาณเวชภัณฑ์คงคลัง
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <input type="text" name="date_start"
                                                            class="text-center form-control text-dark basicDate text-xs bg-light"
                                                            placeholder="เลือกวันที่" required>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <input type="text" name="date_end"
                                                            class="text-center form-control text-dark basicDate text-xs bg-light"
                                                            placeholder="เลือกวันที่" required>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="submit" class="badge btn-success text-white text-xxs">
                                                                <i class="fa fa-print"></i> รายงาน
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
