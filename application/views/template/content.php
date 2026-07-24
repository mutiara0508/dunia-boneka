<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">DUNIA BONEKA</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard Admin Boneka</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Lihat Produk</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard/view_product">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Lihat Stok</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard/lihat_stok">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Lihat Pemasukan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard/view_pemasukan">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Lihat Pengeluaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard/view_pengeluaran">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                            <div class="row">
                            <!-- Area Chart -->
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header">Data Produksi Dunia Boneka</div>
                                <div class="card-body">
                                <canvas id="produksiChart"></canvas>
                                </div>
                            </div>
                            </div>

                            <!-- Bar Chart -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Data Penjualan Dunia Boneka</div>
                                    <div class="card-body">
                                <canvas id="penjualanChart"></canvas>
                            </div>
                        </div>
                    </div>
                </main>


                <script>
                    const produksiCtx = document.getElementById('produksiChart').getContext('2d');
                    const penjualanCtx = document.getElementById('penjualanChart').getContext('2d');

                    const produksiChart = new Chart(produksiCtx, {
                        type: 'line',
                            data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
                            datasets: [{
                            label: 'Jumlah Produksi',
                            data: [120, 150, 180, 100, 200],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                options: {
                responsive: true,
                scales: {
            y: { beginAtZero: true }
        }
    }
});

                    const penjualanChart = new Chart(penjualanCtx, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
                            datasets: [{
                                label: 'Penjualan',
                                data: [100, 130, 90, 140, 160],
                                backgroundColor: 'rgba(54, 162, 235, 1)'
                            }]
                        },
                    options: {
                responsive: true,
                scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
