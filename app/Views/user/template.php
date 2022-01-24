<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Didol.shop</title>

    <!-- ICON HEAD -->
    <link rel="icon" href="<?= base_url('user/image/icon/logo.svg'); ?>">

    <!-- CSS SELF -->
    <?php if (isset($CSS)) { ?>
        <?php foreach ($CSS as $css) { ?>
            <link rel="stylesheet" href="<?= base_url($css) ?>">
        <?php } ?>
    <?php } ?>
    <!-- IMPORTANT CSS -->
    <link rel="stylesheet" href="<?= base_url('user/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('user/css/component.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('user/css/responsive.css'); ?>">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?= base_url('user/font/fontawesome/css/all.css'); ?>">

    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,200,300,400,500,600,700,800,900|Montserrat:100,200,300,400,500,600,700,800,900">


</head>

<body>

    <div class="s300-">
        <p>maaf layar anda terlalu kecil</p>
        <p class="stiker-s300-"></p>
    </div>

    <div id="to-top" class="cursor-pointer-custom">
        <i class="fas fa-chevron-up"></i>
    </div>

    <nav>
        <div class="top" id="top">
            <div>
                <a href=""> <i class="fab fa-facebook-f"></i> </a>
                <a href=""> <i class="fab fa-instagram"></i> </a>
                <a href=""> <i class="fab fa-twitter"></i> </a>
                <a href=""> <i class="fab fa-youtube"></i> </a>
            </div>
            <div class="li-center">
                <p>Furniture terbaik dari indonesia ⭐</p>
            </div>
            <div>
                <a href="">apakah anda mencari produk lain?</p> </a>
            </div>
        </div> <!-- end navbar top -->

        <div class="bottom" id="bottom">
            <div id="hamburger" class="cursor-pointer-custom">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="logo">
                <a href="<?= base_url() ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="220" height="220" viewBox="0 0 220 220" id="svg-logo">
                        <defs>
                        </defs>
                        <path id="logo" d="M20.97,151.667S20.156,121.4,15.975,111.51c0,0-3.94-52.712,0-70.275,0,0-.442-33.868,9.99-35.137,0,0,26.579-8.842,59.94,0,0,0,13.394,9.24,79.92,5.02,0,0,21.882-3.205,24.975,5.02,0,0,7.272,45.215,9.99,55.216,0,0,5.065,21.938,0,80.314,0,0-.511,41.024,5,55.215,0,0,4.731,9.1-9.99,10.04,0,0-74.74-1.4-99.9,0H55.935s21.754-28.854,59.94-40.157a159.887,159.887,0,0,0,34.965-20.079l34.965-20.078s10.143-7.5,5-15.059a7.5,7.5,0,0,0-9.99,0s-33.484,21.911-39.96,25.1c0,0-28.695,15.8-5-10.039l39.96-30.118s13.888-10.883,5-20.078c0,0-4.595-4.206-14.985,5.02,0,0-40.146,37.538-44.955,40.157,0,0-23.119,9.547,0-15.059l44.955-45.176s12.139-12.929,5-20.078c0,0-6.719-4.485-19.98,10.039l-39.96,40.157s-29.281,23.406-9.99-5.02l29.97-35.137s8.847-7.414,0-15.059c0,0-6.472-4.377-14.985,5.02,0,0-33.324,40.9-44.955,50.2,0,0-15.134,12.763-14.985,0,0,0,4.054-45.877-5-45.177,0,0-13.138-11.415-14.985,10.039,0,0,1.389,17.252,0,25.1a126.264,126.264,0,0,0,0,35.138S37.91,141.1,20.97,151.667Z" />
                    </svg>


                    <div id="text-logo">
                        Didol<span id="dot-shop">.shop</span>
                    </div>
                </a>
            </div>
            <div class="navbar">
                <a href="<?= base_url('shop') ?>" id="link"> belanja </a>
                <div>
                    <a id="link" class="food" data-btnNav="nav-produk"> produk <div id="go-down"></div> </a>
                    <div class="dropdown" data-target="nav-produk">
                        <div class="box-dropdown">
                            <div>
                                <p class="head-dropdown">halaman</p>
                                <a href="<?= base_url('shop') ?>">belanja</a>

                                <a href="<?= base_url('cart') ?>">keranjang</a>

                                <a href="<?= base_url('checkout') ?>">checkout</a>

                                <a href="<?= base_url('account') ?>">akun</a>
                            </div>
                            <div>
                                <p class="head-dropdown">produk</p>
                                <a href="">meja</a>
                                <a href="">cermin</a>
                                <a href="">lemari</a>
                                <a href="">dll...</a>
                            </div>
                            <div>
                                <p class="head-dropdown">produk terlaris</p>
                                <a href="">lampu</a>
                                <a href="">sofa</a>
                                <a href="">tanaman hias</a>
                                <a href="">dll...</a>
                            </div>
                            <div>
                                <p class="head-dropdown">produk lainnya?</p>
                                <a href="" class="ask">tanyakan <i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('galery') ?>" id="link"> galeri </a>
                <a href="<?= base_url('contact') ?>" id="link"> kontak </a>
                <div class="btn-in-dropdown">
                    <a href="<?= base_url('checkout') ?>" id="link">
                        <p>checkout</p>
                    </a>

                    <a href="<?= base_url('cart') ?>" id="link">
                        <p>keranjang</p>
                    </a>
                </div>
            </div>
            <div class="icon">
                <div class="box-icon">
                    <a href="<?= base_url('account') ?>">
                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"></path>
                        </svg>
                    </a>
                </div>
                <div class="box-icon">
                    <a href="<?= base_url('cart') ?>" class="cart">
                        <span class="count-product"><code>0</code> produk</span>
                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M551.991 64H129.28l-8.329-44.423C118.822 8.226 108.911 0 97.362 0H12C5.373 0 0 5.373 0 12v8c0 6.627 5.373 12 12 12h78.72l69.927 372.946C150.305 416.314 144 431.42 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-17.993-7.435-34.24-19.388-45.868C506.022 391.891 496.76 384 485.328 384H189.28l-12-64h331.381c11.368 0 21.177-7.976 23.496-19.105l43.331-208C578.592 77.991 567.215 64 551.991 64zM240 448c0 17.645-14.355 32-32 32s-32-14.355-32-32 14.355-32 32-32 32 14.355 32 32zm224 32c-17.645 0-32-14.355-32-32s14.355-32 32-32 32 14.355 32 32-14.355 32-32 32zm38.156-192H171.28l-36-192h406.876l-40 192z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div> <!-- end navbar bottom -->
    </nav>


    <?= $this->renderSection('content'); ?>


    <div class="box-popup" id="box-popup"></div>

    <div class="box-popup-chck" id="box-popup-chck">
        <div class="popup-chck" id="popup-chck">
            <div class="head each">
                <i class="fas fa-times cursor-pointer-custom" id="cross-popup-chck"></i>
            </div>
            <div class="text each"></div>
            <div class="btn-pc each">
                <button class="montserrat cursor-pointer-custom" id="btn-popup-chck">batal</button>
                <button class="montserrat cursor-pointer-custom" id="btn-popup-chck">lanjut</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer1">
            <div>
                <p class="head-footer">halaman</p>

                <a href="<?= base_url('shop') ?>">belanja</a>

                <a href="<?= base_url('cart') ?>">keranjang</a>

                <a href="<?= base_url('checkout') ?>">checkout</a>

                <a href="<?= base_url('account') ?>">akun</a>
            </div>

            <div>
                <p class="head-footer">produk</p>
                <a href="">meja</a>
                <a href="">cermin</a>
                <a href="">lemari</a>
                <a href="">dll...</a>
            </div>

            <div>
                <p class="head-footer">produk terlaris</p>
                <a href="">lampu</a>
                <a href="">sofa</a>
                <a href="">tanaman hias</a>
                <a href="">dll...</a>
            </div>

            <div>
                <p class="head-footer">pembayaran</p>
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
            </div>
        </div>

        <div class="footer2">
            <div>
                <a href=""> <i class="fab fa-facebook-f"></i> </a>
                <a href=""> <i class="fab fa-instagram"></i> </a>
                <a href=""> <i class="fab fa-twitter"></i> </a>
                <a href=""> <i class="fab fa-youtube"></i> </a>
            </div>
            <div class="copyright">
                Copyright &#9400; 2021 Didol.shop
            </div>
        </div>
    </footer>

    <script src="<?= base_url('user/js/script.js'); ?>"></script>
    <?php if (isset($JS)) { ?>
        <?php foreach ($JS as $js) { ?>
            <script src="<?= base_url($js) ?>"></script>
        <?php } ?>
    <?php } ?>

    <?php if (session()->getFlashdata('popup') != NULL) { ?>
        <script>
            popup("<?= session()->getFlashdata('popup')['text'] ?>", "<?= session()->getFlashdata('popup')['bg'] ?>")
        </script>
    <?php } ?>

</body>

</html>