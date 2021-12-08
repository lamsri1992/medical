<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <title>{{ $order->order_no }}</title>
</head>

<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body>
    <div class="container">
        <div class="text-center" style="margin-top: 1rem;">
            <h5 style="font-weight: bold;">ใบเบิกเวชภัณฑ์/พัสดุ</h5>
        </div>
        <div class="row">
            <div class="col-md-8" style="margin-top: 1rem;">
                <span style="font-weight: bold;">หน่วยงาน</span>
                <span style="">{{ $order->dept_name }}</span>
            </div>
            <div class="col-md-4" style="margin-top: 1rem;">
                <span style="font-weight: bold;">เลขที่ใบเบิก</span>
                <span style="">{{ $order->order_no }}</span>
            </div>
            <div class="col-md-8" style="margin-top: 1rem;">
                <span style="font-weight: bold;">ถึง</span>
                <span style="">เจ้าหน้าที่พัสดุ</span>
            </div>
            <div class="col-md-4" style="margin-top: 1rem;">
                <span style="font-weight: bold;">วันที่ใบเบิก</span>
                <span style="">{{ DateThaiFull($order->order_date) }}</span>
            </div>
            <div class="col-md-8" style="margin-top: 1rem;">
                <span style="">ข้าพเจ้าขอเบิกเวชภัณฑ์/พัสดุตามรายการที่แนบมาเพื่อใช้ในงาน</span>
            </div>
            <div class="col-md-4" style="margin-top: 1rem;">
                <span style="">และต้องการใช้สิ่งของนี้ภายใน</span>
            </div>
            <div class="col-md-4" style="margin-top: 1rem;">
                <span style="">วันที่</span>
            </div>
            <div class="col-md-4" style="margin-top: 1rem;">
                <span style="">และมอบให้</span>
            </div>
            <div class="col-md-4" style="margin-top: 1rem;">
                <span style="">เป็นผู้รับแทนข้าพเจ้า</span>
            </div>
        </div>
        <div style="margin-top: 2rem;">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">รหัส</th>
                        <th>รายการ</th>
                        <th class="text-center">จำนวนเบิก</th>
                        <th class="text-center">ราคา</th>
                        <th class="text-center">รวม</th>
                        <th class="text-center">คงเหลือ</th>
                        <th class="text-center">LotNo.</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; $i = 0; @endphp
                    @foreach ($list as $lists)
                    @php $total += $lists->store_price * $lists->list_amount; $i++; @endphp
                    <tr>
                        <td class="text-center">{{ $lists->med_code }}</td>
                        <td>{{ $lists->med_name." : ".$lists->med_unit }}</td>
                        <td class="text-center">{{ $lists->list_amount }}</td>
                        <td class="text-center">{{ number_format($lists->store_price,2) }}</td>
                        <td class="text-center">{{ number_format($lists->store_price * $lists->list_amount,2) }}</td>
                        <td class="text-center">{{ number_format($lists->store_amount) }}</td>
                        <td class="text-center">{{ $lists->store_lot_no }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th><span>รวม</span></th>
                        <th><span>{{ $i }}</span></th>
                        <th><span>รายการ</span></th>
                        <th><span>มูลค่าในใบเบิก</span></th>
                        <th colspan="2"><span>{{ number_format($order->order_cost,2) }}</span></th>
                        <th><span>บาท</span></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-3" style="margin-top: 1rem;">
               ลงชื่อ
            </div>
            <div class="col-md-3" style="margin-top: 1rem;">
               ผู้เบิก ตำแหน่ง
            </div>
            <div class="col-md-3" style="margin-top: 1rem;">
                ลงชื่อ
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                ผู้จ่าย ตำแหน่ง
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                (.......................................................................)
                วันที่
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                (.......................................................................)
                วันที่
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                
             </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="margin-top: 1rem;">
               ลงชื่อ
            </div>
            <div class="col-md-3" style="margin-top: 1rem;">
               ผู้สั่งจ่าย ตำแหน่ง
            </div>
            <div class="col-md-3" style="margin-top: 1rem;">
                ลงชื่อ
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                ผู้รับ ตำแหน่ง
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                (.......................................................................)
                วันที่
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                (.......................................................................)
                วันที่
             </div>
             <div class="col-md-3" style="margin-top: 1rem;">
                
             </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // window.print();
    </script>
</body>

</html>
