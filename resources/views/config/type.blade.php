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
                                    <i class="fa fa-notes-medical"></i> ข้อมูลประเภทเวชภัณฑ์
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
                                <table id="tableBasic" class="table table-striped table-borderless text-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary text-center">
                                                ID
                                            </th>
                                            <th class="text-secondary">
                                                ประเภทเวชภัณฑ์
                                            </th>
                                            <th
                                                class="text-center text-secondary">
                                                กลุ่มรายงาน ( 01 คือยา , 02 อื่น ๆ )
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
                                                <span class="text-secondary ">
                                                    {{ $res->type_id }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    {{ $res->type_name }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary ">
                                                    {{ $res->type_report }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="#" class="badge badge-sm bg-secondary">
                                                    <i class="fa fa-edit"></i> แก้ไข
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
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="addType">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i> เพิ่มข้อมูลประเภทเวชภัณฑ์</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">ชื่อประเภทเวชภัณฑ์</label>
                        <input type="text" name="tname" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">กลุ่มรายงาน ( 01 คือยา , 02 อื่น ๆ )</label>
                        <input type="text" name="treport" class="form-control" required>
                        
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
        $('#addType').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'บันทึกข้อมูลประเภทเวชภัณฑ์ ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('config.type_add') }}",
                    data: $('#addType').serialize(),
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
</script>
@endsection
