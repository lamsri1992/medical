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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">เบิกจ่ายเวชภัณฑ์</li>
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
                                    <a href="/store/receive" class="btn btn-light btn-lg">
                                        <i class="fa fa-cart-plus"></i> รับเข้าเวชภัณฑ์
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="d-grid gap-2">
                                    <a href="/store/withdraw" class="btn btn-dark btn-lg">
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
                                <h5 class="mb-0">บันทึกเบิกจ่ายเวชภัณฑ์</h5>
                            </div>
                            <div class="card-body" style="margin-top: -2.5rem;">
                                <form id="frmWithdraw">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">เลขที่ใบเบิก</label>
                                                <input type="text" name="order_no" class="form-control text-secondary text-xxs font-weight-bolder" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label text-secondary text-xs">วันที่ใบเบิก</label>
                                                <input type="text" name="order_date" class="form-control text-secondary text-xxs font-weight-bolder basicDate" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">ชื่อหน่วยงาน</label>
                                                    <select name="order_dept_id" class="basic-select2" required>
                                                        <option></option>
                                                        @foreach($dept as $ds)
                                                            <option value="{{ $ds->dept_id }}">{{ $ds->dept_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning text-white text-center" role="alert">
                                        <i class="fa fa-info-circle"></i> 
                                        ตรวจสอบความถูกต้องของข้อมูล ก่อนกดบันทึกเบิกจ่ายทุกครั้ง
                                    </div>
                                    <div class="table-responsive p-0">
                                        <table id="dynamicAddRemove" class="table table-sm">
                                            <thead class="text-secondary text-xxs font-weight-bolder text-center bg-dark text-white">
                                                <tr>
                                                    <th width="30%">รายการเวชภัณฑ์</th>
                                                    <th>LOT_NO</th>
                                                    <th>คงเหลือ</th>
                                                    <th>วันหมดอายุ</th>
                                                    <th>จำนวนเบิก</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="g_id" name="addField[0][g_id]" hidden>
                                                            <input type="text" id="search" name="addField[0][search]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="ระบุเวชภัณฑ์">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="lot" name="addField[0][lot]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="LOT_NO" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="amount" name="addField[0][amount]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="คงเหลือ" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="expire" name="addField[0][expire]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="วันหมดอายุ" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="text-secondary text-xs"></label>
                                                            <input type="text" id="withdraw" name="addField[0][withdraw]" class="text-center form-control text-secondary text-xs font-weight-bolder text-danger" placeholder="จำนวนเบิก">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button id="dynamic-ar" type="button" class="btn btn-sm btn-info" style="margin-top: 1.2rem;">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            {{-- <tfoot>
                                                <tr class="text-xxs font-weight-bolder bg-dark text-white">
                                                    <td colspan="8" class=""> มูลค่ารวม :
                                                        <input type="text" id="total_all" class="form-control text-white" placeholder="มูลค่ารวม">
                                                    </td>
                                                </tr>
                                            </tfoot> --}}
                                        </table>
                                    </div>
                                    <button class="btn btn-success">
                                        <i class="fa fa-save"></i> บันทึกข้อมูลเบิกจ่ายเวชภัณฑ์
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
@endsection
@section('script')
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $(document).ready(function(){
            var token = "{{ csrf_token() }}";
            $( "#search"+i ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url:"{{ route('store.getMed') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                        _token: token,
                        search: request.term
                        },
                        success: function( data ) {
                        response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#g_id'+i).val(ui.item.value);
                    $('#search'+i).val(ui.item.label);
                    $('#lot'+i).val(ui.item.lot);
                    $('#amount'+i).val(ui.item.amount);
                    $('#expire'+i).val(ui.item.exp);
                return false;
            }
        });
    });
        $("#dynamicAddRemove").append('<tr><td> <div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" id="g_id'+i+'" name="addField['+i+'][g_id]" hidden><input type="text" id="search'+i+'" name="addField['+i+'][search]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="ระบุเวชภัณฑ์"></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" id="lot'+i+'" name="addField['+i+'][lot]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="LOT_NO" readonly></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" id="amount'+i+'" name="addField['+i+'][amount]" class="text-center form-control text-secondary text-xs font-weight-bolder" placeholder="คงเหลือ" readonly></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" id="expire'+i+'" name="addField['+i+'][expire]" class="text-center form-control text-secondary text-xs font-weight-bolder basicDate'+i+'" placeholder="วันหมดอายุ" readonly></div></td>'+
        '<td><div class="input-group input-group-outline my-3"><label class="text-secondary text-xs"></label><input type="text" id="withdraw'+i+'" name="addField['+i+'][withdraw]" class="text-center form-control text-danger text-xs font-weight-bolder text-danger" placeholder="จำนวนเบิก"></div></td>'+
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

    $('#frmWithdraw').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'บันทึกข้อมูลเบิกจ่ายเวชภัณฑ์ ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('store.take') }}",
                    data: $('#frmWithdraw').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลเบิกจ่ายเวชภัณฑ์สำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        window.setTimeout(function () {
                            location.reload('/store/order')
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

    $(document).ready(function(){
        var token = "{{ csrf_token() }}";
        $( "#search" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url:"{{ route('store.getMed') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                    _token: token,
                    search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                $('#g_id').val(ui.item.value);
                $('#search').val(ui.item.label);
                $('#lot').val(ui.item.lot);
                $('#amount').val(ui.item.amount);
                $('#expire').val(ui.item.exp);
            return false;
            }
        });
    });

</script>
@endsection
