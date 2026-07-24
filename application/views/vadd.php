<div id="layoutSidenav_content">
    <div class="card card-register mx-3 mt-3">
        <div class="card-header">
            <a href="<?php echo site_url('dashboard/view_product') ?>">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="<?php echo site_url('dashboard/save_product') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="nama_produk">Nama Boneka</label>
                    <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="harga">Harga</label>
                    <input type="text" id="harga" name="harga" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="stok">Stok</label>
                    <input type="text" id="stok" name="stok" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="gambar">Upload Gambar</label>
                    <input name="gambar" type="file" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="Tambah">
                    <input type="reset" class="btn btn-light" value="Batal">
                </div>
            </form>
        </div>
    </div>
</div>
