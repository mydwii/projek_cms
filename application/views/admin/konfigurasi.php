<div id="hilang">
    <?= $this->session->flashdata('alert'); ?>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Konfigurasi</h5>
        <!-- Horizontal Form -->
        <form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="judul_website" id="floatingName" value="<?= $config->judul_website ?>" placeholder="Judul Website">
                <label for="floatingName">Judul Website</label>
            </div>
            <div class="form-floating mb-2">
                <textarea type="text" class="form-control" name="profil_website" id="floatingName" placeholder="Profile Website"><?= $config->profil_website ?></textarea>
                <label for="floatingName">Profil Website</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="facebook" id="floatingName" value="<?= $config->facebook ?>" placeholder="Facebook">
                <label for="floatingName">Facebook</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="instagram" id="floatingName" value="<?= $config->instagram ?>" placeholder="Instagram">
                <label for="floatingName">Instagram</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="wa" id="floatingName" value="<?= $config->wa ?>" placeholder="Whatsapp">
                <label for="floatingName">Whatsapp</label>
            </div>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" name="email" id="floatingName" value="<?= $config->email ?>" placeholder="email">
                <label for="floatingName">Email</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="alamat" id="floatingName" value="<?= $config->alamat ?>" placeholder="Alamat">
                <label for="floatingName">Alamat</label>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
    </div>
</div>
</form><!-- End Horizontal Form -->