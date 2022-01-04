<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#"
            target="_blank">
            <img src="https://www.erp.wc-hospital.go.th/argon/img/brand/logo.png" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">WATCHAN MEDICAL</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">เมนูระบบ</h6>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link text-white {{ (request()->is('/')) ? 'active bg-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-chart-pie"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/store" class="nav-link {{ (request()->is('store*')) ? 'active bg-primary' : '' }} text-white">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-boxes"></i>
                    </div>
                    <span class="nav-link-text ms-1">ระบบคลังเวชภัณฑ์</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/report" class="nav-link {{ (request()->is('report*')) ? 'active bg-primary' : '' }} text-white">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-folder-open"></i>
                    </div>
                    <span class="nav-link-text ms-1">รายงานคลังเวชภัณฑ์</span>
                </a>
            </li>
            {{-- Menu Admin --}}
            @if (Auth::user()->permission == 1)
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">ตั้งค่าระบบ</h6>
            </li>
            <li class="nav-item">
                <a href="/config/user" class="nav-link text-white {{ (request()->is('config/user*')) ? 'active bg-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ตั้งค่าผู้ใช้งาน</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/config/type" class="nav-link text-white {{ (request()->is('config/type*')) ? 'active bg-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-notes-medical opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ประเภทเวชภัณฑ์</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/config/medical" class="nav-link text-white {{ (request()->is('config/medical*')) ? 'active bg-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-briefcase-medical opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ข้อมูลเวชภัณฑ์</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/config/company" class="nav-link text-white {{ (request()->is('config/company*')) ? 'active bg-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-building opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ข้อมูลบริษัท</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/config/purchase" class="nav-link text-white {{ (request()->is('config/purchase*')) ? 'active bg-primary' : '' }}" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-file-invoice-dollar opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ข้อมูลวิธีจัดซื้อ</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/config/budget" class="nav-link text-white {{ (request()->is('config/budget*')) ? 'active bg-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-comment-dollar opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ข้อมูลงบประมาณ</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/config/department" class="nav-link text-white {{ (request()->is('config/department*')) ? 'active bg-primary' : '' }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-layer-group opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ข้อมูลหน่วยงาน</span>
                </a>
            </li>
            @endif
            {{-- End Admin --}}
        </ul>
    </div>
</aside>
