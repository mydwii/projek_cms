<div id="hilang">
    <?= $this->session->flashdata('alert'); ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Caraousel</h5>

                <!-- General Form Elements -->

                <form action="<?= base_url('admin/caraousel/simpan') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="judul" id="floatingName" required placeholder="Judul">
                        <label for="floatingName">Judul</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input class="form-control" type="file" name="foto" id="formFile">
                        <label for="floatingName">Pilih Foto dengan Ukuran 1:3</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php foreach ($caraousel as $ab) { ?>
        <div class="col-lg-4">
            <div class="card">
                <img src="<?= base_url('assets/upload/carousel/' . $ab['foto']) ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $ab['judul'] ?></h5>
                    <a href="<?= site_url('admin/caraousel/delete_data/' . $ab['foto']) ?>" class="btn btn-sm btn-danger mr-2" onClick="return confirm('Apakah anda yakin akan menghapus?')">
                        <i class="ri-delete-bin-7-line"></i> Hapus Foto
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>