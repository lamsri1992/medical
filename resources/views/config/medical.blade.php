@extends('layouts.app')
@section('content')
<div class="row min-vh-80 h-100">
    <div class="col-12">
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-secondary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    <i class="fa fa-briefcase-medical"></i> ข้อมูลเวชภัณฑ์
                                </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                                    <i class="fa fa-plus-circle"></i> เพิ่มข้อมูล
                                </button>
                            </div>
                            <div class="table-responsive p-0">
                                <table id="tableBasic" class="table table-striped table-borderless compact">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                ID
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                CODE
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder">
                                                ชื่อเวชภัณฑ์
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                ประเภท
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder">
                                                รายละเอียด
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                หน่วยนับ
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                สถานะ
                                            </th>
                                            <th class="text-secondary text-center">
                                                <i class="fa fa-bars"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $res)                                            
                                        <tr>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $res->med_id }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-xs">
                                                    {{ $res->med_code }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-xs">
                                                    {{ $res->med_name }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-xs">
                                                    {{ $res->med_type }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-xs">
                                                    {{ $res->med_content }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-xs">
                                                    {{ $res->med_unit }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="btnToggle"
                                                    data-id="{{ $res->med_id }}" {{ $res->med_status == 'Y' ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="#" class="text-xxs badge bg-secondary">
                                                    <i class="fa fa-search"></i> รายละเอียด
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8" class="text-center text-xs font-weight-bold">
                                                <i class="fa fa-check text-success"></i> {{ "เปิดใช้งาน : ".$visible }}
                                                &nbsp; | &nbsp;
                                                <i class="fa fa-ban text-danger"></i> {{ "ปิดใช้งาน : ".$disable }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="addData">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i> เพิ่มข้อมูลเวชภัณฑ์</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Code</label>
                        <input type="text" name="mcode" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">ชื่อเวชภัณฑ์</label>
                        <input type="text" name="mname" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">ประเภท</label>
                        <input type="text" name="mtype" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">รายละเอียด</label>
                        <input type="text" name="mdetail" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">หน่วยนับ</label>
                        <input type="text" name="munit" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> เพิ่มข้อมูล</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
        $('#addData').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'บันทึกข้อมูลเวชภัณฑ์ ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('config.medical_add') }}",
                    data: $('#addData').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลสำเร็จ',
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

    $(function() {
        $("#tableBasic").on("change", ".form-check-input", function() {
            var status = $(this).prop('checked') == true ? 'Y' : 'N'; 
            var id = $(this).data('id'); 
            
            $.ajax({
                type: "GET",
                url: '/config/med_status',
                data: {'status': status, 'id': id},
                success: function(data){
                    // console.log(id+status)
                }
            });
        })
    })
</script>
@endsection
