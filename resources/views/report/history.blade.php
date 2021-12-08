<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <title>รายงานสรุปการรับจ่ายเวชภัณฑ์ โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</title>
</head>

<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body>
    <div class="container">
        <div class="" style="margin-top: 1rem;">
            <h5 style="font-weight: bold;">รายงานสรุปการรับจ่ายเวชภัณฑ์ โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</h5>
            ตั้งแต่วันที่ 
            <span>{{ DateThaiFull($_REQUEST['date_start']) }}</span>
                ถึง
            <span>{{ DateThaiFull($_REQUEST['date_end']) }}</span>
        </div>
        <div style="margin-top: 1rem;">
            <table class="table table-sm" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th class="text-center">รหัสเวชภัณฑ์</th>
                        <th>ชื่อเวชภัณฑ์</th>
                        <th class="text-center">หน่วยนับ</th>
                        <th class="text-center">ยกมา</th>
                        <th class="text-center">รับเข้า</th>
                        <th class="text-center">จ่ายออก</th>
                        <th class="text-center">มูลค่าจ่ายออก</th>
                        <th class="text-center">คงคลัง</th>
                        <th class="text-right">ราคาเฉลี่ย</th>
                        <th class="text-right">มูลค่าเฉลี่ย</th>
                    </tr>
                </thead>
               <tbody>
                   @foreach ($med as $meds)
                   <tr>
                       <td class="text-center">{{ $meds->med_code }}</td>
                       <td>{{ $meds->med_name }}</td>
                       <td class="text-center">{{ $meds->med_unit }}</td>
                       <td class="text-center">{{ number_format($meds->carry) }}</td>
                       <td class="text-center">{{ number_format($meds->receives) }}</td>
                       <td class="text-center">{{ number_format($meds->paid) }}</td>
                       <td class="text-center">{{ number_format($meds->paid * $meds->store_price,2) }}</td>
                       <td class="text-center">{{ number_format($meds->totals) }}</td>
                       <td class="text-right">{{ number_format($meds->store_price,2) }}</td>
                       <td class="text-right">{{ number_format($meds->store_amount * $meds->store_price,2) }}</td>
                   </tr>
                   @endforeach
               </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>
