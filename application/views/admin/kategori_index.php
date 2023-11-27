<div id="hilang">
    <?= $this->session->flashdata('alert'); ?>
</div>
<button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">
    <i class="ri-add-fill"></i>Tambah Kategori
</button>
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <!-- Horizontal Form -->
                    <form action="<?= base_url('admin/kategori/simpan') ?>" method="post">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="kategori" id="floatingName" required placeholder="Nama Kategori">
                            <label for="floatingName">Nama Kategori</label>
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
            <h4 class="card-title">Kategori Konten</h4>
            <div class="table-responsive">
                <table class="table datatable" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori Konten</th>
                            <th scope="row">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori as $ab) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ab['kategori']; ?></td>
                                <td>
                                    <a href="<?= site_url('admin/kategori/delete_data/' . $ab['id_kategori']) ?>" class="text-danger" onClick="return confirm('Apakah anda yakin akan menghapus?')"><i class="ri-delete-bin-7-line"></i></a>
                                    <a type="button" class=" text-warning mr-2" data-bs-toggle="modal" data-bs-target="#edit<?= $ab['id_kategori'] ?>">
                                        <i class="ri-pencil-line"></i>
                                    </a>
                                    <div class="modal fade" id="edit<?= $ab['id_kategori'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!-- Horizontal Form -->
                                                        <form action="<?= base_url('admin/kategori/update') ?>" method="post">
                                                            <input type="hidden" name="id_kategori" value="<?= $ab['id_kategori'] ?>">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="kategori" id="floatingName" value="<?= $ab['kategori']; ?>">
                                                                <label for="floatingName">Nama Kategori Konten</label>
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