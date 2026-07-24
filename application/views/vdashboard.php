<?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    
    <!-- NAVBAR -->
    <?php //$this->load->view('template/navbar'); ?>

    
        <!-- SIDEBAR -->
        <?php $this->load->view('template/sidebar'); ?>

        <!-- KONTEN UTAMA -->

        <!-- Flash message -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

            <!-- FOOTER -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="text-muted text-center">© Dunia Boneka 2025</div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>