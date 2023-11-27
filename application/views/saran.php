<link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/contact_responsive.css">
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-speed="0.8">
        <img src="<?= base_url('assets/avision-master/') ?>images/post.jpg">
    </div>
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  offset-lg-3">
                    <!-- Post Comment -->
                    <div class="post_comment">
                        <div class="contact_form_container">
                            <h2>Saran</h2>
                            <div id="hilang">
                                <?= $this->session->flashdata('alert'); ?>
                            </div>
                            <form action="<?= base_url('home/simpan') ?>" method="post">
                                <input type="text" class="contact_input contact_input_name" placeholder="Your Name" name="nama" required>
                                <input type="email" class="contact_input contact_input_email" placeholder="Your Email" name="email" required>
                                <textarea class="contact_text" placeholder="Your Message" name="pesan" required="required"></textarea>
                                <button type="submit" class="contact_button">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/avision-master/') ?>js/contact.js"></script>