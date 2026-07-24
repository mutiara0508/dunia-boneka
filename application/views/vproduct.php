<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mx-3 mt-3">
                <div class="card-header">
                    <a href="<?php echo base_url('index.php/dashboard/add_product') ?>" class="btn btn-primary">Tambah Boneka</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Boneka</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($produk as $p): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $p->nama_produk ?></td>
                                        <td><?php echo $p->harga ?></td>
                                        <td><?php echo $p->stok ?></td>
                                        <td><img src="<?php echo base_url('assets/uploads/' . $p->gambar) ?>" width="100" height="100"></td>
                                        <td>
                                            <a href="<?= site_url('dashboard/edit_product/' . $p->id_produk) ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="<?= site_url('dashboard/delete_product/' . $p->id_produk) ?>" 
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')" 
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    