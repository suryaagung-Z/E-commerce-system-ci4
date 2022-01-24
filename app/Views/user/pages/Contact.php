<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="contact">
    <div class="header-contact section">
        <p class="montserrat">kontak informasi</p>
        <p>Temukan produk Didol.shop terbaik untuk kenyamanan di rumah anda</p>
    </div>

    <div class="content section">
        <div class="form">
            <p class="p-i">permintaan informasi</p>
            <p class="montserrat p-2">hubungi kami</p>
            <form action="">
                <label for="name">Nama <span class="required">*</span></label>
                <input class="josefin" type="text" id="name" autocomplete="off">

                <label for="email">Email <span class="required">*</span></label>
                <input class="josefin" type="text" id="email" autocomplete="off">

                <label for="message">Pesan <span class="required">*</span></label>
                <textarea class="josefin" name="" id="message" autocomplete="off" rows="10"></textarea>

                <div class="policy">
                    <input type="checkbox" id="policy">
                    <label for="policy">
                        <p>
                            Saya membaca dan menerima <a href="">kebijakan privasi dan pemberitahuan hukum</a>
                        </p>
                    </label>
                </div>

                <button class="montserrat cursor-pointer-custom" id="btn-form-page-contact">kirim pesan</button>
            </form>
        </div>

        <div class="text">
            <p class="montserrat">furniture indonesia untuk pecinta ruangan elegan</p>
            <div class="box-flag">
                <div class="flag"></div>
                <p class="caption-flag">#didol.shop</p>
            </div>
            <div class="t-btn">
                <p>furniture indonesia untuk pecinta ruangan elegan</p>
                <a href="">belanja</a>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>