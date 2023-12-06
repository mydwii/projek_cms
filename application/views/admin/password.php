<div id="hilang">
    <?= $this->session->flashdata('alert'); ?>
</div>
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="<?= base_url('assets/niceadmin/profile/') . $pengguna->image; ?>" alt="Profile" class="rounded-circle">
                    <h2><?= $pengguna->nama ?></h2>
                    <h3><?= $pengguna->level ?> </h3>
                </div>
            </div>

        </div>
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">


                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form action="<?= base_url('admin/password/updatefoto') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?= $pengguna->id_user ?>">
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="<?= base_url('assets/niceadmin/profile/') .  $pengguna->image  ?>">
                                        <div class="pt-2">
                                            <input type="file" name="image" class="mb-3" title="Upload new profile image">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama" type="text" class="form-control" id="fullName" value="<?= $pengguna->nama ?>" readonly>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="username" type="text" class="form-control" id="username" value="<?= $pengguna->username ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="login" class="col-md-4 col-lg-3 col-form-label">Terakhir Login</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="recent_login" type="text" class="form-control" id="login" value="<?= $pengguna->recent_login ?>" readonly>
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="level" class="col-md-4 col-lg-3 col-form-label">Level</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="level" type="text" class="form-control" id="level" value="<?= $pengguna->level ?>" readonly>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="<?= base_url('admin/password/ubahpass') ?>" method="post">
                                <input type="hidden" name="id_user" value="<?= $pengguna->id_user ?>">
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password0" type="password" class="form-control" id="currentPassword" value="<?= $this->session->userdata('password') ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword" value="<?= $this->session->userdata('password') ?>">
                                        <?php echo form_error('newpassword', '<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" value="<?= $this->session->userdata('password') ?>">
                                        <?php echo form_error('renewpassword', '<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
</section>