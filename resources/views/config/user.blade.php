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
                                    <i class="fa fa-users"></i> ตั้งค่าผู้ใช้งาน
                                </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#add">
                                    <i class="fa fa-user-plus"></i> เพิ่มผู้ใช้งาน
                                </button>
                            </div>
                            <div class="table-responsive p-0">
                                <table id="tableBasic" class="table table-borderless text-xs nowrap display">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th><i class="far fa-address-card"></i> ผู้ใช้งาน</th>
                                            <th><i class="far fa-envelope"></i> Email</th>
                                            <th class="text-center"><i class="fas fa-user-cog"></i> สิทธิ์การใช้งาน</th>
                                            <th class="text-center"><i class="far fa-calendar-plus"></i> วันที่เพิ่ม</th>
                                            <th width="1%" class="text-center"><i class="fa fa-bars"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $users)
                                        <tr>
                                            <td class="text-center">{{ $users->id }}</td>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td class="text-center">{{ $users->perm_name }}</td>
                                            <td class="text-center">{{ DateTimeThai($users->created_at) }}</td>
                                            <td class="text-center">
                                                <a href="#" class="badge bg-primary">แก้ไขข้อมูล</a>
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
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addUser">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel"><i class="fa fa-user-plus"></i> เพิ่มผู้ใช้งาน</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ผู้ใช้งาน</label>
                        <div class="input-group input-group-outline my-3">
                            <input name="uname" type="text" class="form-control" placeholder="ระบุชื่อ/สกุล" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <div class="input-group input-group-outline my-3">
                            <input name="uemail" type="email" class="form-control" placeholder="ระบุ email" required>
                        </div>
                        <small id="emailHelp" class="form-text text-danger">ใช้สำหรับเข้าสู่ระบบ / รหัสผ่านเริ่มต้น 1234</small>
                    </div>
                    <div class="form-group">
                        <label for="">กำหนดสิทธิ์การใช้งาน</label>
                        <select name="uperm" class="basic-select2" required>
                            <option value="">เลือก</option>
                            @foreach ($perm as $perms)
                            <option value="{{ $perms->perm_id }}">- {{ $perms->perm_name }}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
     $('#addUser').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'เพิ่มข้อมูลผู้ใช้งาน ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
            icon: 'warning',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('config.user_add') }}",
                    data: $('#addUser').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกรายการสำเร็จ',
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
