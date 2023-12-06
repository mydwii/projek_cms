<div id="hilang">
    <?= $this->session->flashdata('alert'); ?>
</div>
<button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">
    <i class="ri-add-fill"></i>Tambah Konten
</button>
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Konten</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <!-- Horizontal Form -->
                    <form action="<?= base_url('admin/konten/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="judul" id="floatingName" required placeholder="Judul">
                            <label for="floatingName">Judul</label>
                        </div>
                        <div class="form-floating mb-2">
                            <select class="form-control" name="id_kategori" id="floatingName" placeholder="Kategori">
                                <?php foreach ($kategori as $ab) { ?>
                                    <option value="<?= $ab['id_kategori']; ?>"><?= $ab['kategori']; ?></option>
                                <?php } ?>
                            </select>
                            <label for="floatingName">Kategori</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea type="text" class="form-control" name="isi_konten" placeholder="Isi Konten"></textarea>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="file" class="form-control" accept="image/png, image/jpg, image/jpeg" name="foto" id="floatingName" required placeholder="Foto">
                            <label for="floatingName">Foto</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                </div>
            </div>
            </form><!-- End Horizontal Form -->
        </div>
    </div>
</div><!-- End Basic Modal-->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Halaman Konten</h4>
            <div class="table-responsive">
                <table class="table datatable" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori Konten</th>
                            <th>Tanggal</th>
                            <th>Kreator</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($konten as $ab) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ab['judul']; ?></td>
                                <td><?= $ab['kategori']; ?></td>
                                <td><?= $ab['tanggal']; ?></td>
                                <td><?= $ab['nama']; ?></td>
                                <td>
                                    <a href="<?= base_url('assets/upload/konten/' . $ab['foto']) ?>" target="_blank">
                                        <img src="<?= base_url('assets/upload/konten/' . $ab['foto']) ?>" class="rounded-circle" style="width:50px" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= site_url('admin/konten/delete_data/' . $ab['foto']) ?>" class="text-danger" onClick="return confirm('Apakah anda yakin akan menghapus?')"><i class="ri-delete-bin-7-line"></i></a>
                                    <a type="button" class="text-warning" data-bs-toggle="modal" data-bs-target="#basicModal<?= $no ?>">
                                        <i class="ri-pencil-line"></i>
                                    </a>
                                    <div class="modal fade" id="basicModal<?= $no ?>" tabindex="-1">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?= $ab['judul']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!-- Horizontal Form -->
                                                        <form action="<?= base_url('admin/konten/update') ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="nama_foto" value="<?= $ab['foto']; ?>">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="judul" id="floatingName" value="<?= $ab['judul']; ?>">
                                                                <label for="floatingName">Judul</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <select class="form-control" name="id_kategori" id="floatingName" placeholder="Kategori">
                                                                    <?php foreach ($kategori as $cc) { ?>
                                                                        <option <?php if ($cc['id_kategori'] == $ab['id_kategori']) {
                                                                                    echo "selected";
                                                                                } ?> value="<?= $cc['id_kategori']; ?>"><?= $cc['kategori']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <label for="floatingName">Kategori</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <textarea type="text" class="form-control" name="isi_konten" id="floatingName"><?= $ab['isi_konten']; ?></textarea>
                                                                <label for="floatingName">Keterangan</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <input type="file" class="form-control" accept="image/png, image/jpg, image/jpeg" name="foto" id="floatingName">
                                                                <label for="floatingName">Foto</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                                            </div>
                                                    </div>
                                                </div>
                                                </form><!-- End Horizontal Form -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>