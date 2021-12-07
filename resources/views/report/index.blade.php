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
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th width="30%"
                                                    class="text-uppercase text-dark text-xs font-weight-bolder opacity-7">
                                                    รายงาน
                                                </th>
                                                <th width="20%"
                                                    class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">
                                                    เลือกฝ่าย / หน่วยงาน
                                                </th>
                                                <th width="15%"
                                                    class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">
                                                    เลือกวันที่เริ่มต้น
                                                </th>
                                                <th width="15%"
                                                    class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">
                                                    เลือกวันที่สิ้นสุด
                                                </th>
                                                <th width="1%" class="text-dark opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="text-secondary mb-0">
                                                                สรุปข้อมูลคลังเวชภัณฑ์มิใช่ยา
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select name="order_dept_id" class="basic-select2" required>
                                                        <option></option>
                                                        @foreach($dept as $ds)
                                                            <option value="{{ $ds->dept_id }}">{{ $ds->dept_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <input type="text" name="date"
                                                        class="text-center form-control text-secondary basicDate text-xs"
                                                        placeholder="เลือกวันที่" readonly>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <input type="text" name="date"
                                                        class="text-center form-control text-secondary basicDate text-xs"
                                                        placeholder="เลือกวันที่" readonly>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="#" class="badge bg-warning text-white text-xxs">
                                                        <i class="fa fa-print"></i> รายงาน
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="text-secondary mb-0">
                                                                รายงานสรุปการเบิกจ่าย
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select name="order_dept_id" class="basic-select2" required>
                                                        <option></option>
                                                        @foreach($dept as $ds)
                                                            <option value="{{ $ds->dept_id }}">{{ $ds->dept_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <input type="text" name="date"
                                                        class="text-center form-control text-secondary basicDate text-xs"
                                                        placeholder="เลือกวันที่" readonly>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <input type="text" name="date"
                                                        class="text-center form-control text-secondary basicDate text-xs"
                                                        placeholder="เลือกวันที่" readonly>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="#" class="badge bg-warning text-white text-xxs">
                                                        <i class="fa fa-print"></i> รายงาน
                                                    </a>
                                                </td>
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
@endsection
@section('script')

@endsection
