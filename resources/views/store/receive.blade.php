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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">รับเข้าเวชภัณฑ์</li>
                        </ol>
                    </nav>
                </div>
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
                                    <a href="/store/receive" class="btn btn-dark btn-lg">
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
                    <div style="margin-top: -2.5rem;">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h5 class="mb-0">บันทึกรับเข้าเวชภัณฑ์</h5>
                            </div>
                            <div class="card-body" style="margin-top: -2.5rem;">
                                <form id="frmReceive">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">เลขที่รับ</label>
                                                <input type="text" name="billno" class="form-control text-secondary text-xxs font-weight-bolder">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">วันที่รับของ</label>
                                                <input type="text" name="datein" class="form-control text-secondary text-xxs font-weight-bolder basicDate" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">เลขที่ใบส่งของ</label>
                                                <input type="text" name="sendno" class="form-control text-secondary text-xxs font-weight-bolder">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">เลขที่ใบสั่ง</label>
                                                <input type="text" name="orderno" class="form-control text-secondary text-xxs font-weight-bolder">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">วันที่สั่งของ</label>
                                                <input type="text" name="dateorder" class="form-control text-secondary text-xxs font-weight-bolder basicDate" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">วันที่อนุมัติ</label>
                                                <input type="text" name="dateapprove" class="form-control text-secondary text-xxs font-weight-bolder basicDate" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">ประเภทงบประมาณ</label>
                                                    <select name="budget" class="basic-select2">
                                                        <option></option>
                                                        @foreach($budget as $bud)
                                                            <option value="{{ $bud->bud_id }}">{{ $bud->bud_name }}</option>
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
                                                            <option value="{{ $pur->pur_id }}">{{ $pur->pur_name }}</option>
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
                                                            <option value="{{ $com->comp_id }}">{{ $com->comp_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning text-white text-center" role="alert">
                                        <i class="fa fa-info-circle"></i> 
                                        ตรวจสอบความถูกต้องของข้อมูล ก่อนกดบันทึกรับเข้าทุกครั้ง
                                    </div>
                                    <div class="table-responsive p-0">
                                        <table id="dynamicAddRemove" class="table table-striped table-borderless compact">
                                            <thead class="bg-dark text-white">
                                                <tr class="text-xxs text-center">
                                                    <th width="35%">รายการเวชภัณฑ์</th>
                                                    <th>จำนวน</th>
                                                    <th>ราคา</th>
                                                    <th>มูลค่า</th>
                                                    <th>วันหมดอายุ</th>
                                                    <th>LOT_NO</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <select name="addField[0][name]" class="basic-select2">
                                                                <option></option>
                                                                @foreach($data as $res)
                                                                <option value="{{ $res->med_code }}">
                                                                    {{ $res->med_code." : ".$res->med_name." / ".$res->med_unit }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="amount" name="addField[0][amount]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="จำนวน">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="price" name="addField[0][price]" class="text-center form-control text-secondary text-xs font-weight-bolder"
                                                            onfocus="sum()" onblur="sum()" onchange="sum()" onkeyup="sum()" placeholder="ราคา">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="total" name="addField[0][total]" class="text-center form-control text-danger text-xs font-weight-bolder"
                                                            placeholder="มูลค่า" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="date" name="addField[0][expire]" class="text-center form-control text-secondary text-xs" placeholder="วันหมดอายุ">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" name="addField[0][lot]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="LOT_NO">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-info" style="margin-top: 1.2rem;" disabled>
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-xxs font-weight-bolder bg-dark text-white">
                                                    <td colspan="8" class=""> มูลค่ารวม :
                                                        <input type="text" id="total_all" class="form-control text-white" placeholder="มูลค่ารวม">
                                                    </td>
                                                </tr>
                                              </tfoot>
                                        </table>
                                    </div>
                                    <div class="text-center">
                                        <button id="dynamic-ar" type="button" class="btn btn-info">
                                            <i class="fa fa-plus-circle"></i> เพิ่มแถว
                                        </button>
                                        <button class="btn btn-success">
                                            <i class="fa fa-save"></i> บันทึกข้อมูลรับเข้าเวชภัณฑ์
                                        </button>
                                    </div>
                                </form>
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
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $(document).ready(function() {
            $('.select2'+i).select2({ 
                width: '100%',
                placeholder: 'กรุณาเลือก',
            });
        });
        $(function() {
        $.datetimepicker.setLocale('th');
            $('.basicDate'+i).datetimepicker({
                format: 'Y-m-d',
                timepicker: false,
                lang: 'th',
            });
        });
        $("#dynamicAddRemove").append('<tr><td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><select name="addField['+i+'][name]" class="select2'+i+'"><option></option>@foreach($data as $res)<option value="{{ $res->med_code }}">{{ str_pad($res->med_code, 3, '0', STR_PAD_LEFT)." : ".$res->med_name }}</option>@endforeach</select></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input id="amount'+i+'" type="text" name="addField['+i+'][amount]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="จำนวน"></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" id="price'+i+'" name="addField['+i+'][price]" class="text-center form-control text-secondary text-xs font-weight-bolder" onfocus="sum()" onblur="sum()" onchange="sum()" onkeyup="sum()" placeholder="ราคา"></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" id="total'+i+'" name="addField['+i+'][total]" class="text-center form-control text-danger text-xs font-weight-bolder" placeholder="มูลค่า" readonly></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="date" name="addField['+i+'][expire]" class="text-center form-control text-secondary text-xs'+i+'" placeholder="วันหมดอายุ"></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" name="addField['+i+'][lot]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="LOT_NO"></div></td>'+
        '<td><button type="button" class="btn btn-sm btn-danger remove-input-field" style="margin-top: 1.2rem;"><i class="fa fa-minus"></i></button></td></tr>');
        
        // Calculate
        sum = function()
        {
            var amout = document.getElementById('amount'+i).value;
            var price = document.getElementById('price'+i).value; 
            document.getElementById('total'+i).value = parseFloat(amout)*parseFloat(price);
        }
    });
    
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    $('#frmReceive').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'บันทึกข้อมูลรับเข้าเวชภัณฑ์ ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('store.add') }}",
                    data: $('#frmReceive').serialize(),
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

    // Calculate
    sum = function()
    {
        var amout = document.getElementById('amount').value;
        var price = document.getElementById('price').value; 
        document.getElementById('total').value = parseFloat(amout)*parseFloat(price);
    }
    
    </script>
@endsection
