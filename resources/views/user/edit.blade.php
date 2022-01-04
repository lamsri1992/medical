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
                                <i class="fa fa-edit"></i> ข้อมูลผู้ใช้งาน
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row gx-4 mb-2">
                                <div class="col-auto">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="{{ asset('material/assets/img/bruce-mars.jpg') }}"
                                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="col-auto my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1">
                                            {{ Auth::user()->name }}
                                        </h5>
                                        <p class="mb-0 font-weight-normal text-sm">
                                            {{ $data->perm_name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <div class="card card-plain h-100">
                                            <div class="card-header pb-0 p-3">
                                                <h6 class="mb-0">จัดการข้อมูลผู้ใช้งาน</h6>
                                            </div>
                                            <div class="card-body p-3">
                                                <form id="changePersonal">
                                                    <div class="form-group">
                                                        <label for="">ชื่อผู้ใช้งาน</label>
                                                        <div class="input-group input-group-outline my-3">
                                                            <input name="uname" type="text" class="form-control"
                                                                placeholder="ระบุชื่อ/สกุล" value="{{ $data->name }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email address</label>
                                                        <div class="input-group input-group-outline my-3">
                                                            <input type="email" name="uemail" class="form-control"
                                                                value="{{ $data->email }}" required
                                                                placeholder="ป้อนอีเมล์">
                                                        </div>
                                                        <small id="emailHelp"
                                                            class="form-text text-danger">ใช้สำหรับการเข้าสู่ระบบ</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-save"></i> บันทึกข้อมูล
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <div class="card card-plain h-100">
                                            <div class="card-header pb-0 p-3">
                                                <h6 class="mb-0">เปลี่ยนรหัสผ่าน</h6>
                                            </div>
                                            <div class="card-body p-3">
                                                <form id="changePassword">
                                                    <label for="">กำหนดรหัสผ่านใหม่</label>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input name="newpass" type="password" class="form-control" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success"
                                                        style="margin-top: 1rem;">
                                                        <i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน
                                                    </button>
                                                </form>
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
    </div>
</div>
@endsection
@section('script')
<script>
    $('#changePassword').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'เปลี่ยนรหัสผ่าน ?',
            showCancelButton: true,
            confirmButtonText: `ยืนยัน`,
            cancelButtonText: `ยกเลิก`,
            icon: 'warning'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('user.save_pass',Auth::user()->id) }}",
                    data: $('#changePassword').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'เปลี่ยนรหัสผ่านสำเร็จ',
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

    $('#changePersonal').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'บันทึกการเปลี่ยนแปลงข้อมูล ?',
            showCancelButton: true,
            confirmButtonText: `ยืนยัน`,
            cancelButtonText: `ยกเลิก`,
            icon: 'warning'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('user.save_edit',Auth::user()->id) }}",
                    data: $('#changePersonal').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'เปลี่ยนแปลงข้อมูลสำเร็จ',
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
