<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('material/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('material/assets/img/favicon.png') }}">
    <title>
        WATCHAN : MEDICAL SUPPLIES
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('material/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle"
        href="{{ asset('material/assets/css/material-dashboard.css?v=3.0.0') }}"
        rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="text-center">
                                        <img src="https://www.erp.wc-hospital.go.th/argon/img/brand/logo.png"
                                        class="img img-fluid" width="50%" alt="รพ.วัดจันทร์">
                                    </div>
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                        ระบบบริหารคลังเวชภัณฑ์
                                    </h4>
                                    <div class="text-center">
                                        <small class="text-white">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="ป้อนอีเมล์" autofocus>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                            autocomplete="current-password" required placeholder="ป้อนรหัสผ่าน">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">จดจำการเข้าสู่ระบบ</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">
                                            เข้าใช้งานระบบ
                                        </button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        <a href="#" class="text-info text-gradient font-weight-bold">
                                            ลงทะเบียนใช้งาน
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('material/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <script src="{{ asset('material/assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
</body>

</html>
