<div id="hilang">
    <?= $this->session->flashdata('alert'); ?>
</div>
<button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">
    <i class="ri-add-fill"></i>Tambah User
</button>
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <!-- Horizontal Form -->
                    <form action="<?= base_url('admin/user/simpan') ?>" method="post">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="username" id="floatingName" required placeholder="Username">
                            <label for="floatingName">Username</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="nama" id="floatingName" required placeholder="Nama">
                            <label for="floatingName">Nama</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="Password" class="form-control" name="password" id="floatingName" required placeholder="Password">
                            <label for="floatingName">Password</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="State" name="level" required>
                                <option value="">- Pilih -</option>
                                <option value="Admin">Admin</option>
                                <option value="Kontributor">Kontributor</option>
                            </select>
                            <label for="lv">Level</label>
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
            <h4 class="card-title">Data Pengguna</h4>
            <div class="table-responsive">
                <table class="table datatable" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Profile</th>
                            <th>Level</th>
                            <th>terakhir login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $ab) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ab['username']; ?></td>
                                <td><?= $ab['nama']; ?></td>
                                <td>
                                    <a href="<?= base_url('assets/niceadmin/profile/' . $ab['image']) ?>" target="_blank">
                                        <img src="<?= base_url('assets/niceadmin/profile/' . $ab['image']) ?>" class="rounded-circle" style="width:50px; height:50px;" alt="">
                                    </a>
                                </td>
                                <td><?= $ab['level']; ?></td>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $recent_login = $ab['recent_login'];
                                $tgl1 = new DateTime($recent_login);
                                $tgl2 = new DateTime();
                                $jarak = $tgl2->diff($tgl1);
                                ?>
                                <td>
                                    <?php if ($jarak->days > 0) {
                                        echo $jarak->days .  ' hari yang lalu';
                                    } elseif ($jarak->h > 0) {
                                        echo $jarak->h .  ' jam yang lalu';
                                    } elseif ($jarak->m >= 0) {
                                        echo $jarak->i .  ' menit yang lalu';
                                    } elseif ($jarak->m <= 0) {
                                        echo 'baru saja';
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('admin/user/delete_data/' . $ab['id_user']) ?>" class="text-danger" onClick="return confirm('Apakah anda yakin akan menghapus?')"><i class="ri-delete-bin-7-line"></i></a>
                                    <a type="button" class="text-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $ab['id_user'] ?>">
                                        <i class="ri-pencil-line"></i>
                                    </a>
                                    <div class="modal fade" id="edit<?= $ab['id_user'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!-- Horizontal Form -->
                                                        <form action="<?= base_url('admin/user/update') ?>" method="post">
                                                            <input type="hidden" name="id_user" value="<?= $ab['id_user'] ?>">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="username" id="floatingName" value="<?= $ab['username']; ?>" readonly>
                                                                <label for="floatingName">Username</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="nama" id="floatingName" value="<?= $ab['nama']; ?>" placeholder="Nama">
                                                                <label for="floatingName">Nama</label>
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