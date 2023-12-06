<div id="hilang">
    <?= $this->session->flashdata('alert'); ?>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Saran</h4>
            <div class="table-responsive">
                <form action="<?= base_url('admin/saran/delete'); ?>" method="post">
                    <table class="table datatable" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Pesan</th>
                                <?php if ($user['level'] == 'Admin') { ?>
                                    <th><button type="submit" name="deleteall" class="btn btn-danger" onClick="return confirm('Apakah anda yakin akan menghapus?')"> <i class="ri-delete-bin-7-line"></i></button></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($saran as $ab) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ab['nama']; ?></td>
                                    <td><?= $ab['email']; ?></td>
                                    <td><?= $ab['dikirim']; ?></td>
                                    <td>
                                        <a type="button" class=" text-warning mr-2" data-bs-toggle="modal" data-bs-target="#edit<?= $ab['id_saran'] ?>">
                                            <i class=" ri-eye-fill"></i>
                                        </a>
                                    </td>

                                    <?php if ($user['level'] == 'Admin') { ?>
                                        <td class="text-center">
                                            <input type="checkbox" value="<?= $ab['id_saran']; ?>" name="id[]">
                                        </td>
                                    <?php } ?>

                                    <div class="modal fade" id="edit<?= $ab['id_saran'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pesan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!-- Horizontal Form -->
                                                        <h6>
                                                            <p><?= $ab['pesan']; ?></p>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <!-- End Horizontal Form -->
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>