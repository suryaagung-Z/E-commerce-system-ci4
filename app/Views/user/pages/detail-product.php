<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="detail-product">
    <div class="section" id="">
        <div class="box-add-cart">
            <div class="left">
                <div class="current-page">
                    <p>
                        <a href="<?= base_url('shop'); ?>">shop</a> /
                        <a id="categoryLink" data-url="<?= base_url('shop') ?>"><?= $detailData['category'] ?></a>
                        <span class="this-page">/ <?= $detailData['product_name'] ?></span>
                    </p>
                </div>
                <div class="target-vw" id="imgVW">
                    <div class="btnGroup not-close" id="btnGroup">
                        <i class="fas fa-expand cursor-pointer-custom not-close" id="btnFullScreen"></i>
                        <i class="fas fa-link cursor-pointer-custom not-close" id="copyUrl"></i>
                        <i class="fas fa-times cursor-pointer-custom not-close" id="detailCross"></i>
                    </div>
                    <img src="<?= base_url('user/image/product/' . $detailData['product_photo']) ?>" id="imgShow" class="not-close">
                </div>
                <div class="box-img" id="img-rl">
                    <div class="img not-close" style="background-image: url(<?= base_url('user/image/product/' . $detailData['product_photo']) ?>);"></div>
                    <p class="cursor-pointer-custom not-close" id="detail-btnShow">lihat</p>
                </div>
                <div class="share">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank">
                        <i class="fab fa-facebook-f fb"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= current_url() ?>" target="_blank">
                        <i class="fab fa-twitter tw"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=<?= urlencode(current_url()) ?>" target="_blank">
                        <i class="fab fa-whatsapp wa"></i>
                    </a>
                    <a href="" id="copyUrl">
                        <i class="fas fa-link lnk"></i>
                    </a>
                </div>
            </div>
            <div class="right">
                <div class="box" id="box">

                    <p class="this-head montserrat"> <?= $detailData['product_name']; ?> </p>
                    <div class="ac">
                        <?php if (isset($cartData['status'])) { ?>
                            <p class="price">Rp&nbsp;<span id="priceNum"><?= $detailData['price']; ?></span></p>
                            <div class="custom-number btnCustomNumber-disabled">
                                <input type="number" name="quantity" class="josefin" id="custom-number" min="1" max="20" value="<?= $cartData['quantity']; ?>">
                                <div class="box-prev-next">
                                    <i class="fas fa-plus" id="plus"></i>
                                    <i class="fas fa-minus" id="min"></i>
                                </div>
                            </div>
                            <button class="montserrat" id="addtocart-disable">sudah di keranjang <i class="fas fa-check"></i></button>
                        <?php } else { ?>
                            <p class="price">Rp&nbsp;<span id="priceNum"><?= $detailData['price']; ?></span></p>
                            <div class="custom-number">
                                <input type="number" name="quantity" class="josefin" id="custom-number" min="1" max="20">
                                <div class="box-prev-next">
                                    <i class="fas fa-plus" id="plus"></i>
                                    <i class="fas fa-minus" id="min"></i>
                                </div>
                            </div>
                            <button type="submit" id="addToCart" class="montserrat cursor-pointer-custom lnk-chck" data-ip="<?= $detailData['id']; ?>" data-quantity="1" data-url="<?= base_url('addtocart') ?>" data-textPC="Masukan keranjang ?">tambah ke keranjang</button>
                        <?php } ?>
                    </div>
                    <div class="payment">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                    <div class="methods">
                        <div class="method">
                            <i class="fas fa-gifts"></i>
                            <p>termasuk hadiah gratis</p>
                        </div>
                        <div class="method">
                            <i class="fas fa-shield-alt"></i>
                            <p>pembayaran yang aman</p>
                        </div>
                        <div class="method">
                            <i class="fas fa-shipping-fast"></i>
                            <p>pengiriman seluruh dunia</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="section descAndRev" id="">
        <div class="deskripsi">
            <p class="judul montserrat">Deskripsi</p>
            <span class="content">
                <?= $detailData['description']; ?>
            </span>
        </div>
        <div class="reviews">
            <p class="head-reviews montserrat">Ulasan</p>
            <div class="rating">
                <form>
                    <div class="stars box-IR">
                        <label for="">Penilaianmu <span class="required">*</span></label>
                        <div class="box-stars">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="message box-IR">
                        <label for="message">Pesan <span class="required">*</span></label>
                        <textarea class="josefin" type="text" name="" id="message" rows="6"></textarea>
                    </div>
                    <div class="name box-IR">
                        <label for="name">Nama <span class="required">*</span></label>
                        <input class="josefin" type="text" name="" id="name" autocomplete="off">
                    </div>
                    <div class="email box-IR">
                        <label for="email">Email <span class="required">*</span></label>
                        <input class="josefin" type="text" name="" id="email" autocomplete="off">
                    </div>
                    <div class="button">
                        <button type="submit" class="josefin">kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="section" id="">
    </div>
</main>
<?= $this->endSection(); ?>