<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="index">
    <div class="jumbotron" id="jumbotron">
        <div class="box-text">
            <h1 class="montserrat">didol.shop</h1>
            <div class="box-typed">
                <p class="montserrat">indonesian furniture</p>
            </div>
            <div class="J-btn">
                <a href="shop.html">Belanja</a>
                <a href="">Produk terlaris</a>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="category section" id="category">
            <p class="judul montserrat">kategori</p>
            <div class="content-category">
                <?php foreach ($dataCategory as $dc) { ?>
                    <a href="<?= base_url('shop') ?>">
                        <div>
                            <img src="<?= base_url('user/image/category/' . $dc['photo']) ?>">
                            <p><?= $dc['category_name'] ?> <span class="total">(<?= $dc['count'] ?>)</span></p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div> <!-- end category -->

        <div class="best-seller section" id="best-seller">
            <p class="judul montserrat">penjualan terbaik</p>

            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php $num = 1; ?>
                    <?php foreach ($dataSlider as $ds) { ?>
                        <div class="swiper-slide box-product">
                            <div id="number">#<?= $num; ?></div>
                            <div class="sell-box-bg">
                                <a href="<?= base_url('shop/detail-product/' . $ds['product_name']) ?>">
                                    <img src="<?= base_url('user/image/product/' . $ds['product_photo']) ?>" class="bg">
                                </a>
                            </div>
                            <div class="text">
                                <p id="sellName"><span class="sellProduct"><?= $ds['product_name']; ?></span></p>
                                <div class="btb">
                                    <p class="sellPrice">Rp <span id="priceNum"><?= $ds['price']; ?></span></p>
                                    <p class="Psold"><span><?= $ds['sold']; ?></span> Terjual</p>
                                </div>
                            </div>
                        </div>
                        <?php $num++; ?>
                    <?php } ?>

                </div>

                <div class="swiper-button-next swipe"></div>
                <div class="swiper-button-prev swipe"></div>
            </div>
        </div>

        <div class="deskripsi section">
            <div class="judul montserrat">
                <p>
                    kami menciptakan pengalaman baru dengan kualitas produk kami
                </p>
            </div>
            <div class="deskripsi-text">
                <p>
                    Desain furniture kita menjadikan kita toko dengan produk kualitas terbaik di indonesia. Apakah Anda ingin tahu rahasia kami? semua produk kualitas terbaik kami dihasil dari tangan para pengrajin handal dan sekarang kami terus mengembangkan desain untuk mendapatkan hasil yang lebih berkualitas. Pengemasan produknya juga sangat rapih, sehingga menghindari kerusakan produk saat pengiriman.
                </p>
            </div>
            <div class="btn-deskripsi">
                <a href="#who-are-we">siapa kita</a>
            </div>
        </div>

        <div class="promo section">
            <div class="box-imgs">
                <div class="satu box-img">
                    <img src="<?= base_url('user/image/promo/promo1/satu.jpg'); ?>">
                    <div class="text">
                        <p>produk baru telah tiba</p>
                        <a href="">lihat</a>
                    </div>
                </div>
                <div class="dua box-img">
                    <img src="<?= base_url('user/image/promo/promo1/dua.jpg'); ?>">
                    <div class="text">
                        <p>produk kuat harga bersahabat</p>
                        <a href="">lihat</a>
                    </div>
                </div>
                <div class="tiga box-img">
                    <img src="<?= base_url('user/image/promo/promo1/tiga.jpg'); ?>">
                    <div class="text">
                        <p>kualitas tidak terbatas</p>
                        <a href="">lihat</a>
                    </div>
                </div>
                <div class="empat box-img" id="who-are-we">
                    <img src="<?= base_url('user/image/promo/promo1/empat.jpg'); ?>">
                    <div class="text">
                        <p>buat harimu menyenangkan dengan produk luar biasa kami</p>
                        <a href="">lihat</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="promo2 section">
            <div class="judul montserrat">
                <p>
                    pendatang baru
                </p>
            </div>
            <div class="content-promo2">
                <div class="box-content">
                    <div class="box-img">
                        <img src="<?= base_url('user/image/promo/promo2/satu.jpg'); ?>" id="satu">
                    </div>
                    <div class="text" id="dua">
                        <p>pendatang baru</p>
                        <p>Tebaru dari toko kami</p>
                        <p>Furniture Didol.shop telah menjadi pusat perhatian di indonesia. Terutama di kenaikan presentase penjualan menaik drastis pada tahun 2021. Sekarang furniture terbaik di indonesia tiba langsung ke rumah anda. Temukan produk terbaik kami. Masuk ke toko online kami dan beli produk terbaik</p>
                        <a href="">lihat</a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="box-img">
                        <img src="<?= base_url('user/image/promo/promo2/dua.jpg'); ?>" id="satu">
                    </div>
                    <div class="text" id="dua">
                        <p>pendatang baru</p>
                        <p>Terbaru dari produsen kami</p>
                        <p>Bebagai macam furniture memiliki keunikan sendiri karena memiliki bahan kayu. Didol.shop menggunakan kayu kualitas terbaik seperti kayu jati & kayu mahoni. Sudah dipastikan memiliki kualitas kuat, halus, dan tahan lama. Temukan produk terbaik kami. Masuk ke toko online kami dan beli produk terbaik</p>
                        <a href="">lihat</a>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end content -->
</main>
<?= $this->endSection(); ?>