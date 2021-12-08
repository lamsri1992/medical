<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <title>สรุปข้อมูลคลัง โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</title>
</head>

<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body>
    <div class="container">
        <div class="text-center" style="margin-top: 1rem;">
            <h2 style="font-weight: bold;">สรุปข้อมูลคลัง เวชภัณฑ์มิใช่ยา</h2>
            <h4 style="font-weight: bold;">กลุ่มการพยาบาล</้>
            <h3 style="font-weight: bold;">ประจำเดือน {{ MonthThai(date('Y-'.$_REQUEST['emonth'].'-d'))." ".(date('Y')+544) }} </h3>
        </div>
        <div style="margin-top: 2rem;" class="text-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h5 style="font-weight: bold;">มูลค่ารับเข้าทั้งหมด</h5>
                        <h6>มูลค่ารับเข้าที่ใช้เงิน UC ซื้อ</h6>
                        <h6>มูลค่ารับเข้าฟรี + บริจาค</h6>
                    </div>
                    <div class="col-md-6">
                        <h5 style="font-weight: bold;"> {{ number_format($curm->total,2) }} บาท</h5>
                        <h6> {{ number_format($uc->total,2) }} บาท</h6>
                        <h6> {{ number_format($dc->total,2) }} บาท</h6>
                    </div>
                    <div class="col-md-6" style="margin-top: 1rem;">
                        <h5 style="font-weight: bold;">มูลค่าจ่ายออกทั้งหมด</h5>
                        <h6>มูลค่าจ่ายออกที่ใช้เงิน UC ซื้อ</h6>
                        <h6>มูลค่าจ่ายออกฟรี + บริจาค</h6>
                        <h6>มูลค่าจ่ายออกยกยอดมาปี 2564</h6>
                    </div>
                    <div class="col-md-6" style="margin-top: 1rem;">
                        <h5 style="font-weight: bold;"> {{ number_format($ordm->total,2) }} บาท</h5>
                        <h6> {{ number_format($ordm2->total,2) }} บาท</h6>
                        <h6> {{ number_format($ordm3->total,2) }} บาท</h6>
                        <h6> {{ number_format($ordm4->total,2) }} บาท</h6>
                    </div>
                    <div class="col-md-6" style="margin-top: 1rem;">
                        <h5 style="font-weight: bold;">มูลค่าคงคลังทั้งหมด</h5>
                        <h6>มูลค่าคงคลังที่ใช้เงิน UC ซื้อ</h6>
                        <h6>มูลค่าคงคลังฟรี + บริจาค</h6>
                        <h6>มูลค่าคงคลังยกยอดมาปี 2564</h6>
                    </div>
                    <div class="col-md-6" style="margin-top: 1rem;">
                        <h5 style="font-weight: bold;"> {{ number_format($med->total,2) }} บาท</h5>
                        <h6> {{ number_format($med2->total,2) }} บาท</h6>
                        <h6> {{ number_format($med3->total,2) }} บาท</h6>
                        <h6> {{ number_format($med4->total,2) }} บาท</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>
