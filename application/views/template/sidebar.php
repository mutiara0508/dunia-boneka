<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Menu Utama -->
                <div class="sb-sidenav-menu-heading">Menu Utama</div>
                <a class="nav-link <?php echo ($this->uri->segment(1) == 'dashboard' && $this->uri->segment(2) == '') ? 'active text-white fw-bold' : ''; ?>" 
                    href="<?php echo site_url('dashboard') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>


                <!-- Master Data -->
                <a class="nav-link <?php echo ($this->uri->segment(2) == 'view_product') ? 'active fw-bold' : ''; ?>" 
                    href="<?php echo site_url('dashboard/view_product') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Data Produk
                </a>


                <!-- Lainnya -->
                <div class="sb-sidenav-menu-heading">Lainnya</div>
                <a class="nav-link" href="<?php echo site_url('dashboard/register') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Register
                </a>
                <a class="nav-link" href="<?php echo site_url('dashboard/login') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                    Login
                </a>
                <a class="nav-link" href="<?php echo site_url('dashboard/forgot_password') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                    Lupa Password
                </a>
            </div>
        </div>
    </nav>
</div>
