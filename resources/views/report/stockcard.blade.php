<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <title>ปริมาณเวชภัณฑ์คงคลัง โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</title>
</head>

<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body>
    <div class="container">
        <div class="" style="margin-top: 1rem;">
            <h5 style="font-weight: bold;">ปริมาณเวชภัณฑ์คงคลัง โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</h5>
            รายงาน ณ วันที่ 
            <span>{{ DateThaiFull($_REQUEST['date_start']) }}</span>
                ถึง
            <span>{{ DateThaiFull($_REQUEST['date_end']) }}</span>
        </div>
        <div style="margin-top: 1rem;">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">รหัสเวชภัณฑ์</th>
                        <th>ชื่อเวชภัณฑ์</th>
                        <th class="text-center">หน่วยนับ</th>
                        <th class="text-center">จำนวน</th>
                        <th class="text-center">ราคา</th>
                        <th class="text-center">มูลค่า</th>
                        <th class="text-center">วันหมดอายุ</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; $i = 0; @endphp                    
                    @foreach ($med as $meds)
                    @php $total += $meds->store_amount * $meds->store_price; $i++; @endphp
                    <tr>
                        <td class="text-center">{{ $meds->store_med_code }}</td>
                        <td>{{ $meds->med_name }}</td>
                        <td class="text-center">{{ $meds->med_unit }}</td>
                        <td class="text-center">{{ $meds->store_amount }}</td>
                        <td class="text-center">{{ number_format($meds->store_price,2) }}</td>
                        <td class="text-center">{{ number_format($meds->store_amount * $meds->store_price,2) }}</td>
                        <td class="text-center">{{ DateThai($meds->store_expire) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th><span>รวม</span></th>
                        <th><span>{{ $i }}</span></th>
                        <th><span>รายการ</span></th>
                        <th><span>มูลค่าคงคลังรวม</span></th>
                        <th colspan="2"><span>{{ number_format($total,2) }}</span></th>
                        <th><span>บาท</span></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // window.print();
    </script>
</body>

</html>
