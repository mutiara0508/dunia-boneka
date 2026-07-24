<div id="layoutSidenav_content">
    <div class="card card-register mx-3 mt-3">
        <div class="card-header">
            <a href="<?php echo site_url('dashboard/view_product') ?>">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
        <form action="<?= site_url('dashboard/update_product') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">

    <div class="form-group mb-3">
        <label for="nama_produk">Nama Boneka</label>
        <input type="text" id="nama_produk" name="nama_produk" value="<?= $produk->nama_produk ?>" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="harga">Harga</label>
        <input type="text" id="harga" name="harga" value="<?= $produk->harga ?>" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="stok">Stok</label>
        <input type="text" id="stok" name="stok" value="<?= $produk->stok ?>" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="gambar">Gambar saat ini</label><br>
        <img src="<?= base_url('assets/uploads/' . $produk->gambar) ?>" height="100" width="100">
    </div>

    <div class="form-group mb-3">
        <label for="gambar">Upload Gambar Baru</label>
        <input name="gambar" type="file" class="form-control">
    </div>

    <div class="form-group mb-3">
        <input type="submit" class="btn btn-warning" value="Edit">
        <input type="reset" class="btn btn-light" value="Batal">
    </div>
</form>

        </div>
    </div>
</div>
