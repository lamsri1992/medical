<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <title>สรุปการเบิกจ่าย โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</title>
</head>

<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body>
    <div class="container">
        <div class="" style="margin-top: 1rem;">
            <h5 style="font-weight: bold;">สรุปการเบิกจ่าย โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</h5>
            มูลค่าเบิกจ่าย ระหว่างวันที่
            <span style="font-weight: bold;">{{ DateThaiFull($_REQUEST['date_start']) }}</span>
                ถึงวันที่ 
            <span style="font-weight: bold;">{{ DateThaiFull($_REQUEST['date_end']) }}</span>
        </div>
        <div style="margin-top: 0.5rem;">
            รวมใบเบิกทั้งสิ้น
            <span style="font-weight: bold;">{{ $num }}</span> ใบ
            มูลค่ารวม
            <span style="font-weight: bold;">{{ number_format($cost->total,2) }}</span> บาท
        </div>
        <div style="margin-top: 1rem;">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">หน่วยงาน</th>
                        <th class="text-center">รายการ</th>
                        <th class="text-center">มูลค่ารวม</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $lists)
                    <tr>
                        <td>{{ $lists->dept_code }}</td>
                        <td>{{ $lists->dept_name }}</td>
                        <td class="text-center">{{ $lists->count_order_list }}</td>
                        <td class="text-center">{{ $lists->sum_total }}</td>
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
